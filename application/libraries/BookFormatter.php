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
                        "<img class='activator' src='".base_url().$data['couverture']."'>".
                    "</div>".
                    "<div class='card-content'>".
                        "<span class='card-title activator grey-text text-darken-4 truncate'>".$data['titre']."</span>".
                        "<p><a href='#' >Description</a></p>".
                    "</div>".
                    "<div class='card-reveal'>".
                        "<span class='card-title grey-text text-darken-4'>".$data['titre']."<i class='material-icons right'>close</i></span>".
                    "<p><ul class='pink-text'>".
                            "<li>Auteur : ".$data['auteur']."</li>".
                            "<li>Genre : "."</li>".
                    "</ul></p>".
                    "</div>".
                  "</div>";

        return $result;
    }


    public function toChildCatalog(array $data)
    {
        $result = "<div class='card col s3 '>".
            "<div class='card-image waves-effect waves-block waves-light'>".
            "<img class='activator' src='".base_url().$data['couverture']."'>".
            "</div>".
            "<div class='card-content'>".
            "<span class=' activator grey-text text-darken-4 truncate'>".$data['titre']."</span>".
            "</div>".
            "<div class='card-reveal'>".
            "<span class='card-title grey-text text-darken-4'>".$data['titre']."<i class='material-icons right'>close</i></span>".
            "<p><ul class='pink-text'>".
            "<li>Auteur : ".$data['auteur']."</li>".
            "<li>Genre : "."</li>".
            "</ul></p>".
            "</div>".
            "</div>";

        return $result;
    }

    public function toLi(?array $emprunt): string //$emprunt est un livre
    {
        if (isset($emprunt)){
            $bookTitle = $this->CI->livre->get(array('id'=>$emprunt['id_livre']))[0]['titre'];
            $color = (isset($emprunt['dateRendu']))? 'green ligthen-1' : 'red accent-1' ;
            $checkBox = (isset($emprunt['dateRendu']))? '' : "<div style=\"text-indent: 20px;\" ><input type='checkbox' id='test1' /> <label for='test1'>Rendu ?</label></div>" ;

            return "<li>".
                        "<div class='collapsible-header ".$color."'>".
                            "<i class='material-icons'>book</i>".$bookTitle.
                        "</div>".
                        "<div class='collapsible-body'><span>Date d'emprunt : ".$emprunt['dateEmprunt'].", Date de rendu : ".$emprunt['dateRendu']."</span></div>".
                        $checkBox.
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
}