<?php

class Ajax extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('Formatter',null,'format');
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

    public function getEmprunt(string $id, string $isClasse = null)
    {
        $result="";
        if (!isset($isClasse)){
            $emprunts = $this->emprunt->get(array('id_eleve'=>$id));

            foreach ($emprunts as $emprunt){
                $result.=$this->format->book->toLi($emprunt);
            }
        }
        else{
            $childList = $this->eleve->getClasse($id);
            foreach ($childList as $child){
                $result.= $this->format->book->toLi($this->emprunt->getRunning(array('id_eleve'=>$child['id'])));
            }
        }

        echo $result;
    }
}