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
        $books = $this->livre->searchName($bookName);

        foreach ($books as $book){
            echo $this->format->bookToCatalog($book);
        }
    }

    public function getBookByAuthor()
    {
        $authorName = $this->input->post('auteur');
        $books = $this->livre->searchAuthor($authorName);

        foreach ($books as $book){
            echo $this->format->bookToCatalog($book);
        }
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