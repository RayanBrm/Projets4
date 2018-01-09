<?php

class Ajax extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('Formatter',null,'format');
    }

    public function getBook()
    {
        $keyWord = $this->input->post('search');
        $books = $this->livre->search($keyWord);

        foreach ($books as $book){
            echo $this->format->bookToCatalog($book);
        }
    }
}