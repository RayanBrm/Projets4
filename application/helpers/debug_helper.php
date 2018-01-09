<?php


function dump(...$data){
    echo '<pre>';
    foreach ($data as $d){
        var_dump($d);
    }
    echo '</pre>';
}