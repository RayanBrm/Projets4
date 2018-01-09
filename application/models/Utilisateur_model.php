<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 09/01/18
 * Time: 10:56
 */

class Utilisateur_model extends CI_Model
{
    private $table = 'Utilisateur';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function get(array $data)
    {
        return $this->db->select()
                        ->from($this->table)
                        ->where($data)
                        ->get()
                        ->result_array();
    }

    public function set()
    {
        
    }

    public function add()
    {
        
    }

    public function del()
    {
        
    }


}