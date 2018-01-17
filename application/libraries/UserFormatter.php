<?php

class UserFormatter implements FormatterInterface
{
    private $CI;

    public function __construct(CI_Controller $CI_Instance)
    {
        $this->CI = $CI_Instance;
    }

    public function toOption(array $element): string
    {
        return "<option></option>";
    }

    public function toLi(array $element): string
    {
        if (count($element) > 0){
            $uid = $element['id'];
            //$upic = ($element['role'] == '1')? 'android' : 'person' ;

            return "<li class=\"collection-item\">".
                        "<div>".
                                $element['prenom']." ".$element['nom'].
                                //"<i class=\"material-icons\">$upic</i>".
                            "<a href=\"".base_url('modifier?what=user&who='.$uid)."\" class=\"secondary-content red-text lighten-2\">".
                                "<i class=\"material-icons \">edit</i>".
                            "</a>".
                            "<a href=\"#\" class=\"secondary-content red-text lighten-2\"  onclick='deleteUser(".$uid.")' >".
                                "<i class=\"material-icons\">clear</i>".
                            "</a>".
                        "</div>".
                    "</li>";
        }
        return "";
    }
}