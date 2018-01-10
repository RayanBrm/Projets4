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

        foreach ($books as $book){
            echo $this->format->bookToCatalog($book);
        }
    }

    public function getClasse(string $classeID, string $displayMode)
    {
        if ($classeID == '0'){
            $classe = $this->eleve->getAll();
        }
        else{
            $classe = $this->eleve->getClasse($classeID);
        }
        $result = "";

        foreach ($classe as $eleve){
            if ($displayMode == 'log'){
                $result.=$this->format->childToLog($eleve);
            }
            elseif ($displayMode == 'option'){
                $result.=$this->format->childToOption($eleve);
            }
        }

        echo $result;
    }
}