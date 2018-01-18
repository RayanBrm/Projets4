<?php


function dump(...$data){
    echo '<pre>';
    foreach ($data as $d){
        var_dump($d);
    }
    echo '</pre>';
}

function includeAJAX(){
    return '<script src="'.base_url().'assets/js/ajax.js" type="text/javascript"></script>';
}

function includeJQUERY(){
    return '<script src="'.base_url().'assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>';
}