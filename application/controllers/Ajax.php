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

    public function getUser()
    {
        $keyWord = $_POST['search'];
        $result = "";

        $users = $this->user->search($keyWord,'util');

        if (count($users) > 0){
            foreach ($users as $user){
                $result.= $this->format->user->toLi($user);
            }
        }

        echo $result;
    }
}