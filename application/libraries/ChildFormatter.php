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
        $img = "assets/img/pastilles_eleve/".$child['pastille'].".png";
        $alt = $child['pastille'];
        $link = "child/connect/".$child['id'];

        return "<div class='col i'>".
                    "<div class='row'>".
                        "<a href='". base_url($link) ."' class=\"tooltipped\" data-position=\"bottom\" data-delay=\"50\" data-tooltip=\"Se connecter\">".
                            "<img src='". base_url($img) ."' alt='".$alt."'>".
                        "</a>".
                    "</div>".
                    "<span class='row etiquette-enfant'>".$child['prenom']." ".$child['prenom']."</span>".
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

    public function toCard(array $child) : string
    {
        return '<div class="col s4">'.
                    '<div class="card-panel grey darken-1 white-text">'.
                        '<h5>'.$child['prenom'].' '.$child['nom'].'</h5>'.
                        '<p>Classe actuelle : '.$child['classe'].'</p>'.
                        '<input type="checkbox" id="'.$child['id'].'"/>'.
                        '<label class="white-text" for="'.$child['id'].'">Selectionner</label>'.
                    '</div>'.
                '</div>';
    }

    public function toTable(array $child) : string
    {
        return '<tr>'.
                    '<td>'.$child['nom'].'</td>'.
                    '<td>'.$child['prenom'].'</td>'.
                    '<td>'.$child['libelle'].'</td>'.
                    '<td>'.
                        '<input type="checkbox" id="'.$child['id'].'"/>'.
                        '<label for="'.$child['id'].'">Ajouter</label>'.
                    '</td>'.
               '</tr>';
    }

}