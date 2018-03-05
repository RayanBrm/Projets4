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

            $this->load->view('child/main',$data);
        }
        else{
            redirect('connexionEleve');
        }
    }

    public function connexionEleve()
    {
        if (!$this->isLogged()){
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
        else{
            redirect('child/main');
        }
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
        redirect('connexionEleve');
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

}