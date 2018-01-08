<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 08/01/18
 * Time: 13:18
 */

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }

}