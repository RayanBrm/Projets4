<?php

class Formatter
{
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function bookToCatalog(array $data)
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

    public function childToLog(array $child): string
    {
        $img = "assets/img/".$child['pastille'].".png";
        $alt = $child['pastille'];
        $link = "child/connect/".$child['id'];

        return "<div class='col i'>".
                    "<a href='". base_url($link) ."'>".
                        "<img src='". base_url($img) ."' alt='".$alt."'>".
                    "</a>".
                "</div>";
    }
}