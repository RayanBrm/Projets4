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
        return $this->db->select()
            ->from($this->table)
            ->get()
            ->result_array();
    }

    public function get(array $data): ?array
    {
        if (isset($data['id']) || isset($data['libelle'])){
            return $this->db->select()
                ->from($this->table)
                ->where($data)
                ->get()
                ->result_array();
        }
        return null;
    }
}