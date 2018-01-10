<?php

class Main extends CI_Controller
{
    public $level = array();

    public function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION)){
            session_start();
        }

        $this->load->library('Formatter',null,'format');
        $this->levelInit();
    }

    public function index()
    {
        $this->catalogue();
    }

    /**
     * Controller fot catalogue page load the catalog
     * @param int $page if given load the page number
     */
    public function catalogue(int $page = 1)
    {
        if (!$this->isLogged()){
            $data['script'] = '<script src="'.base_url().'assets/js/index.js" type="text/javascript"></script>';
            $data['ajax'] = includeAJAX();
            $data['books'] = $this->loadBooks($page);

            $this->load->view('main/catalogue',$data);
        }
        else{
            redirect('accueil');
        }
    }

    /**
     * Main page, routed with accueil
     * @param int $page if given load the page number
     */
    public function main(int $page = 1)
    {
        if ($this->isLogged()){
            $data['books'] = $this->loadBooks($page);
            $data['script'] = '<script src="'.base_url().'assets/js/index.js" type="text/javascript"></script>';
            $data['ajax'] = includeAJAX();
            $this->load->view('main/main',$data);
        }
        else{
            redirect('catalogue');
        }
    }

    public function historique()
    {
        $data['classes'] = "";
        $listeClasses = $this->Classe_model->getAll();
        foreach ($listeClasses as $uneClasse){
            $data['classes'].=$this->format->classeToOption($uneClasse);
        }

        $this->load->view('main/historique', $data);
    }

    public function gestionbu()
    {
        $this->load->view('main/gestionbu');
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

        if (isset($user) && ($user['role'] === $this->level['Administrateur'] || $user['role'] === $this->level['Professeur']) && password_verify($pwd,$user['motdepasse'])){
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
     * Initialize $this->level
     */
    private function levelInit()
    {
        $levels = $this->user->getLevels();

        foreach ($levels as $level){
            $this->level[$level['libelle']] = $level['id'];
        }
    }

    /**
     * Check if the user has been identified
     * @return bool
     */
    private function isLogged(): bool
    {
        return isset($_SESSION['user']['id']);
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
            $data.= $this->format->bookToCatalog($book);
        }

        return $data;
    }

}



