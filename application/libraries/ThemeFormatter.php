<?php

class ThemeFormatter implements FormatterInterface
{

    private $CI;

    public function __construct(CI_Controller $CI_Instance)
    {
        $this->CI = $CI_Instance;
    }

    public function toOption(array $element): string
    {
        $tmp = explode('_',$element['nom']);
        $titre = $tmp[count($tmp)-1];
        return '<option value="'.$element['id'].'" data-icon="/assets/img/pastilles_theme/'.$titre.'.png" class="circle">'.$titre.'</option>';
    }

    public function toLi(array $element): string
    {
        return "";
    }
}