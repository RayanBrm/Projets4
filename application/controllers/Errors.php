<?php
/**
 * Created by PhpStorm.
 * User: Axelle
 * Date: 25/01/2018
 * Time: 17:31
 */

class Errors extends CI_Controller
{
    public function error_404()
    {
        $this->load->view('errors/error_404');
    }
}