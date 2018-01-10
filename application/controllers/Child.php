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
            $data['childs'].= $this->format->childToLog($child);
        }

        $listeClasses = $this->Classe_model->getAll();
        foreach ($listeClasses as $uneClasse){
            $data['classes'].=$this->format->classeToOption($uneClasse);
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

}