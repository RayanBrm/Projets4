<?php

class ClassFormatter implements FormatterInterface
{
    private $CI;

    public function __construct(CI_Controller $CI_Instance)
    {
        $this->CI = $CI_Instance;
    }

    public function toOption(array $class): string
    {
        return "<option value='".$class['id']."'>".$class['libelle']."</option>";
    }

    public function toLi(array $element) : string
    {
        return '<li>'.
                '<input name="classes" type="radio" id="classe_'.$element['id'].'" value="'.$element['libelle'].'"/>'.
                '<label class="black-text" for="classe_'.$element['id'].'">'.$element['libelle'].'</label>'.
               '</li>';
    }

    public function toModify(array $classe) : string
    {
        if (isset($classe)){
            $classeid = $classe['id'];

            return "<li class=\"collection-item\">".
                        "<div class=\"row\">".
                            "<div class=\"col s6\">".
                                "<input class=\"classe_input\" type=\"text\" id=\"input_".$classeid."\" value=\"".$classe['libelle']."\" data-origin=\"".$classe['libelle']."\">".
                            "</div>".
                            "<a href='#' class=\"secondary-content red-text lighten-2\" onclick='editClass(".$classeid.")'>".
                                "<i class=\"material-icons \">edit</i>".
                            "</a>".
                            "<a class=\"secondary-content red-text lighten-2\" href='#' onclick='deleteClass(".$classeid.")' >".
                                "<i class=\"material-icons\">clear</i>".
                            "</a>".
                        "</div>".
                    "</li>";
        }
        return "";
    }



}