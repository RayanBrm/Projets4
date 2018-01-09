<?php

class Ajax extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('Formatter',null,'format');
    }

    public function getBookByName()
    {
        $bookName = $this->input->post('book');

        $books = $this->livre->get(array('titre'=>$bookName));

        foreach ($books as $book){
            echo $this->format->bookToCatalog($book);
        }
    }
}