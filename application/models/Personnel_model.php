<?php

class Personnel_model extends Utilisateur_model
{
    private $table = 'Personnel';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $data
     * @return array|null
     */
    public function get(array $data): ?array
    {
        return $this->db->select('motdepasse')
            ->from($this->table)
            ->where($data)
            ->get()
            ->result_array()[0];
    }

    /**
     * Hash the given password using BCRYPT algorithm
     * @param string $password
     * @return string
     */
    private function hash(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

}