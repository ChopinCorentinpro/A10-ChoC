<?php
 
class Manager{
    // (attributs) attributes
    public $_db;
    private $_firstname;
    private $_lastname;
    private $_age;
    private $_size;
    private $_situation;
    // (constructeur) constructor
    public function __construct($bdd){
        $this->_db = $bdd;
    }
    // (accesseurs) getters pour récupéré les attributs
 
    // (mutateurs) setters pour modifier les attributs
 
    // (méthdes) methods
    //SELECT
    public function select($firstname){
        $sql = $this->_db->prepare("SELECT * FROM learner WHERE firstname =:param1");
        $sql->bindValue(':param1', $firstname, PDO::PARAM_STR);
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        // echo '<pre>';
        //     print_r($fetch);
        // echo '</pre>';
 
        //CONSTRUIRE UN OBJET Learner
        $learner = new Learner();
        $learner ->hydrate($fetch);
        return $learner;
    }
    //CREATE
    public function create($firstname, $lastname, $age, $size, $situation){
        $sql = $this->_db->prepare("SELECT * FROM learner WHERE firstname =:param1 AND lastname =:param2");
        $sql->bindValue(':param1', $firstname, PDO::PARAM_STR);
        $sql->bindValue(':param2', $lastname, PDO::PARAM_STR);
        $sql->execute();
        $count = $sql->rowCount();
        if($count == 0){
            $sql = $this->_db->prepare("INSERT INTO `learner`(`firstname`, `lastname`, `age`, `size`, `situation`) VALUES (:firstname, :lastname, :age, :size, :situation)");
            $sql->bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $sql->bindValue(':lastname', $lastname, PDO::PARAM_STR);
            $sql->bindValue(':age', $age, PDO::PARAM_INT);
            $sql->bindValue(':size', $size);
            $sql->bindValue(':situation', $situation, PDO::PARAM_STR);
            $sql->execute();
        }
    }
    //UPDATE
    public function update(){
 
    }
    //DELETE
    //LIST OF LEARNER LESS THAN 25
}