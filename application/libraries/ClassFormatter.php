<?php

class ClassFormatter implements FormatterInterface
{
    private $CI;

    public function __construct(CI_Controller $CI_Instance)
    {
        $this->CI = $CI_Instance;
    }

    public function toOption(array $class)
    {
        return "<option value='".$class['id']."'>".$class['libelle']."</option>";
    }

    public function toLi(array $element) : string
    {
        return "<li> </li>";
    }



}