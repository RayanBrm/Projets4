<?php

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION)){
            session_start();
        }

        $this->load->library('Formatter',null,'format');
    }

    public function index()
    {
        $this->catalogue();
    }

    /**
     * Controller fot catalogue page load the catalog
     * The default number of book per page is defined in config/constants.php
     */
    public function catalogue()
    {
        $page = isset($_GET['page'])? $_GET['page'] : 1 ;

        if (!$this->isLogged()){

            $data['maxPage'] = $this->livre->maxPage();
            if ($page > $data['maxPage'] || $page <= 0){
                $page = $data['maxPage'];
            }
            $data['books'] = $this->loadBooks($page);
            $data['currentPage'] = $page;

            $data['mainThemes'] = "";
            $data['secondaryThemes'] = "";

            $themes = $this->theme->getAll();
            foreach ($themes as $theme){
                if (count(explode('_',$theme['nom'])) > 1){
                    $data['mainThemes'].=$this->format->theme->toOption($theme);
                }else{
                    $data['secondaryThemes'].=$this->format->theme->toOption($theme);
                }
            }

            $this->load->view('main/catalogue',$data);
        }
        else{
            redirect('accueil');
        }
    }

    /**
     * Load the given page of the catalog
     * @param int $page
     * @return string
     */
    private function loadBooks(int $page = 1): string
    {
        $data = "";
        $books = $this->livre->getPage($page);

        foreach ($books as $book){
            $data.= $this->format->book->toCatalog($book);
        }

        return $data;
    }

    /**
     * Main page, routed with accueil
     * The default number of book per page is defined in config/constants.php
     */
    public function main()
    {
        $page = isset($_GET['page'])? $_GET['page'] : 1 ;
        if ($this->isLogged()){

            $data['maxPage'] = $this->livre->maxPage();
            if ($page > $data['maxPage'] || $page <= 0){
                $page = $data['maxPage'];
            }
            $data['books'] = $this->loadBooks($page);
            $data['currentPage'] = $page;

            $data['mainThemes'] = "";
            $data['secondaryThemes'] = "";

            $themes = $this->theme->getAll();
            foreach ($themes as $theme){
                if (count(explode('_',$theme['nom'])) > 1){
                    $data['mainThemes'].=$this->format->theme->toOption($theme);
                }else{
                    $data['secondaryThemes'].=$this->format->theme->toOption($theme);
                }
            }

            $this->load->view('main/main',$data);
        }
        else{
            redirect('catalogue');
        }
    }

    public function administration()
    {
        if ($this->isLogged()){
            // TODO
            if (isset($_SESSION['child'])){
                $data['lock'] = "all";
            } elseif ($_SESSION['user']['role'] == "1"){
                $data['lock'] = "none";
            } elseif ($_SESSION['user']['role'] == "2"){
                $data['lock'] = "none";
            }

            $data['classList'] = "";
            $data['classeLiList'] = '';
            $data['childCardList'] = '';

            $listeClasses = $this->classe->getAll();
            foreach ($listeClasses as $uneClasse){
                $data['classList'].=$this->format->class->toOption($uneClasse);
            }

            $classes = $this->classe->getAll();
            foreach ($classes as $class){
                $data['classeLiList'].=$this->format->class->toLi($class);
            }

            $eleves = $this->user->getAllChild();
            foreach ($eleves as $eleve){
                $data['childCardList'].=$this->format->child->toCard($eleve);
            }

            $this->load->view('main/administration',$data);
        }else
            redirect('catalogue');
    }

    public function historique()
    {
        if ($this->isLogged()){
            $data['classes'] = "";
            $listeClasses = $this->classe->getAll();
            foreach ($listeClasses as $uneClasse){
                $data['classes'].=$this->format->class->toOption($uneClasse);
            }

            $data['emprunts'] = "<li class=\"collection-header center\"><h4>Emprunt de ".$_SESSION['user']['prenom']." ".$_SESSION['user']['nom']."</h4></li>";

            $baselen = strlen($data['emprunts']);
            $emprunts = $this->emprunt->get(array('id_eleve'=>$_SESSION['user']['id']));
            foreach ($emprunts as $emprunt){
                $data['emprunts'].=$this->format->book->toLi($emprunt);
            }

            if ($baselen == strlen($data['emprunts'])){
                $data['emprunts'].= "<li class=\"collection-header center\"><h5><blockquote>Vous n'avez encore jamais emprunter de livre!</blockquote></h5></li>";
            }

            $this->load->view('main/historique', $data);
        }
        else
            redirect('catalogue');

    }

    public function gestionbu()
    {
        if ($this->isLogged()){
            $this->load->view('main/gestionbu');
        }
        else
            redirect('catalogue');

    }

    public function gestionutil(){
        if ($this->isLogged()){
            $data['classList'] = "";
            $listeClasses = $this->classe->getAll();
            foreach ($listeClasses as $uneClasse){
                $data['classList'].=$this->format->class->toOption($uneClasse);
            }

            $this->load->view('main/gestionutil',$data);
        }
        else
            redirect('catalogue');
    }

    public function gestionglobal()
    {
        if ($this->isLogged()){
            $data['classeLiList'] = '';
            $data['childCardList'] = '';

            $classes = $this->classe->getAll();
            foreach ($classes as $class){
                $data['classeLiList'].=$this->format->class->toLi($class);
            }

            $eleves = $this->user->getAllChild();
            foreach ($eleves as $eleve){
                $data['childCardList'].=$this->format->child->toCard($eleve);
            }

            $this->load->view('main/gestionGlobal', $data);
        }else{
            redirect('utilisateur');
        }
    }

    public function gestiontheme()
    {
        if ($this->isLogged()){
            $this->load->view('main/gestionTheme');
        }else{
            redirect('utilisateur');
        }
    }

    public function modifier()
    {
        if ($this->isLogged()){
            $what = $_GET['what'];
            $who = $_GET['who'];

            if (isset($what) && $what == "user"){
                $data['user'] = $this->user->get(array('id'=>$who))[0];

                if ($data['user']['role'] == "3"){
                    $data['classList'] = "";
                    $data['pastilles'] = "";

                    $classes = $this->classe->getAll();

                    foreach ($classes as $classe){
                        $data['classList'].=$this->format->class->toOption($classe);
                    }

                    $usedPastilles = $this->eleve->getUsedPastilleFromClasse($data['user']['classe']);
                    $availablePastilles = scandir(__DIR__.'/../../assets/img/pastilles_eleve');
                    $availablePastilles = array_diff($availablePastilles, array('.', '..'));

                    $data['pastilles'].=$this->format->pastilleToOption($data['user']['pastille']);
                    foreach ($availablePastilles as $currentKey => $currentValue) {
                        if (!in_array(explode('.',$availablePastilles[$currentKey])[0],$usedPastilles)){
                            $data['pastilles'].=$this->format->pastilleToOption(explode('.',$currentValue)[0]);
                        }
                    }
                }

                $this->load->view('main/modifierUtilisateur',$data);
            }
            elseif (isset($what) && $what == "book"){
                $data['book'] = $this->livre->get(array('id'=>$who))[0];
                $data['themeList'] = "";

                $themes = $this->theme->getAll();
                foreach ($themes as $theme){
                    if (count(explode('_',$theme['nom'])) > 1){
                        $data['themeList'].=$this->format->theme->toOption($theme);
                    }
                }

                $this->load->view('main/modifierLivre',$data);
            }
        }
        else
            redirect('catalogue');
    }

    /**
     * Controller for the connexion page
     */
    public function connexion(){
        if (!$this->isLogged()){
            $this->load->view('main/connexion');
        }
        else{
            redirect('accueil');
        }
    }

    /**
     * Connect the user with given post credentials
     */
    public function connect()
    {
        $login = $_POST['login'];
        $pwd = $_POST['pwd'];

        $user = $this->user->get(array('identifiant'=>$login))[0];

        if (isset($user) && ($user['role'] === $this->level['Administrateur'] || $user['role'] === $this->level['Professeur']) && password_verify($pwd,$user['motdepasse'])){//$pwd == $user['motdepasse']){
            $_SESSION['user'] = $user;
            redirect('accueil');
        }
        else{
            $_SESSION['log_error'] = true;
            redirect('connexion');
        }
    }

    /**
     * Disconnect user by destroying $_SESSION data
     */
    public function disconnect()
    {
        $_SESSION = array();
        redirect('catalogue');
    }

    /**
     * Check if the user has been identified
     * @return bool
     */
    private function isLogged(): bool
    {
        return isset($_SESSION['user']['id']);
    }

}



