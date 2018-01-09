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