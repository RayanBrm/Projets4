<?php

class ChildFormatter implements FormatterInterface
{
    private $CI;

    public function __construct(CI_Controller $CI_Instance)
    {
        $this->CI = $CI_Instance;
    }

    public function toLog(array $child): string
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

    public function toOption(array $child): string
    {
        return "<option value='".$child['id']."'>".$child['prenom']." ".$child['nom']."</option>";
    }

    public function toLi(array $eleve) : string
    {
        return "<li> </li>";
    }

}