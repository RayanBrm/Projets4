<?php

class Eleve_model extends Utilisateur_model
{

    private $table = 'Eleve';


    public function __construct()
    {
        parent::__construct();
    }

    public function add(array $data): bool
    {
        if (isset($data['id']) && isset($data['classe'])){
            return $this->db->insert($this->table,$data);
        }
        return false;
    }

    /**
     * Getter for Eleve table
     * @param array $data Contains data about to identify user(s) as an associative array
     * @return array|null
     */
    public function get(array $data): ?array
    {
        return $this->db->select()
            ->from($this->table)
            ->where($data)
            ->get()
            ->result_array();
    }

    /**
     * Delete a child from table Eleve
     * @param array $data Contains only child id as an associative array
     * @return bool True if the child has been deleted false else
     */
    public function del(array $data): bool
    {
        if (isset($data['id'])){
            return $this->db->where($data)->delete($this->table);
        }
        return false;
    }

    public function set(array $data): bool
    {
        if(isset($data['id'])){
            $id = $data['id'];
            unset($data['id']);
        }else{
            return false;
        }
        return $this->db->where('id',$id)->update($this->table,$data);
    }

    public function setPastille(string $userID, string $pastille): bool
    {
        
    }

    /**
     * Return the whole list of child in table
     * @return array|null array indexed by child id under format : array('id_of_child'=>array('id_of_child'=>?,'child_class'=>?,'child_piscture'=>?))
     */
    public function getAll(): ?array
    {
        $childs = $this->db->select()
            ->from($this->table)
            ->get()
            ->result_array();

        $result = array();

        foreach ($childs as $child){
            $result[$child['id']] = array('id'=>$child['id'],'classe'=>$child['classe'],'pastille'=>$child['pastille']);
        }

        return $result;
    }

    public function getClasse(string $classID): array
    {
        return $this->db->select()
            ->from($this->table)
            ->where(array('classe'=>$classID))
            ->get()
            ->result_array();
    }

    /**
     * Return if the childList property has to been updated
     */
    private function needUpdate()
    {
        if ($this->lastModified === false){
            return false;
        }
        if (isset($this->lastUpdated)){
            return $this->lastModified > $this->lastUpdated;
        }
        return true;
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

    public function getUsedPastilleFromClasse(string $classeId): ?array
    {
        $result=array();
        $qresult = $this->db->select('pastille')->from($this->table)->where('classe',$classeId)->get()->result_array();


        foreach ($qresult as $key => $pastille){
            $result[] = $pastille['pastille'];
        }
        return $result;
    }

}