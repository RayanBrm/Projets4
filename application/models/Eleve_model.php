<?php

/**
 * Class Eleve_model
 * DB interaction with Eleve table, CRUD are present and other useful function
 */
class Eleve_model extends Utilisateur_model
{
    /**
     * @var string The table name
     */
    private $table = 'Eleve';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add a child into the Eleve table
     * @param array $data
     * @return bool
     */
    public function add(array $data): bool
    {
        if (isset($data['id']) && isset($data['classe'])){
            return $this->db->insert($this->table,$data);
        }
        return false;
    }

    /**
     * Getter for data in Eleve table
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
     * Delete a child from Eleve table
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

    /**
     * Update a child from Eleve table
     * @param array $data
     * @return bool
     */
    public function set(array $data): bool
    {
        if(isset($data['id']) && (isset($data['pastille']) || isset($data['classe']))){
            $id = $data['id'];
            unset($data['id']);

            return $this->db->where('id',$id)->update($this->table,$data);
        }
        return false;
    }

    /**
     * Could be replaced with the base set function
     * @param string $userID
     * @param string $pastille
     * @return bool
     */
    public function setPastille(string $userID, string $pastille): bool
    {
        // NOT IMPLEMENTED
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

    /**
     * Return all child belonging to the given classe id
     * @param string $classID
     * @return array
     */
    public function getClasse(string $classID): array
    {
        return $this->db->select()
            ->from($this->table)
            ->where(array('classe'=>$classID))
            ->get()
            ->result_array();
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

    /**
     * Return the list of chip child already have in the given classe id
     * @param string $classeId
     * @return array|null
     */
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