<?php

class Classe_model extends CI_Model
{
    private $table = 'Classe';

    public function __construct()
    {
        parent::__construct();
    }

    public function add(string $libelle): bool
    {
        return $this->db->insert($this->table,array('libelle'=>$libelle));
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

    public function exist(string $libelle): bool
    {
        return (count($this->db->select()->from($this->table)->where('libelle LIKE "'.$libelle.'"')->get()->result_array()) > 0);
    }

    // TODO : autre methode crud
}