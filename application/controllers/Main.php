<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 08/01/18
 * Time: 13:18
 */

class Main extends CI_Controller
{
    public function index()
    {
        $this->catalogue();
    }

    public function catalogue()
    {
        $data['script'] = '<script src="'.base_url().'assets/js/index.js" type="text/javascript"></script>';
        $data['ajax'] = includeAJAX();
        $this->load->view('main/catalogue',$data);
    }

    public function historique()
    {
        $this->load->view('main/historique');
    }

    public function connexionEleve()
    {
        $this->load->view('main/connexionEleve');
    }

}