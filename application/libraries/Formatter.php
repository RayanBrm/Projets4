<?php

require_once 'FormatterInterface.php';
require_once 'ClassFormatter.php';
require_once 'ChildFormatter.php';
require_once 'BookFormatter.php';
require_once 'UserFormatter.php';

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

    /**
     * @var FormatterInterface
     */
    private $user;


    public function __construct()
    {
        $this->CI = & get_instance();

        $this->book = new BookFormatter($this->CI);
        $this->class = new ClassFormatter($this->CI);
        $this->child = new ChildFormatter($this->CI);
        $this->user = new UserFormatter($this->CI);
    }

    public function __get($field) {
        return $this->$field;
    }
}