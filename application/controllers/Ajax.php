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
                'role'=>'3',
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
        if (isset($_SESSION) && $_SESSION['user']['role'] === '1' && isset($_POST['userId'])) {
            echo ($this->user->del(array('id' => $_POST['userId'])))? self::SUCCESS : self::FAILURE;
        }else{
            echo self::FAILURE;
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
        if (isset($_POST['id'])){
            if (!($_SESSION['user']['role'] == "2" && $_POST['role'] == "1")){
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
                $this->resize($bookext);
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
        echo ($this->emprunt->del(array('id_livre'=>$bookId)) && $this->theme->delBook(array('id_livre'=>$bookId)) && $this->livre->del(array('id'=>$bookId)))?
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
                //'themes' => json_decode($_POST['themes'])
            );

            echo ($this->livre->set($toEdit) && $this->theme->delBook(array('id_livre'=>$_POST['id'])) && $this->theme->assignThemeToBook($_POST['id'],$_POST['themes']))?
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
            $result = true;
            $return = self::FAILURE;
            if (count(explode('_',$_POST['nom'])) > 1){
                $return = $this->saveFile(__DIR__.'/../../'.THEME_PATH);
            }
            echo ($this->theme->add($_POST['nom']) && $result)? self::SUCCESS : $return;
        }else{
            echo self::FAILURE;
        }
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

    private function resize(string $ext)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = '/home/guillaume/Projets4/assets/img/livres/lastdownload'.$ext;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width']     = BOOK_PIC_WIDTH;
        $config['height']   = BOOK_PIC_HEIGHT;
        $this->load->library('image_lib',$config);

//        $this->image_lib->clear();
//        $this->image_lib->initialize($config);

        if(!$this->image_lib->resize()){
            //dump($this->image_lib);
            $this->image_lib->display_errors('<p>', '</p>');
        }
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

    private function saveFile($pathToSave = '/assets/img/'): string
    {
        // FROM PHP DOCS
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
            if (!move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                sprintf($pathToSave.'%s.%s',
                    sha1_file($_FILES['upfile']['tmp_name']),
                    $ext
                )
            )) {
                throw new RuntimeException(self::UPLOAD);
            }

            return self::SUCCESS;

        } catch (RuntimeException $e) {
            return $e->getMessage();
        }
    }

}