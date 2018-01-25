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

    public function getRunning(array $data): ?array
    {
        $result =  $this->db->select()
            ->from($this->table)
            ->where($data)
            ->where('dateRendu IS NULL')
            ->get()
            ->result_array();

        if (isset($result[0]['id_eleve'])){
            return $result[0];
        }
        return null;
    }

    //emprunter un livre
    public function add(array $data) : bool
    {
        if($this->exist($data['id_eleve'])) //l'élève a déjà un emprunt en cours
            return false;
        $emprunt = $this->db->insert($this->table,$data);
        $livre = $this->db->where('id',$data['id_livre'])
                          ->update('Livre',array('disponible'=>'0'));

        return $emprunt and $livre;
    }

    public function del(array $data) : bool
    {
        return $this->db->where($data)
                    ->delete($this->table);
    }

    //rendre un livre
    public function set(string $id) : bool
    {
        $livre = $this->set('disponible',1)
                      ->where('id',$id)
                      ->update('Livre');

        $date = new DateTime();
        $emprunt = $this->set('dateRendu',$date->format('Y-m-d'))
                        ->where('id_livre',$id)
                        ->update('Emprunt');

        return $livre and $emprunt;
    }

    public function exist(string $id_eleve) : bool
    {
        return (count($this->db->select()->from($this->table)->where('id_eleve',$id_eleve)->where('dateRendu', 'IS NULL')->get()->result_array()) > 0);
    }

}