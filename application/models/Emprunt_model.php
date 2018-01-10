<?php

class Emprunt_model extends CI_Model
{
    private $table = 'Emprunt';

    public function __construct()
    {
        parent::__construct();
    }

    public function get(array $data = null): ?array
    {
        $this->db->select()
            ->from($this->table);

        if (isset($data)){
            foreach ($data as $constraint=>$value){
                $this->db->where(array($constraint=>$value));
            }
        }
        return $this->db->get()
            ->result_array();
    }

    public function add()
    {
        // TODO
    }

    public function del()
    {
        // TODO
    }

    public function set()
    {
        // TODO
    }

}