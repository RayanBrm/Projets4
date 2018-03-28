<?php

/**
 * Class Ajax
 * This class is called on every ajax request to handle it
 * Function return 'success' or 'failure' if action is needed, the result else
 * In some case it can return other error descriptor listed below
 * Parameter can be passed to a ajax handler with code igniter as /AjaxController/MethodAsHandler/Parameter1/Parameter2/...
 */
class Ajax extends CI_Controller
{
    /**
     * Throw if the given parameter is incorrect
     */
    private const PARAMS = 'params';
    /**
     * Throw if the something is empty and require a value
     */
    private const EMPTY = 'empty';
    /**
     * Throw if the given size isn't correct
     */
    private const SIZE = 'size';
    /**
     * Throw if an unknown error appear
     */
    private const UNKNOWN = 'unknown';
    /**
     * Thrown if the given format is incorrect
     */
    private const FORMAT = 'format';
    /**
     * Throw if a preblem has appeared during file upload
     */
    private const UPLOAD = 'upload';
    /**
     * Throw if a something is tried to be accessed with incorrect authorization
     */
    private const FORBID = 'forbidden';
    /**
     * Throw if some parameter is missing
     */
    private const INCOMPLETE = 'incomplete';
    /**
     * Throw if the given value already exist somewhere
     */
    private const EXIST = 'exist';
    /**
     * Throw if an error is detected during image resizing
     */
    private const RESIZE = 'resize';

    /**
     * General constant if something bad append during function execution
     */
    private const FAILURE = 'failure';
    /**
     * Genarel constant to notify success of execution
     */
    private const SUCCESS = 'success';

    /**
     * Constructor
     * Load the Formatter class, see it for more information
     * Instantiate php session if currently not running
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->library('Formatter',null,'format');
        if (!isset($_SESSION)){
            session_start();
        }
    }

    // *********** Classes functions

    /**
     * Return on stdout a formated string containing all child or the child of a specific one.
     * @param string $classeID '0' for all child, else a class id
     * @param string $displayMode The mode to format the child, could be 'log' or 'option',
     *                            Refer to Formatter class for more information
     */
    public function getClasse(string $classeID, string $displayMode)
    {
        $result = "";
        if ($classeID == '0'){
            $classe = $this->user->getAllChild();
        }
        else{
            $classe = $this->user->getAllChild($classeID);
        }

        foreach ($classe as $eleve){
            if ($displayMode == 'log'){
                $result.=$this->format->child->toLog($eleve);
            }
            elseif ($displayMode == 'option'){
                $tmpEleve = $this->user->get(array('id'=>$eleve['id']))[0];
                $result.=$this->format->child->toOption($tmpEleve);
            } else {
                $result.='';
            }
        }
        echo $result;
    }

    /**
     * Return on stdout the the whole list of classe, each as an html option
     * Refer to Formatter class for more information
     */
    public function getClasseList()
    {
        $result = '';

        $data = $this->classe->getAll();
        foreach ($data as $classe){
            $result.=$this->format->class->toOption($classe);
        }
        echo $result;
    }

    // *********** User functions

    /**
     * Handler for adding a user, receive POST parameters as :
     * $_POST = array(
     *          'identifiant'=>'',
     *          'nom'=>'',
     *          'prenom'=>'',
     *          'role'=>''
     *          ['motdepasse'=>''] Only if role is prof or admin
     *          ['classe'=>''] Only if role is eleve, a random child chip is chosen according to his classe
     *      )
     */
    public function adduser()
    {
        // Filtering users :
        // NC => forbidden , Prof => forbidden , Child connected => forbidden
        if (!isset($_SESSION) || (isset($_SESSION) && $_SESSION['user']['role'] != ADMIN) || !isset($_SESSION['child'])){
            echo self::FORBID;
            exit();
        }

        if (isset($_POST['identifiant']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['role']) && isset($_POST['motdepasse'])) {
            if (!$this->user->userExist($_POST['identifiant'])){
                $user = array(
                    'identifiant' => $_POST['identifiant'],
                    'motdepasse' => $_POST['motdepasse'],
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'role' => $_POST['role']
                );

                echo ($this->user->add($user))? self::SUCCESS : self::FAILURE ;
            }else{
                echo self::EXIST;
            }
        } elseif (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['classe'])){
            $child = array(
                'identifiant'=>'eleve'.uniqid(),
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'role'=>CHILD,
                'classe'=>$_POST['classe'],
                'pastille'=>$this->getAleaPastille($_POST['classe'])
            );

            echo ($this->user->add($child))? self::SUCCESS : self::FAILURE;
        } else { // Should not appear
            echo self::INCOMPLETE;
        }
    }

    /**
     * Search a user, POST parameter needed as :
     * $_POST => array(
     *              'search'=>'', Specify the keyword to search in nom, prenom or identifiant field
     *              'type'=>''    Specify the user type to search, can be 'child' or 'util'
     *          )
     */
    public function getUser()
    {
        $keyWord = $_POST['search'];
        $type = $_POST['type'];
        $result = "";

        $users = $this->user->search($keyWord,$type);

        if (count($users) > 0){
            foreach ($users as $user){
                $result.= $this->format->user->toLi($user);
            }
        }

        echo $result;
    }

    /**
     * Delete a user, POST parameter required as $_POST['userId'], which represent a valid user id
     * If an admin try to delete his own account or the logged user is not administrator 'forbidden' is throw
     * Else 'success' or 'failure' is thrown according to the models result
     */
    public function delUser()
    {
        if (!isset($_POST['userId'])){
            echo self::FAILURE;
            exit();
        }
//        TODO : check if $POST:userId is not the last admin
        if (isset($_SESSION) && $_SESSION['user']['role'] === ADMIN && !($_SESSION['user']['id'] == $_POST['userId'])){
            echo ($this->user->del(array('id' => $_POST['userId'])))? self::SUCCESS : self::FAILURE;
        }else{
            echo self::FORBID;
        }
    }

    /**
     * Change the childs array given to the given classe id
     * POST parameter required as :
     *  $_POST = array(
     *              'childs'=>'', A JSON array containing child id
     *              'classe'=>'' A valid class id
     *           )
     *
     * Throw 'success' or 'failure' in case of invalid parameters or in case of models failure
     */
    public function changeChildClass(){
        if (isset($_POST['childs']) && isset($_POST['classe'])){
            $childs = json_decode($_POST['childs']);
            $classe = $_POST['classe'];
            $result = true;

            foreach ($childs as $child){
                $result == $result && $this->eleve->set(array('id'=>$child,'classe'=>$classe));
            }

            echo ($result)? self::SUCCESS : self::FAILURE;
        }else{
            echo self::FAILURE;
        }
    }

    /**
     * Edit the user credential, POST parameter required as :
     * $_POST = array(
     *          'id'=>'',
     *          'identifiant'=>'',
     *          'nom'=>'',
     *          'prenom'=>'',
     *          'role'=>''
     *          ['motdepasse'=>''] Only if role is prof or admin, if this filed is '' the password is not updated
     *          ['classe'=>'', 'pastille'=>''] Only if role is eleve
     *      )
     * If child is connected, the updated is forbidden also if a prof is trying to edit someone else
     */
    public function editUser()
    {
        // id exist and user is conneced and child is not connected
        if (isset($_POST['id']) && isset($_SESSION['user']) && !isset($_SESSION['child'])){
            if (($_SESSION['user']['id'] == $_POST['id']) || ($_SESSION['user']['role'] == ADMIN)){ // self or admin
                if (isset($_POST['motdepasse']) && strlen($_POST['motdepasse']) == 0){
                    unset($_POST['motdepasse']);
                }
                echo ($this->user->set($_POST))? self::SUCCESS : self::FAILURE;
            }else{
                echo self::FORBID;
            }
        }else{
            echo self::FAILURE;
        }
    }

    /**
     * Return a random chip name contained in the /assets/img/pastille_eleve folder accoding to the available chip in the classe
     * @param string $classId The chip where to compare to the available chip list
     * @return string A random chip name
     */
    public function getAleaPastille(string $classId): string
    {
        // On recupere les pastille utilisé pour la classe donnée
        $usedPastilles = $this->eleve->getUsedPastilleFromClasse($classId);
        // On recupere la liste de toutes les pastille dans le repertoire
        $availablePastilles = scandir(__DIR__.'/../../assets/img/pastilles_eleve');
        // On supprime les references au dossier courant '.' et au dossier parent '..'
        $availablePastilles = array_diff($availablePastilles, array('.', '..'));

        foreach ($availablePastilles as $currentKey => $currentValue) {
            // Si une pastille est presente dans les pastille de la classe on la supprime des pastilles disponible
            if (in_array(explode('.',$availablePastilles[$currentKey])[0],$usedPastilles)){
                unset($availablePastilles[$currentKey]);
            }
        }
        // On renvoie une pastille aléatoire dans notre liste des pastilles disponibles
        $i = array_rand($availablePastilles,1);
        return explode('.',$availablePastilles[$i])[0];
    }

    // ************ Classes functions

    /**
     * Return on stdout if the given classe has been added or not
     * Require POST parameters as :
     * $_POST = array(
     *          'classe'=>'' The classe name to add, correspond to 'libelle' in DB
     *      )
     */
    public function addClasse()
    {
        if (isset($_POST['classe'])){
            echo (!$this->classe->exist($_POST['classe']) && $this->classe->add($_POST['classe']))? self::SUCCESS : self::FAILURE;
        }else{
            echo self::FAILURE;
        }
    }

    /**
     * Return on stdout if the given classe has been updated
     * Require POST parameters as :
     * $_POST = array(
     *          'id'=>'' The classe id to update, this value isn't updated
     *          'libelle'=>'' The new classe name to set
     *      )
     */
    public function editClasse(){ // TODO : other error message in case of existing libelle
        if (isset($_POST['id']) && isset($_POST['libelle']) && !$this->classe->exist($_POST['libelle'])){
            echo ($this->classe->set(array('id'=>$_POST['id'],'libelle'=>$_POST['libelle'])))? self::SUCCESS : self::FAILURE;
        }else{
            echo self::FAILURE;
        }
    }

    /**
     * Return on stdout if the given classe has been deleted
     * Require POST parameters as :
     * $_POST = array(
     *          'classe'=>'' The classe id to delete
     *      )
     * If child belong to this classe 'failure' is thrown, 'success' else
     */
    public function deleteClasse(){ // TODO : other error message in case of existing child id classe
        if (isset($_POST['classe']) && $this->classe->assignedChild($_POST['classe']) == 0){
            echo ($this->classe->del($_POST['classe']))? self::SUCCESS : self::FAILURE;
        }else{
            echo self::FAILURE;
        }
    }

    /**
     * Return on stdout all classes formatted as li with input field corresponding to the given keyword
     * Require POST parameters as :
     * $_POST = array(
     *          'classe'=>'' The keyword to search in libelle filed in DB
     *      )
     * If notinh found '' is returned
     */
    public function searchClasse(){
        $result = '';
        if (isset($_POST['classe'])){
            $classes = $this->classe->search($_POST['classe']);

            foreach ($classes as $classe){
                $result.= $this->format->class->toModify($classe);
            }
        }
        echo $result;
    }

    // ************ Book functions

    /**
     * Return on stdout if the given book has been added
     * Require POST parameters as :
     * $_POST = array(
     *          'isbn'=>'',
     *          'titre'=>'',
     *          'auteur'=>'',
     *          'edition'=>'',
     *          'parution'=>'',
     *          'description'=>''
     *      )
     * $_POST['add-path'] ['true'|'false'] say if a file has been uploaded or has to be downloaded
     * If needed an author is added and the book added in DB
     * If needed, a file is downloaded, else it is moved from $_FILE to the correct path
     * Each image is resized to the correct format, see resize function for more information
     * Finally the image access right is updated and the corrcect path is set for the image in DB
     */
    public function addBook()
    {
        $result = "false";
        if (isset($_POST)){
            $toInsert = array(
                'isbn'=>$_POST['isbn'],
                'titre'=>$_POST['titre'],
                'auteur'=>$_POST['auteur'],
                'edition'=>$_POST['edition'],
                'parution'=>$this->format->date($_POST['parution'],"datepicker"),
                'description'=>$_POST['description'],
                'couverture'=>''
            );

            $bpath = ($_POST['add-path'] === 'true')? $_FILES['couverture-local']['tmp_name'] : $_POST['couverture'];
            $theme = explode(';', $_POST['theme']);

            // Using livre model to check if author exist or not, create it if not
            if (!$this->livre->exist(array('auteur'=>$_POST['auteur']))){
                $this->livre->addAuteur($_POST['auteur']);
            }

            if ($this->livre->add($toInsert)){
                $id = $this->db->insert_id();

                // TODO : clean
                if (strpos($bpath,"http:") === 0){ // Download from url

                    // Getting image extension type from url
                    $bookext = '.'.explode('/',get_headers($bpath, 1)["Content-Type"])[1];
                    // Downloading image
                    if(!$this->getBookCoverFromUrl($bpath,$bookext)){
                        // In case of failure
                        echo $result." 1";
                        exit();
                    }
                    // Setting the old name of the book
                    $old = 'lastdownload'.$bookext;

                }else{ // Get from uploaded

                    // Getting the book extension
                    $bookext = '.'.explode('/',$_FILES['couverture-local']['type'])[1];
                    // Moving from $_FILES to local image storage
                    if (!move_uploaded_file($bpath,__DIR__.'/../../'.BOOK_PATH.'lastdownload'.$bookext)){
                        echo $result." 2";
                        exit();
                    }
                    // Setting the old name of the book
                    $old = 'lastdownload'.$bookext;

                }
                // Updating old with full path
                $old = __DIR__.'/../../'.BOOK_PATH.$old;
                // New name for the book
                $couverture = BOOK_PATH.$id.$bookext;

                // Changing access and resizing
                chmod($old,0777);
                $this->resize(__DIR__.'/../../'.BOOK_PATH.'lastdownload'.$bookext);
                // Renaming to the book id and moving it to correct path
                if (!rename($old,__DIR__.'/../../'.$couverture)){
                    echo $result." 3";
                    exit();
                }
                // Updating book
                if ($this->livre->set(array('id'=>$id,'couverture'=>$couverture)) && $this->theme->assignThemeToBook($id,$theme)){
                    $result = self::SUCCESS;
                }
            }
        }
        echo $result;
    }

    /**
     * Return on stdout the books corresponding to the given keyword as two format :
     * Require POST parameters
     * $_POST = array(
     *          'search'=>'' The keyword to be searched in fields : 'titre','auteur','edition','parution'
     *          'display'=>'' The format where to export result can be [''|'toModify'] if nothing given toCatalog is applied, toModify in the other case
     *      )
     * See Formatter class for more information about html formatting
     */
    public function getBook()
    {
        $keyWord = $this->input->post('search');
        $books = $this->livre->search($keyWord);

        if (!isset($_POST['display'])){
            foreach ($books as $book){
                echo $this->format->book->toCatalog($book);
            }
        }
        elseif ($_POST['display'] == 'toModify'){
            foreach ($books as $book){
                echo $this->format->book->toModify($book);
            }
        }
    }

    /**
     * Return on stdout the book list belonging to the theme given in parameter, formatted with toCatalog
     * Require GET parameters as :
     * $_GET = array(
     *          'themeId'=>'' The theme id to filter the book with
     *      )
     * If no book is found return ''
     */
    public function getBookByTheme()
    {
        $id = isset($_GET['themeId'])? $_GET['themeId'] : null;
        $books = $this->livre->getByTheme($id);
        $result = "";

        if (isset($books)){
            foreach ($books as $book){
                $result.=$this->format->book->toCatalog($book);
            }
        }
        echo $result;
    }

    /**
     * Return on stdout if the given book array has been loan returned
     * Require POST parameters as :
     * $_POST = array(
     *          [0]=>array(
     *                  'id_livre'=>'', Those field is used to identify a loan
     *                  'id_eleve'=>'',
     *                  'dateEmprunt'=>''
     *              )
     *          ...
     *      )
     * Return 'success' or 'failure'
     */
    public function returnBook()
    {
        $bookList = $_POST['bookList'];

        foreach ($bookList as $key => $value){
            if ($this->emprunt->set(array('id_livre'=>$value['id_livre'],'id_eleve'=>$value['id_eleve'],'dateEmprunt'=>$value['dateEmprunt'])) === false){
                echo self::FAILURE;
                exit();
            }
        }
        echo self::SUCCESS;
    }

    /**
     * Return on stdout if the given book id has been deleted
     * Require POST parameters as :
     * $_POST = array(
     *          'id_livre'=>'', The book id to delete
     *      )
     * This function delete the book from, Emprunt, ThemeLivre, and Livre table in DB
     * Return 'success' or 'failure'
     */
    public function deleteBook()
    {
        $bookId = $_POST['book'];
        echo ($this->emprunt->del(array('id_livre'=>$bookId))
            && $this->theme->delBook(array('id_livre'=>$bookId))
            && $this->livre->del(array('id'=>$bookId))
        )?
            self::SUCCESS : self::FAILURE ;
    }

    /**
     * Return on stdout if the given book has been updated
     * Require POST parameters as :
     * $_POST = array(
     *          'id'=>'', This field is just used to identify precisely a book, it is not updated
     *          'titre'=>'', Those other fields can be modified
     *          'auteur'=>'',
     *          'edition'=>'',
     *          'description'=>''
     *      )
     * If a file has been uploaded, then a new image is set for the book cover so the 'couverture' field can be updated too
     * A couverture is updated if the file extension has changed (png, jpeg, ...), the file is resized too
     */
    public function editBook()
    {
        if (isset($_POST)){
            $toEdit = array(
                'id'=> $_POST['id'],
                'titre'=>$_POST['titre'],
                'auteur'=>$_POST['auteur'],
                'edition'=>$_POST['edition'],
                'description'=>$_POST['description']
            );

            if ($_FILES['upfile']['tmp_name'] !== ''){
                $toEdit['couverture'] = 'assets/img/livres/'.$_POST['id'].'.'.$this->getExt($_FILES['upfile']['type']);
            }

            echo ($this->livre->set($toEdit) && $this->theme->delBook(array('id_livre'=>$_POST['id'])) && $this->theme->assignThemeToBook($_POST['id'],explode(';',$_POST['themes'])) &&
            ($_FILES['upfile']['tmp_name'] !== '')? ($this->saveFile('assets/img/livres/', $_POST['id'], true) === self::SUCCESS)? true : false : true)?
                self::SUCCESS : self::FAILURE;
        }else{
            echo self::FAILURE;
        }
    }

    // ************ Loan functions

    /**
     * Return on stdout if the loan has been added
     * @param string $bookId The book id to add a loan
     * @param string $userId The user id which has borrowed the book
     * If the book is already borrowed 'failure' is returned 'success' else
     */
    public function addEmprunt(string $bookId, string $userId)
    {
        echo ($this->emprunt->add(array('id_livre'=>$bookId,'id_eleve'=>$userId,'dateEmprunt'=>date('Y-m-d'))))?
            self::SUCCESS : self::FAILURE;
    }

    /**
     * Return the list of loan for the given id, can be user id or classe is if specified in second parameter
     * @param string $id The id to get the loan
     * @param string|null $isClasse The search will be made on classe if this value is != null
     */
    public function getEmprunt(string $id, string $isClasse = null)
    {
        $result="";
        if (!isset($isClasse)){
            $emprunts = $this->emprunt->get(array('id_eleve'=>$id));
            $eleve = $this->user->get(array('id'=>$id))[0];

            $result.="<li class='collection-header center'><h4>Historique des emprunts pour ".$eleve['prenom']." ".$eleve['nom']."</h4></li>";

            foreach ($emprunts as $emprunt){
                $result.=$this->format->book->toLi($emprunt);
            }
        }
        else{
            $childList = $this->eleve->getClasse($id);
            $classe = $this->classe->get(array('id'=>$id))[0];
            $result.="<li class='collection-header center'><h4>Emprunt en cours dans la classe : ".$classe['libelle']."</h4></li>";

            $baselen = strlen($result);
            foreach ($childList as $child){
                $result.= $this->format->book->toLi($this->emprunt->getRunning(array('id_eleve'=>$child['id'])));
            }
            if ($baselen == strlen($result)){
                $result.="<li class='collection-header center'><h5><blockquote>Aucun emprunt en cours dans la classe</blockquote></h5></li>";
            }
        }

        echo $result;
    }

    /**
     * Return on stdout the list of outdated loan, formatted as html <li>
     * See Formatter class for more information
     * The time when a book is outdated is defined in /application/config/constants.php file as TIME_OUTDATED in day
     */
    public function getOutdated()
    {
        $loans = $this->emprunt->getOutdated();
        $res = '';
        if (count($loans) == 0){
            echo self::EMPTY;
            exit();
        }

        foreach ($loans as $loan){
            $res.=$this->format->book->toLi($loan, true);
        }
        echo $res;
    }

    // ************ Themes functions

    /**
     * Return on stdout as a JSON array the list of theme in DB
     */
    public function getThemeList()
    {
        $themes = $this->theme->getAll();
        $tmp = array();
        foreach ($themes as $theme){
            $tmp[] = $theme['nom'];
        }

        echo json_encode($tmp);
    }

    /**
     * Return on stdout the list of main theme in db formatted as an html <option>
     * See Formatter class for more information
     */
    public function getMainThemes()
    {
        $themes = $this->theme->getAll();
        $result = "";
        foreach ($themes as $theme){
            if (count(explode('_',$theme['nom'])) > 1){
                $result.=$this->format->theme->toOption($theme);
            }
        }

        echo $result;
    }

    /**
     * Return on stdout the theme list that the given book id belong to
     * @param string $bookid The book to search
     * the result is formatted as :
     * array(
     *    'main'=>'', Representing the main theme
     *    'secondary'=>array(...), Representing the secondary theme
     * )
     */
    public function getBookThemes(string $bookid)
    {
        $result = array('main'=>null,'secondary'=>array());
        $themes = $this->theme->getAssigned($bookid);

        foreach ($themes as $theme){
            $theme = $this->theme->getName($theme['id_theme']);
            if (!isset($result['main']) && count(explode('_',$theme)) > 1){
                $result['main'] = $theme;
            }else{
                $result['secondary'][] = $theme;
            }
        }

        echo json_encode($result);
    }

    /**
     * Return on stdout if the given theme has been added
     * Require POST parameters as :
     * $_POST = array(
     *          'nom'=>'', The theme name
     *          'file'=>['true'|'false'] Representing if a theme cover has to be saved or not
     *      )
     * The file is save at /assets/img/pastille_theme
     */
    public function addTheme()
    {
        if (isset($_POST['nom'])){
            if ($this->theme->existTheme($_POST['nom'])){
                echo self::EXIST;
                exit();
            }
            $return = self::SUCCESS;
            if ($_POST['file'] === 'true'){
                $return = $this->saveFile(THEME_PATH, explode('_',$_POST['nom'])[1]);
            }
            echo ($this->theme->add($_POST['nom']) && $return === self::SUCCESS)? self::SUCCESS : $return;
        }else{
            echo self::FAILURE;
        }
    }

    /**
     * Return on stdout every book corresponding to the given filter
     * Require POST parameters as :
     * $_POST = array(
     *          'filter'=>'', ['all'|'titre'|'auteur'|'edition'] If 'all' all the books are returned else the second field is used
     *          'data'=>'' The keyword to search if filter is != 'all'
     *      )
     * Book are formated as an html <tr> with checkbox
     * See Formatter class for more information
     */
    public function filterBook()
    {
        if (isset($_POST['filter']) && isset($_POST['data'])){
            if ($_POST['filter'] == "all"){
                $cond = " id IS NOT NULL";
            }else {
                $cond = $_POST['filter'].' LIKE \'%'.$_POST['data'].'%\'';
            }

            $books = $this->livre->get($cond);
            $result = "";

            foreach ($books as $book){
                $result.=$this->format->book->toTab($book);
            }
            echo (strlen($result) > 0)? $result : self::UNKNOWN;
            return;
        }
        echo self::FAILURE;

    }

    /**
     * Return on stdout if the given if the given theme list has been has been added to the given book list
     * Require POST parameters as :
     * $_POST = array(
     *          'themes'=>array(...) Some valid them ids
     *          'books'=>array(...) Some valid book ids
     *      )
     * Each book is associated to each theme
     */
    public function assignThemeToBook()
    {
        if (isset($_POST['books']) && isset($_POST['themes'])){
            $res = true;
            foreach ($_POST['themes'] as $theme){
                $res = $res && $this->theme->assignBookToTheme($theme, $_POST['books']);
            }
            echo $res? self::SUCCESS : self::FAILURE;
            return;
        }
        echo self::FAILURE;
    }

    // ************ Other functions

    /**
     * Return on stdout the whole list of editor as a JSON array as :
     * ['editorName1','editorName2'...]
     */
    public function getEditors()
    {
        $result = [];
        $editors = $this->livre->getAllEditor();

        foreach ($editors as $editor){
            $result[] = $editor['edition'];
        }
        echo json_encode($result);
    }

    /**
     * Return on stdout the whole list of author as a JSON array as :
     * ['auhtorName1','authorName2'...]
     */
    public function getAuthors()
    {
        $result = [];
        $authors = $this->livre->getAllAuthor();

        foreach ($authors as $author){
            $result[] = $author['nom'];
        }
        echo json_encode($result);
    }

    // ************ Private methods only used here

    /**
     * Get the file from the given url and put it at BOOK_PATH/lastdownload.?
     * @param string $url
     * @param $ext
     * @return bool
     */
    private function getBookCoverFromUrl(string $url, $ext): bool
    {
        $img = __DIR__.'/../../'.BOOK_PATH.'lastdownload'.$ext;
        return file_put_contents($img, file_get_contents($url));
    }

    /**
     * Resise the book at the given path to the size of 330x475
     * @param string $book The path to the book to resize
     * @return string Error log or 'success'
     */
    private function resize(string $book) : string
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $book;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width']     = BOOK_PIC_WIDTH;
        $config['height']   = BOOK_PIC_HEIGHT;
        $this->load->library('image_lib',$config);

        if(!$this->image_lib->resize()){
            return $this->image_lib->display_errors('<p>', '</p>');
        }
        return self::SUCCESS;
    }

    /**
     * Save the file uploaded in $_FILE['upfile'] to the given
     * @param string $pathToSave Take his origin from __DIR__/../../ which is at the root of the website,
     *                           by default the file is saved at __DIR__/../../assets/img/
     * @param string $filename The name to give to the file, if not given $_FILE[upfile][tmp_name] passed in sha1 is given
     * @param bool $resize If the file has to be resized, see $this->resize() for more info
     * @return string 'success' if all step passed or the string describing the error source in other case
     */
    private function saveFile(string $pathToSave = 'assets/img/', string $filename = 'none', bool $resize = false): string
    {
        if (!isset($pathToSave))
            $pathToSave = 'assets/img/';

        try {
            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
            ) {
                throw new RuntimeException(self::PARAMS);
            }

            // Check $_FILES['upfile']['error'] value.
            switch ($_FILES['upfile']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException(self::EMPTY);
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException(self::SIZE);
                default:
                    throw new RuntimeException(self::UNKNOWN);
            }

            // You should also check filesize here.
            if ($_FILES['upfile']['size'] > 1000000) {
                throw new RuntimeException(self::SIZE);
            }

            // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                    $finfo->file($_FILES['upfile']['tmp_name']),
                    array(
                        'jpg' => 'image/jpeg',
                        'jpeg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif',
                    ),
                    true
                )) {
                throw new RuntimeException(self::FORMAT);
            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            $destination = ($filename == 'none')?
                sprintf($pathToSave.'%s.%s',sha1_file($_FILES['upfile']['tmp_name']),$ext)
                :
                $pathToSave.$filename.'.'.$ext
            ;

            if (!move_uploaded_file($_FILES['upfile']['tmp_name'], __DIR__.'/../../'.$destination)) {
                echo 'upload';
                throw new RuntimeException(self::UPLOAD);
            }

            if ($resize){
                if ($this->resize(__DIR__.'/../../'.$destination) !== 'success'){
                    echo 'resize';
                    throw new RuntimeException(self::RESIZE);
                }
            }

            return self::SUCCESS;

        } catch (RuntimeException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Return the extension corresponding to the given mime type, '' if not corresponding
     * @param $type string The mime type to search
     * @return string The extension (jpg, png, ..) corresponding to the type or ''
     */
    private function getExt($type) : string
    {
        $mime_image_type = array(
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        );

        $ext = '';
        if (false === $ext = array_search($type,$mime_image_type,true)){
            return '';
        }
        return $ext;
    }

}