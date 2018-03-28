<?php

require_once 'FormatterInterface.php';
require_once 'ClassFormatter.php';
require_once 'ChildFormatter.php';
require_once 'BookFormatter.php';
require_once 'UserFormatter.php';
require_once 'ThemeFormatter.php';

/**
 * Class Formatter
 * General object grouping each implementation of the FormatterInterface
 * Function name in each object are speaking so they are not documented, they convert the given element to the function html node
 */
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

    /**
     * @var FormatterInterface
     */
    private $theme;


    public function __construct()
    {
        $this->CI = & get_instance();

        $this->book = new BookFormatter($this->CI);
        $this->class = new ClassFormatter($this->CI);
        $this->child = new ChildFormatter($this->CI);
        $this->user = new UserFormatter($this->CI);
        $this->theme = new ThemeFormatter($this->CI);
    }

    /**
     * Getter for the field list, so an implementaion can be called as $this->format->child->method
     * Where format is this object, and child an implementaion of the FormatterInterface
     * @param $field
     * @return mixed
     */
    public function __get($field) {
        return $this->$field;
    }

    /**
     * Format the date as : year-month-date, mostly for DB insertion
     * @param $date string The date as : 29 March, 2018 or other format given by JS
     * @return string The date formatted as said
     */
    public function date($date): string
    {
        $result = "";
        if (strpos($date,",")){
            $date = explode(" ",$date);

            switch (explode(",",$date[1])[0]){
                case "January":
                    $date[1] = "01";
                    break;
                case "February":
                    $date[1]= "02";
                    break;
                case "March":
                    $date[1] = "03";
                    break;
                case "April":
                    $date[1] = "04";
                    break;
                case "May":
                    $date[1] = "05";
                    break;
                case "June":
                    $date[1] = "06";
                    break;
                case "July":
                    $date[1] = "07";
                    break;
                case "August":
                    $date[1] = "08";
                    break;
                case "September":
                    $date[1] = "09";
                    break;
                case "October":
                    $date[1] = "10";
                    break;
                case "November":
                    $date[1] = "11";
                    break;
                case "December":
                    $date[1] = "12";
                    break;
                default:
                    $date[1] = "01";
            }
            $result = $date[2]."-".$date[0]."-".$date[1];
        }else{
            $date = explode("-",$date);

            $y = (isset($date[0]))? $date[0] : '0000';
            $m = (isset($date[1]))? $date[1] : '01';
            $d = (isset($date[2]))? $date[2] : '01';

            $result = $y."-".$m."-".$d;
        }

        return $result;
    }

    /**
     * Formate a given chip name to an html displayable <option>
     * @param $pastille
     * @return string
     */
    public function pastilleToOption($pastille): string
    {
        return "<option value=\"$pastille\" data-icon=\"/assets/img/pastilles_eleve/$pastille.png\" class=\"circle\">$pastille</option>";
    }
}