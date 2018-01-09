<?php

class Utilisateur_model extends CI_Model
{
    private $table = 'Utilisateur';

    public function __construct()
    {
        parent::__construct();
    }

    public function get(array $data): ?array
    {
        $users = $this->db->select()
            ->from($this->table)
            ->where($data)
            ->get()
            ->result_array();

        foreach ($users as $key => $user){
            // TODO : better access to role value
            if ($user['role'] == '2' || $user['role'] == '1'){
                $users[$key]['motdepasse'] = $this->person->get(array('id'=>$user['id']))['motdepasse'];
            }
            elseif ($user['role'] === '3'){
                $data = $this->eleve->get(array('id'=>$user['id']));
                $users[$key]['pastille'] = $data['pastille'];
                $users[$key]['classe'] = $data['classe'];
            }
        }

        return $users;
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
        $result = $this->db->insert($this->table,$data);

        if ($result === true){
            if (isset($data['motdepasse'])){
                $this->person->add(array());
            }
            elseif (isset($data['pastille'])){
                $this->eleve->add(array());
            }
        }
    }

    public function del(array $data): bool
    {
        return $this->db->where($data)
            ->delete($this->table);
    }

    /** TODO : move ?
     * Return the level list from Role table
     * @return array|null
     */
    public function getLevels(): ?array
    {
        return $this->db->select()->from('Role')->get()->result_array();
    }
}