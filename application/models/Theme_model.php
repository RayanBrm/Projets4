<?php

class Theme_model extends CI_Model
{
    private $table = 'Theme';
    private $themeList = array();

    public function __construct()
    {
        parent::__construct();
        $this->initList();
    }

    public function get(array $data): ?array
    {
        if (isset($data['id']) || isset($data['nom'])){
            $where = (isset($data['id']))? $data['id'] : $data['nom'] ;

            return $this->db->select()
                            ->from($this->table)
                            ->where($where)
                        ->get()
                        ->result_array();
        }
        return null;
    }

    public function set(array $data): bool
    {
        if (isset($data['id'])){
            $id = $data['id'];
            unset($data['id']);

            $result = $this->db->where('id',$id)
                            ->update($this->table, $data);
            if ($result){
                $this->initList();
            }
            return $result;
        }
        return false;
    }

    public function add(string $themeName) : bool
    {
        if (isset($themeName)){
            $insert = array(
                'nom'=>$themeName,
                'libelle'=>'Available in further update',
                'nbLivre'=>'0'
            );

            $result =  $this->db->insert($this->table,$insert);
            if ($result){
                $this->initList();
            }
            return $result;
        }
        return false;
    }

    public function del(string $themeId): bool
    {
        return $this->db->where('id',$themeId)->delete($this->table);
    }

    public function delBook(array $data): bool
    {
        return $this->db->where($data)->delete('LivreTheme');
    }

    public function getAll(): ?array
    {
        return $this->db->select()->from($this->table)->get()->result_array();
    }

    /**
     * Assign to the given theme name each book id from the given array
     * @param string $themeName The theme name
     * @param array $books Contains a list of book id
     * @return bool
     */
    public function assignBookToTheme(string $themeName, array $books): bool
    {
        if (isset($themeName) && $themeName != ''){
            if (!isset($this->themeList[$themeName])){
                return false;
            }
            $result = true;
            $themeId = $this->themeList[$themeName];
            foreach ($books as $book){
                if (!$this->exist(array('id_livre'=>$book, 'id_theme'=>$themeId))){
                    $result = $result && $this->db->insert('LivreTheme',array('id_livre'=>$book,'id_theme'=>$themeId));
                }
            }
            return $result;
        }
        return false;
    }

    /**
     * Assign to the given book id each themes from the given array
     * @param string $bookId A book id
     * @param array $themes A list of thems name
     * @return bool
     */
    public function assignThemeToBook(string $bookId, array $themes): bool
    {
        if (isset($bookId) && $bookId != ''){
            $result = true;
            foreach ($themes as $theme){
                if (!$this->exist(array('id_livre'=>$bookId, 'id_theme'=>$theme))){
                    $this->add($theme);
                }
                $themeId = $this->themeList[$theme];
                $result = $result && $this->db->insert('LivreTheme',array('id_livre'=>$bookId,'id_theme'=>$themeId));
            }
            return $result;
        }
        return false;
    }

    public function assignId(string $themeId, array $bookIds): bool
    {
        if (isset($bookId) && $bookId != ''){
            foreach ($bookIds as $bookId){
                if (!$this->exist(array('id_livre'=>$bookId, 'id_theme'=>$themeId))){
                    return $this->db->insert('LivreTheme',array('id_livre'=>$bookId,'id_theme'=>$themeId));
                }
                return true;
            }
        }
        return false;
    }

    /**
     * Initialize double indexed list attributes : themeList
     */
    private function initList()
    {
        $themes = $this->db->select('id, nom')->from($this->table)->get()->result_array();
        foreach ($themes as $theme){
            $this->themeList[$theme['id']] = $theme['nom'];
            $this->themeList[$theme['nom']] = $theme['id'];
        }
    }

    /**
     * Return the name of the gven theme id, null if not recognized theme id
     * @param string $themeId
     * @return null|string
     */
    public function getName(string $themeId): ?string
    {
        return isset($this->themeList[$themeId])? $this->themeList[$themeId] : null ;
    }

    /**
     * Return the assigned item from the given id :
     *  - $what = book => return all theme assigned to given book id
     *  - $what = theme => return all book assigned to given theme id
     * @param $id string valid book id
     * @param string $what
     * @return null|array Array containing the theme list or null if book id don't exist in table
     */
    public function getAssigned($id, $what = 'book'): ?array
    {
        if (isset($id)){
            if ($what == 'book'){
                return $this->db->select()->from('LivreTheme')->where('id_livre',$id)->get()->result_array();
            }else if ($what == 'theme'){
                return $this->db->select()->from('LivreTheme')->where('id_theme',$id)->get()->result_array();
            }
        }
        return null;
    }

    public function exist(array $data): bool
    {
        return (count($this->db->select()->from('LivreTheme')->where($data)->get()->result_array()) > 0);
    }
}