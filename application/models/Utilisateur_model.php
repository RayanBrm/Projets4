<?php

class Utilisateur_model extends CI_Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();

        $this->table = 'Utilisateur';
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
        if (isset($data['id']) || isset($data['identifiant']) || isset($data['nom']) || isset($data['prenom']) || isset($data['role'])) {
            $users = $this->db->select()
                ->from($this->table)
                ->where($data)
                ->get()
                ->result_array();

            foreach ($users as $key => $user) { // Adding data
                // TODO : better access to role value

                if (($user['role'] == '2' || $user['role'] == '1') && $this->person->exist(array('id' => $user['id']))) {
                    $users[$key]['motdepasse'] = $this->person->get(array('id' => $user['id']))[0]['motdepasse'];

                } elseif ($user['role'] === '3' && $this->eleve->exist(array('id' => $user['id']))) {
                    $tmp = $this->eleve->get(array('id' => $user['id']));
                    $users[$key]['pastille'] = $tmp[0]['pastille'];
                    $users[$key]['classe'] = $tmp[0]['classe'];
                }
            }
            return $users;
        } else
            return null;
    }

    /**
     * Setter for user data
     * @param array $data Contains data about user, every fields have to be present,
     *                    id must be valid : array('id'=>?,'identifiant'=>?,..),
     *                    if Eleve fields or Personnel fileds are present the concerned table will be updated too
     * @return bool True in case of success false else
     */
    public function set(array $data): bool
    {
        $result = true;
        if(isset($data['id'])){
            $id = $data['id'];
            unset($data['id']);
        }
        else
            return false;

        if (isset($data['pastille']) && isset($data['classe'])){ // updating Eleve table if needed
            $result = $this->eleve->set(array('id'=>$id,'pastille'=>$data['pastille'],'classe'=>$data['classe']));
            unset($data['pastille'],$data['classe']);
        }
        elseif (isset($data['motdepasse'])){ // updating Personnel table if needed
            $result = $this->person->set(array('id'=>$id,'motdepasse'=>$data['motdepasse']));
            unset($data['motdepasse']);
        }

        // Testing result & updating modified time if needed
        return $result && $this->db->where('id',$id)->update($this->table,$data);
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

        // TODO : Useless, remove
        $user = array(
            'identifiant'=>$data['identifiant'],
            'prenom'=>$data['prenom'],
            'nom'=>$data['nom'],
            'role'=>$data['role']
        );

        $result = $this->db->insert($this->table,$user);
        $id = $this->db->insert_id();
        if ($result === true && isset($pwd)) { // if user is personnel
            return $result && $this->person->add(array('id' => $id, 'motdepasse' => $pwd));
        }
        elseif ($result === true && isset($classe) && isset($pastille)) {
            return $result && $this->eleve->add(array('id' => $id, 'classe' => $classe, 'pastille' => $pastille));
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
            $sdata = array('id'=>$data['id']);
            $result = true;

            if ($this->eleve->exist($sdata)){
                $result = $this->eleve->del($sdata);
            }
            else if ($this->person->exist($sdata)){
                $result = $this->person->del($sdata);
            }

            $result = $result && $this->emprunt->del(array('id_eleve'=>$data['id']));

            return $result && $this->db->where($sdata)
                                        ->delete($this->table) ;

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
        $this->eleve->getAll();
    }

    public function search(string $keyWord, string $where): array
    {
        if (($where == "util" || $where == "child" )&& isset($keyWord)) {
            $constraint = ($where == "util")? 'role = 1 OR role = 2' : 'role = 3' ;

            // Producing : SELECT * FROM Utilisateur WHERE [(role = 1 OR role = 2)|(role = 3)] AND (nom LIKE 'test' OR prenom LIKE 'test' OR identifiant LIKE 'test')
            return $this->db->select()
                            ->from($this->table)
                            ->group_start()
                                ->where($constraint)
                            ->group_end()
                            ->group_start()
                                ->or_like('nom', $keyWord)
                                ->or_like('prenom', $keyWord)
                                ->or_like('identifiant', $keyWord)
                            ->group_end()
                        ->get()
                        ->result_array();
        }
        else
            return array();
    }
}