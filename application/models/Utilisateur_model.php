<?php

class Utilisateur_model extends CI_Model
{
    private $table;

    /**
     * Singleton for the list of child
     * @var null
     */
    private $childList = null;

    private $lastChildModified = false;

    private $lastChildUpdated;

    private $fiedList;

    public function __construct()
    {
        parent::__construct();

        $this->table = 'Utilisateur';
        $this->fiedList = $this->db->list_fields($this->table);
    }

    /**
     * Getter for user data
     * @param array $data Contains data to identify user(s) to returns as array('id'=>?) for getting by id
     * @return array|null In case of user in Personnel table the returned user(s) are filled up with motdepasse
     *                    else if user is a child, he's filled up with pastille and his class,
     *                    return null in case of invalid user filter
     */
    public function get(array $data): ?array
    {
        if (isset($data['id']) || isset($data['identifiant']) || isset($data['nom']) || isset($data['prenom']) || isset($data['role'])){
            $users = $this->db->select()
                ->from($this->table)
                ->where($data)
                ->get()
                ->result_array();

            foreach ($users as $key => $user){ // Adding data
                // TODO : better access to role value
                if ($user['role'] == '2' || $user['role'] == '1' && $this->person->exist(array('id'=>$user['id']))){
                    $users[$key]['motdepasse'] = $this->person->get(array('id'=>$user['id']))[0]['motdepasse'];
                }
                elseif ($user['role'] === '3' && $this->eleve->exist(array('id'=>$user['id']))){
                    $tmp = $this->eleve->get(array('id'=>$user['id']));
                    $users[$key]['pastille'] = $tmp[0]['pastille'];
                    $users[$key]['classe'] = $tmp[0]['classe'];
                }
            }
            return $users;
        }
        else{
            return null;
        }
    }

    /**
     * Setter for user data
     * @param array $data Contains data about user, every fields have to be present,
     *                    id must be valid : array('id'=>?,'identifiant'=>?,..),
     *                    if Eleve fields or Personnel fileds are present the concerned table will be updated too
     * @return bool True in case of success false else
     */
    public function set(array $data): bool
    { // TODO : updated child list integration

        foreach ($this->fiedList as $field){ // Dynamically checking if every field is present
            if (!array_key_exists($field,$data)){
                return false;
            }
        }
        $id = $data['id'];
        unset($data['id']);

        if (isset($data['pastille']) && isset($data['classe'])){ // updating Eleve table if needed
            $result = $this->eleve->set(array('id'=>$id,'pastille'=>$data['pastille'],'classe'=>$data['classe']));
            unset($data['pastille'],$data['classe']);
        }
        elseif (isset($data['motdepasse'])){ // updating Personnel table if needed
            $result = $this->person->set(array('id'=>$id,'motdepasse'=>$data['motdepasse']));
            unset($data['motdepasse']);
        }

        // Testing result & updating modified time if needed
        if ($result && $this->db->where('id',$id)->update($this->table,$data)){
            $this->lastChildModified = date("U");
            return true;
        }
        return false;
    }

    /**
     * Adder for Utilisateur table
     * @param array $data Contains value about user,
     *                  if motdepasse is specified, user will be added into the Personnel table,
     *                  if pastille and classe is given he will be added into th Eleve table,
     *                  user cannot be added in both table, if the 3 argument are given user will be added in Personnel table
     * @return bool True if the user have been added false else
     */
    public function add(array $data): bool
    {
        // Trying to insert
        if (isset($data['motdepasse'])){
            $pwd = $data['motdepasse'];
            unset($data['motdepasse']);
        }
        if (isset($data['pastille']) || isset($data['classe'])){
            $pastille = $data['pastille'];
            $classe = $data['classe'];

            unset($data['pastille'], $data['classe']);
        }

        $result = $this->db->insert($this->table,$data);


        if ($result === true && isset($pwd)) { // if user is personnel
            return $result && $this->person->add(array('id' => $data['id'], 'motdepasse' => $pwd));
        }
        elseif ($result === true && isset($classe) && isset($pastille)) {
            return $result && $this->eleve->add(array('id' => $data['id'], 'classe' => $classe, 'pastille' => $pastille));
        }
        else{
            return $result;
        }

    }

    /**
     * Deleter for Utilisateur table, delete Utilisateur from Eleve or Personnel if they belong to one of those table
     * @param array $data Only user id is allowed to delete a user, as an associative array
     * @return bool True if the user was deleted false else
     */
    public function del(array $data): bool
    {
        if (isset($data['id'])){
            $result = $this->db->where($data)
                ->delete($this->table);

            if (array_key_exists($data['id'],$this->childList)){
                return $result && $this->eleve->del($data);
            }
            else if ($this->person->exist($data)){
                return $result && $this->person->del($data);
            }
            else{
                return $result;
            }
        }
        return false;
    }

    /** TODO : move ?
     * Getter for the role table
     * @return array|null The list of role defined in table role
     */
    public function getLevels(): ?array
    {
        return $this->db->select()
            ->from('Role')
            ->get()
            ->result_array();
    }

    /**
     * Getter for the whole list of child
     * @return array|null Return the child id, class and picture for each child
     */
    public function getAllChild(): ?array
    {
        return (isset($this->childList) && $this->lastChildModified<=$this->lastChildUpdated)
            ? $this->childList
            : $this->childList = $this->eleve->getAll();
    }
}