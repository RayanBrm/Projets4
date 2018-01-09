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
        $result = "";

        echo "<div class='card col s3'>".
                "<div class='card-image waves-effect waves-block waves-light'>".
                    "<img class='activator' src='".base_url().$data['couverture']."'>".
                "</div>".
                "<div class='card-content'>".
                    "<span class='card-title activator grey-text text-darken-4'>".$data['titre']."</span>".
                    "<p><a href='#' >Description</a></p>".
                    "<div class='card-reveal'>".
                        "<span class='card-title grey-text text-darken-4'>".$data['titre']."<i class='material-icons right'>close</i></span>".
                        "<p><ul class='pink-text'>".
                            "<li>Auteur : ".$data['auteur']."</li>".
                            "<li>Genre : ".$data['theme']."</li>".
                        "</ul></p>".
                    "</div>".
                "</div>".
             "</div>";

        return $result;
    }
}