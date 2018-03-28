<?php

/**
 * Debug helper, just multiple var_dump
 * @param array ...$data
 */
function dump(...$data){
    echo '<pre>';
    foreach ($data as $d){
        var_dump($d);
    }
    echo '</pre>';
}