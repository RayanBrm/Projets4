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

    public function toLi(?array $emprunt): string //$emprunt est un livre
    {
        if (isset($emprunt)){
            $bookTitle = $this->CI->livre->get(array('id'=>$emprunt['id_livre']))[0]['titre'];
            $color = (isset($emprunt['dateRendu']))? 'green ligthen-1' : 'red accent-1' ;

            return "<li>".
                "<div class='collapsible-header ".$color."'><i class='material-icons'>book</i>".$bookTitle."</div>".
                "<div class='collapsible-body'><span>Date d'emprunt : ".$emprunt['dateEmprunt'].", Date de rendu : ".$emprunt['dateRendu']."</span></div>".
                "<div style=\"text-indent: 20px;\" ><input type='checkbox' id='test1' /> <label for='test1'>Rendu ?</label></div>".
                "</li>";
        }
        return "";

    }

    public function toOption(array $book)
    {
        return "<option value='".$book['id']."'>".$book['titre']." ".$book['auteur']."</option>";
    }
}