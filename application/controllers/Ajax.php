<?php

class Ajax extends CI_Controller
{
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
            $classe = $this->eleve->getAll();
        }
        else{
            $classe = $this->eleve->getClasse($classeID);
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

                if ($this->user->add($user)) {
                    echo 'success';
                } else {
                    echo 'failure';
                }
            }else{
                echo 'exist';
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

            if ($this->user->add($child)) {
                echo 'success';
            } else {
                echo 'failure';
            }
        } else { // Should not appear
            echo 'incomplete';
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
            if ($this->user->del(array('id' => $_POST['userId']))) {
                echo "true";
            } else {
                echo "false";
            }
            exit();
        }
        echo "false";
        dump($_SESSION);
    }

    public function changeChildClass(){
        if (isset($_POST['childs']) && isset($_POST['classe'])){
            $childs = json_decode($_POST['childs']);
            $classe = $_POST['classe'];
            $result = true;

            foreach ($childs as $child){
                $result == $result && $this->eleve->set(array('id'=>$child,'classe'=>$classe));
            }

            echo ($result)? 'success' : 'fail';
        }else{
            echo 'fail';
        }
    }

    // ************ Classes functions

    public function addClasse()
    {
        if (isset($_POST['classe'])){
            echo (!$this->classe->exist($_POST['classe']) && $this->classe->add($_POST['classe']))? 'success' : 'failure' ;
        }else{
            echo 'failure';
        }
    }

    public function editClasse(){
        if (isset($_POST['classe'])){
            //echo ($this->classe->set(array('id'=>)))
        }else{
            echo 'failure';
        }
    }

    public function deleteClasse(){
        if (isset($_POST['classe'])){
            echo ($this->classe->del($_POST['classe']))? 'success' : 'failure';
        }else{
            echo 'failure';
        }
    }

    public function searchClasse(){
        if (isset($_POST['classe'])){
            $classes = $this->classe->search($_POST['classe']);
            $result = '';

            foreach ($classes as $classe){
                $result.= $this->format->class->toModify($classe);
            }
            echo $result;
        }else{
            echo '';
        }
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
                // TODO : better access => returned by set?
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
                    $result = "true";
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

    public function returnBook()
    {
        $bookList = $_POST['bookList'];

        foreach ($bookList as $key => $value){
            if ($this->emprunt->set(array('id_livre'=>$value['id_livre'],'id_eleve'=>$value['id_eleve'],'dateEmprunt'=>$value['dateEmprunt'])) === false){
                echo "false";
                exit();
            }
        }
        echo "true";
    }

    public function deleteBook()
    {
        $bookId = $_POST['book'];

        if($this->emprunt->del(array('id_livre'=>$bookId)) && $this->theme->delBook(array('id_livre'=>$bookId)) && $this->livre->del(array('id'=>$bookId))){
            echo "true";
        }
        else{
            echo "false";
        }
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

            $result = $this->livre->set($toEdit);
            $result = $result && $this->theme->delBook(array('id_livre'=>$_POST['id'])) && $this->theme->assignThemeToBook($_POST['id'],$_POST['themes']);

            echo $result? 'success' : 'failure';

        }else{
            echo 'failure';
        }
    }

    // ************ Loan functions

    public function addEmprunt(string $bookId, string $userId)
    {
        $result = 'false';

        if ($this->emprunt->add(array('id_livre'=>$bookId,'id_eleve'=>$userId,'dateEmprunt'=>date('Y-m-d')))){
            $result = 'true';
        }
        echo $result;
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

}