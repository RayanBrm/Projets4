<?php

class Main extends CI_Controller
{

    public function index()
    {
        $this->catalogue();
    }

    public function catalogue()
    {
        $data['script'] = '<script src="'.base_url().'assets/js/index.js" type="text/javascript"></script>';
        $this->load->view('main/catalogue',$data);
    }

    public function historique()
    {
        $this->load->view('main/historique');
    }

}