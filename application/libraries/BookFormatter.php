<?php

class BookFormatter implements FormatterInterface
{

    private $CI;

    public function __construct(CI_Controller $CI_Instance)
    {
        $this->CI = $CI_Instance;
    }

    public function toCatalog(array $data)
    {
        $result = "<div class='card col s3 '>".
                    "<div class='card-image waves-effect waves-block waves-light'>".
                        "<img class='activator' src='".base_url().$data['couverture']."' onerror=\"this.onerror=null;this.src='/assets/img/livres/nf.gif'\">".
                    "</div>".
                    "<div class='card-content'>".
                        "<span class='title activator grey-text text-darken-4'>".$data['titre']."</span>".
                    "</div>".
                    "<div class='card-reveal'>".
                        "<span class='card-title grey-text text-darken-4'>".$data['titre']."</span>".
                        "<span><i class='material-icons right card-title'>close</i></span>".
                        "<p>".
                            "<ul class='pink-text'>".
                                "<li>Auteur : ".$data['auteur']."</li>".
                                "<li>Genre : "."</li>".
                            "</ul>".
                        "</p>".
                        "<a class=\"btn-floating btn-large waves-effect waves-light red lighten-3 tooltipped\" data-position=\"bottom\" data-delay=\"50\" data-tooltip=\"Emprunter\" onclick=\"loan(".$data['id'].")\">".
                            "<i class=\"material-icons\">get_app</i>".
                        "</a>".
                    "</div>".
                  "</div>";

        return $result;
    }


    public function toChildCatalog(array $data)
    {
        return $this->toCatalog($data);
    }

    public function toLi(?array $emprunt, bool $outaded = false): string //$emprunt est un livre
    {
        if (isset($emprunt)){
            if ($outaded){
                $user = $this->CI->user->get(array('id'=>$emprunt['id_eleve']))[0];
                $uName = '<span class="right-align">Emprunteur : '.$user['prenom'].' '.$user['nom'].'</span>';
            } else{
                $uName = "";
            }

            $uid = uniqid();

            $bookTitle = $this->CI->livre->get(array('id'=>$emprunt['id_livre']))[0]['titre'];
            $color = (isset($emprunt['dateRendu']))? 'green ligthen-1' : 'red accent-1' ;
            $checkBox = (isset($emprunt['dateRendu']))? '' : "<div style=\"text-indent: 20px;\"><input type='checkbox' id='".$uid."' onchange='toggleBook(this)' /> <label for='".$uid."'>Rendu ?</label></div>" ;
            $hiddenFieldForId = (isset($emprunt['dateRendu']))? '' : '<input type="text" id="'.$uid.'_id" value="'.$emprunt['id_livre'].'" hidden/>' ;
            $hiddenFieldForChild = (isset($emprunt['dateRendu']))? '' : '<input type="text" id="'.$uid.'_child" value="'.$emprunt['id_eleve'].'" hidden/>' ;
            $hiddenFieldForDate = (isset($emprunt['dateRendu']))? '' : '<input type="text" id="'.$uid.'_date" value="'.$emprunt['dateEmprunt'].'" hidden/>' ;

            return "<li>".
                        "<div class='collapsible-header ".$color."'>".
                                "<i class='material-icons'>book</i>".$bookTitle.' '.$uName.
                        "</div>".
                        "<div class='collapsible-body'><span>Date d'emprunt : ".$emprunt['dateEmprunt'].", Date de rendu : ".$emprunt['dateRendu']."</span>".
                        "</div>".
                        $checkBox.
                        $hiddenFieldForId.
                        $hiddenFieldForChild.
                        $hiddenFieldForDate.
                   "</li>";
        }
        return "";
    }

    public function toOption(array $book): string
    {
        return "<option value='".$book['id']."'>".$book['titre']." ".$book['auteur']."</option>";
    }

    public function toModify(?array $book): string
    {
        if (isset($book)){
            $bookid = $book['id'];

            return "<li class=\"collection-item\">".
                        "<div>".
                            $book['titre'].
                            "<a href='".base_url('modifier?what=book&who='.$bookid)."' class=\"secondary-content red-text lighten-2\">".
                                "<i class=\"material-icons \">edit</i>".
                            "</a>".
                            "<a class=\"secondary-content red-text lighten-2\" href='#' onclick='deleteBook(".$bookid.")' >".
                                "<i class=\"material-icons\">clear</i>".
                            "</a>".
                        "</div>".
                    "</li>";
        }
        return "";
    }

    public function toTab(array $book): string
    {
        return "<tr><td>".$book['titre']."</td><td>".$book['auteur']."</td><td><input type=\"checkbox\" id=\"".$book['id']."\"/><label for=\"".$book['id']."\">Selectionner</label></td></tr>";
    }
}