<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 10/01/18
 * Time: 11:58
 */

class Child extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION)){
            session_start();
        }
    }

    public function index(){
        $this->main();
    }

    public function main()
    {
        if ($this->isLogged()){
            $this->load->view('child/main');
        }
        else{
            redirect('connexionEleve');
        }
    }

    public function connect(string $childID)
    {
        if (isset($childID)){
            $_SESSION['child'] = $this->user->get(array('id'=>$childID))[0];
            redirect('child/main');
        }
        else{
            redirect('connexionEleve');
        }
    }

    public function disconnect()
    {
        unset($_SESSION['child']);
    }

    private function isLogged(){
        return isset($_SESSION['child']);
    }

}