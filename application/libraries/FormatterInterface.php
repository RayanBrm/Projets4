<?php

Interface FormatterInterface
{
    public function __construct(CI_Controller $CI_Instance);
    public function toOption(array $element): string ;
    public function toLi(array $element): string ;
}