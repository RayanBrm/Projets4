<?php

class Child extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION)){
            session_start();
        }
        $this->load->library('Formatter',null,'format');
    }

    public function index(){
        $this->main();
    }

    public function main()
    {
        if ($this->isLogged()){
            $this->load->view('child/main');
        }
        else{
            redirect('connexionEleve');
        }
    }

    public function connexionEleve()
    {
        $data['childs'] = "";
        $data['classes'] = "";

        $childs = $this->eleve->getAll();
        foreach ($childs as $child){
            $data['childs'].= $this->format->child->toLog($child);
        }

        $listeClasses = $this->classe->getAll();
        foreach ($listeClasses as $uneClasse){
            $data['classes'].=$this->format->class->toOption($uneClasse);
        }

        $this->load->view('main/connexionEleve', $data);
    }

    public function connect(string $childID)
    {
        if (isset($childID)){
            $_SESSION['child'] = $this->user->get(array('id'=>$childID))[0];
            redirect('child/main');
        }
        else{
            redirect('connexionEleve');
        }
    }

    public function disconnect()
    {
        unset($_SESSION['child']);
    }

    private function isLogged(){
        return isset($_SESSION['child']);
    }

    /****** Chargement du catalogue pour les élèves ******/

    private function loadBooks(int $page = 1): string
    {
        $data = "";
        $books = $this->livre->getPage($page);

        foreach ($books as $book){
            $data.= $this->format->book->toChildCatalog($book);
        }

        return $data;
    }

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

}