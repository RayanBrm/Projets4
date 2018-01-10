<?php

class Classe_model extends CI_Model
{
    private $table = 'Classe';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->select()->from($this->table)->get()->result_array();
    }
}