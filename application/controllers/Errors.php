<?php

class Errors extends CI_Controller
{
    public function error_404()
    {
        $this->load->view('errors/error_404');
    }
}