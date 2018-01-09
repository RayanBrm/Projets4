<?php

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Formatter',null,'format');
    }

    public function index()
    {
        $this->catalogue();
    }

    public function catalogue()
    {
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }
        $books = $this->livre->getPage($page);
        $data['books'] = "";
        foreach ($books as $book){
            $data['books'].= $this->format->bookToCatalog($book);
        }

        $data['script'] = '<script src="'.base_url().'assets/js/index.js" type="text/javascript"></script>';
        $data['ajax'] = includeAJAX();

        $this->load->view('main/catalogue',$data);
    }

    public function historique()
    {
        $this->load->view('main/historique');
    }

}