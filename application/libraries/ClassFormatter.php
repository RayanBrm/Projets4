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



}