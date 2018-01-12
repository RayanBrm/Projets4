<?php

class Livre_model extends CI_Model
{
    private $table = 'Livre';
    private $fields = array('titre','auteur','edition','parution');

    /**
     * @var int The number of book displayed by page
     */
    public static $pageDisplay = 40;

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

    public function search(string $keyWord): ?array
    {
         $this->db->select()
                  ->from($this->table);
         foreach($this->fields as $field)
         {
            $this->db->or_like($field,$keyWord);
         }
         return $this->db->get()
                        ->result_array();
    }

    public function getPage(string $page): ?array
    {
        return  $this->db->select()
                        ->from($this->table)
                        ->limit(self::$pageDisplay,self::$pageDisplay*($page-1))
                        ->get()
                        ->result_array();
    }

    public function getTheme($id_theme) : ?array
    {
        return $this->bd->select()
                        ->from('livretheme')
                        ->like('id_theme',$id_theme)
                        ->get()
                        ->result_array();
    }
}