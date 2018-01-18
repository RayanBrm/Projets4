<?php

class Personnel_model extends Utilisateur_model
{
    private $table = 'Personnel';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Getter for user in table Personnel
     * @param array $data Contains the user id as an associative array
     * @return array|null Return the password for the given user id
     */
    public function get(array $data): ?array
    {
        if (isset($data['id'])){
            return $this->db->select('motdepasse')
                ->from($this->table)
                ->where($data)
                ->get()
                ->result_array();
        }
        return null;
    }

    /**
     * Insert in Personnel table
     * @param array $data Must contains user motdepasse and user id as an associative array, th password must not be hashed.
     * @return bool True if the user is inserted false else
     */
    public function add(array $data): bool
    {
        if (isset($data['motdepasse']) && isset($data['id'])){
            $pwd = $this->hash($data['motdepasse']);
            return $this->db->insert($this->table,array('id'=>$data['id'],'motdepasse'=>$pwd));
        }
        return false;
    }

    /**
     * Update the table Personnel
     * @param array $data Contains the user id as an associative array
     * @return bool True if the password has been changed false else
     */
    public function set(array $data): bool
    {
        if (isset($data['id']) && isset($data['motdepasse'])){
            $id = $data['id'];
            unset($data['id']);

            return $this->db->where(array('id'=>$id))->update($this->table,$data);
        }
        return false;
    }

    /**
     * Delete from Personnel table
     * @param array $data Contains the user id to delete as an asscosiative array
     * @return bool True if the given user has been deleted false else
     */
    public function del(array $data): bool
    {
        if (isset($data['id'])){
            return $this->db->where(array('id'=>$data['id']))->delete($this->table);
        }
        return false;
    }


    /**
     * Hash the given password using BCRYPT algorithm
     * @param string $password Password to hash
     * @return string Hashed password
     */
    private function hash(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Check if specified id exist in table Personnel
     * @param array $data Contains user id
     * @return bool True if the id exist false else
     */
    public function exist(array $data): bool
    {
        return (count($this->db->select()->from($this->table)->where($data)->get()->result_array()) > 0);
    }

}