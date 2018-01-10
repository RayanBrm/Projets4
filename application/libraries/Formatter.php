<?php

require_once 'FormatterInterface.php';
require_once 'ClassFormatter.php';
require_once 'ChildFormatter.php';
require_once 'BookFormatter.php';

class Formatter
{
    /**
     * @var CI_Controller
     */
    private $CI;
    /**
     * @var FormatterInterface
     */
    private $child;
    /**
     * @var FormatterInterface
     */
    private $book;
    /**
     * @var FormatterInterface
     */
    private $class;


    public function __construct()
    {
        $this->CI = & get_instance();

        $this->book = new BookFormatter($this->CI);
        $this->class = new ClassFormatter($this->CI);
        $this->child = new ChildFormatter($this->CI);
    }

    public function __get($field) {
        if($field == 'child') {
            return $this->child;
        }
        if($field == 'book') {
            return $this->book;
        }
        if($field == 'class') {
            return $this->class;
        }
    }
}