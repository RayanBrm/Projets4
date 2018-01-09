<?php

class Livre_model extends CI_Model
{
    private $table = 'Livre';

        public function __construct()
    {
        parent::__construct();
    }

    public function get(array $data): ?array
    {
        return $this->db->select()
                        ->from($this->table)
                        ->where($data)
                        ->get()
                        ->result_array();
    }

    public function set(array $data): bool
    {
        $id = $data['id'];
        unset($data['id']);

        return $this->db->where('id',$id)
                        ->update($this->table,$data);
    }

    public function add(array $data): bool
    {
        return $this->db->insert($this->table,$data);
    }

    public function del(array $data): bool
    {
        return $this->db->where($data)
                        ->delete($this->table);
    }

    public function searchName(string $bookTitle): ?array
    {
        return $this->db->select()
                        ->from($this->table)
                        ->like('titre',$bookTitle)
                        ->get()
                        ->result_array();
    }

    public function searchAuthor(string $bookAuthor): ?array
    {
        return $this->db->select()
                        ->from($this->table)
                        ->like('auteur',$bookAuthor)
                        ->get()
                        ->result_array();
    }
}