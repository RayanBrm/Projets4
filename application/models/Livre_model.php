<?php

class Livre_model extends CI_Model
{
    private $table = 'Livre';
    private $fields = array('titre','auteur','edition','parution');

    public function __construct()
    {
        parent::__construct();
    }

    public function get($data): ?array
    {
        return $this->db->select()
                        ->from($this->table)
                        ->where($data, null, false)
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
        if (isset($data ['id']) || isset($data['isbn'])){
            return $this->db->where($data)
                            ->delete($this->table);
        }
        return false;
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
                        ->order_by('titre','ASC')
                        ->limit(BOOK_PER_PAGE,BOOK_PER_PAGE*($page-1))
                        ->get()
                        ->result_array();
    }

    public function maxPage(): string
    {
        return ceil($this->db->count_all($this->table)/BOOK_PER_PAGE);
    }

    public function getTheme($id_theme) : ?array
    {
        return $this->bd->select()
                        ->from('LivreTheme')
                        ->like('id_theme',$id_theme)
                        ->get()
                        ->result_array();
    }

    public function getByTheme(string $id_theme): ?array
    {
        // TODO : use qb
        return $this->db->query('SELECT Livre.* FROM LivreTheme JOIN Livre WHERE LivreTheme.id_livre=Livre.id AND LivreTheme.id_theme ='.$id_theme)->result_array();
    }

    public function exist(array $data): bool
    {
        if (isset($data['auteur'])){
            return (count($this->db->select()->from('Auteur')->where(array('nom'=>$data['auteur']))->get()->result_array()) > 0);
        }elseif (isset($data['titre'])){
            return (count($this->db->select()->from($this->table)->where($data)->get()->result_array()) > 0);
        }
    }

    public function addAuteur(string $auteur)
    {
        return $this->db->insert('Auteur',array('Nom'=>$auteur));
    }

    public function isAvailable(string $bookId): bool
    {
        return $this->get(array('id'=>$bookId))[0]['disponible'] === '1';
    }

    public function getAllEditor()
    {
        return $this->db->select('edition')
                        ->distinct()
                        ->from($this->table)
                    ->get()
                    ->result_array();
    }

    public function getAllAuthor()
    {
        return $this->db->select('nom')
                        ->from('Auteur')
                    ->get()
                    ->result_array();
    }
}