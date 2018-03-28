<?php

/**
 * Interface FormatterInterface
 * Define base method for each formatter
 */
Interface FormatterInterface
{
    /**
     * FormatterInterface constructor.
     * @param CI_Controller $CI_Instance The CodeIgniter instance to call if necessary model, controller or any CI instanciate object
     */
    public function __construct(CI_Controller $CI_Instance);

    /**
     * Convert the given element to an html formatted <option>
     * @param array $element The element to convert
     * @return string The html as a string
     */
    public function toOption(array $element): string ;
    /**
     * Convert the given element to an html formatted <li>
     * @param array $element The element to convert
     * @return string The html as a string
     */
    public function toLi(array $element): string ;
}