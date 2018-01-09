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
        $this->load->view('main/catalogue');
    }

    public function historique()
    {
        $this->load->view('main/historique');
    }

}