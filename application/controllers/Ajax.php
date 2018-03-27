<?php

class Ajax extends CI_Controller
{
   private const PARAMS = 'params';
   private const EMPTY = 'empty';
   private const SIZE = 'size';
   private const UNKNOWN = 'unknown';
   private const FORMAT = 'format';
   private const UPLOAD = 'upload';
   private const FORBID = 'forbidden';
   private const INCOMPLETE = 'incomplete';
   private const EXIST = 'exist';
   private const RESIZE = 'resize';

   private const FAILURE = 'failure';
   private const SUCCESS = 'success';

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Formatter',null,'format');
        if (!isset($_SESSION)){
            session_start();
        }
    }

    // *********** Classes functions

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
            }
        }

        echo $result;
    }

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

    // ************ Classes functions

    public function addClasse()
    {
        if (isset($_POST['classe'])){
            echo (!$this->classe->exist($_POST['classe']) && $this->classe->add($_POST['classe']))? self::SUCCESS : self::FAILURE;
        }else{
            echo self::FAILURE;
        }
    }

    public function editClasse(){ // TODO : other error message in case of existing libelle
        if (isset($_POST['id']) && isset($_POST['libelle']) && !$this->classe->exist($_POST['libelle'])){
            echo ($this->classe->set(array('id'=>$_POST['id'],'libelle'=>$_POST['libelle'])))? self::SUCCESS : self::FAILURE;
        }else{
            echo self::FAILURE;
        }
    }

    public function deleteClasse(){ // TODO : other error message in case of existing child id classe
        if (isset($_POST['classe']) && $this->classe->assignedChild($_POST['classe']) == 0){
            echo ($this->classe->del($_POST['classe']))? self::SUCCESS : self::FAILURE;
        }else{
            echo self::FAILURE;
        }
    }

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
//    TODO : finish access implementation for books
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

    public function deleteBook()
    {
        $bookId = $_POST['book'];
        echo ($this->emprunt->del(array('id_livre'=>$bookId))
            && $this->theme->delBook(array('id_livre'=>$bookId))
            && $this->livre->del(array('id'=>$bookId))
        )?
            self::SUCCESS : self::FAILURE ;
    }

    public function editBook()
    {
        // TODO : edit book cover
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

    public function addEmprunt(string $bookId, string $userId)
    {
        echo ($this->emprunt->add(array('id_livre'=>$bookId,'id_eleve'=>$userId,'dateEmprunt'=>date('Y-m-d'))))?
            self::SUCCESS : self::FAILURE;
    }

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

    public function getThemeList()
    {
        $themes = $this->theme->getAll();
        $tmp = array();
        foreach ($themes as $theme){
            $tmp[] = $theme['nom'];
        }

        echo json_encode($tmp);
    }

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

    public function addTheme()
    {
        if (isset($_POST['nom'])){
            $return = self::SUCCESS;
            if ($_POST['file'] === 'true'){
                $return = $this->saveFile(THEME_PATH, explode('_',$_POST['nom'])[1]);
            }
            echo ($this->theme->add($_POST['nom']) && $return === self::SUCCESS)? self::SUCCESS : $return;
        }else{
            echo self::FAILURE;
        }
    }

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

    public function getEditors()
    {
        $result = [];
        $editors = $this->livre->getAllEditor();

        foreach ($editors as $editor){
            $result[] = $editor['edition'];
        }
        echo json_encode($result);
    }

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

    private function getBookCoverFromUrl(string $url, $ext): bool
    {
        $img = __DIR__.'/../../'.BOOK_PATH.'lastdownload'.$ext;
        return file_put_contents($img, file_get_contents($url));
    }

    /**
     * Resise the book at the given path to the size of 330x475
     * @param string $book
     * @return string
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

//        $this->image_lib->clear();
//        $this->image_lib->initialize($config);

        if(!$this->image_lib->resize()){
            //dump($this->image_lib);
            return $this->image_lib->display_errors('<p>', '</p>');
        }
        return 'success';
    }

    public function getAleaPastille(string $classId): string
    {
        $usedPastilles = $this->eleve->getUsedPastilleFromClasse($classId);
        $availablePastilles = scandir(__DIR__.'/../../assets/img/pastilles_eleve');
        // On supprime les references au dossier courant '.' et au dossier parent '..'
        $availablePastilles = array_diff($availablePastilles, array('.', '..'));

        foreach ($availablePastilles as $currentKey => $currentValue) {
            if (in_array(explode('.',$availablePastilles[$currentKey])[0],$usedPastilles)){
                unset($availablePastilles[$currentKey]);
            }
        }

        $i = array_rand($availablePastilles,1);
        return explode('.',$availablePastilles[$i])[0];
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