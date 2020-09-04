<?php
 
class Learner{
 
    // (attributs) attributes
    private $_firstName;//FIRST NAME
    private $_lastName;//LAST NAME
    private $_age;//AGE
    private $_size;//SIZE
    private $_status;//STATUS
 
    const APPRENANT = 'apprenant';
    const FORMATEUR = 'formateur';
    // (constructeur) constructor
    /////////////////////////////////////////////////////////////////////////////
    public function __construct(){
        $this->setFirstName('Prenom');
        $this->setLastName('Nom');
        $this->setAge(18);
        $this->setSize(1.50);
        $this->setStatus('apprenant');
    }
    public function __construct1($param1, $param2, $param3, $param4, $param5)
    {
        ((empty($param1)) OR ($param1 == null)) ? $param1 = "corentin" : $param1;
 
        ((empty($param2)) OR ($param2 == null)) ? $param2 = "chopin" : $param2;
 
        ((empty($param3)) OR ($param3 == null)) ? $param3 = "19" : $param3;
 
        ((empty($param4)) OR ($param4 == null)) ? $param4 = "1.81" : $param4;
 
        ((empty($param5)) OR ($param5 == null)) ? $param5 = "apprenant" : $param5;
       
        $this->setFirstName($param1);
        $this->setLastName($param2);
        $this->setAge($param3);
        $this->setSize($param4);
        $this->setStatus($param5);
 
    }
    ////////////////////////////////////////////////////////////////////////////////
    // (accesseurs) getters  pour récupéré les attributs
    //FOR FIRST NAME
    public function getFirstName(){
        return ($this->_firstName);
    }
 
    //FOR LAST NAME
    public function getLastName(){
        return ($this->_lastName);
    }
 
    //FOR AGE
    public function getAge(){
        return ($this->_age);
    }
 
    //FOR SIZE
    public function getSize(){
        return ($this->_size);
    }
 
    //FOR STATUS
    public function getStatus(){
        return ($this->_status);
    }
 
    // (mutateurs) setters  pour modifier les attributs
    //FOR FIRST NAME
    public function setFirstName(string $firstname){
        //VERIFICATION STRING
        if(is_string($firstname))
            $this->_firstName = $firstname;
    }
 
    //FOR LAST NAME
    public function setLastName(string $lastname){
        $this->_lastName = $lastname;
    }
 
    //FOR AGE
    public function setAge(int $age){
        $this->_age = $age;
    }
 
    //FOR SIZE
    public function setSize(float $size){
        $this->_size = $size;
    }
 
    //FOR STATUS
    public function setStatus(string $status){
        $this->_status = $status;
    }
    // (méthdes) methods
    //CONCATENATION
    public function describe(){
        $firstname = ucfirst($this->_firstName);
        $lastname = strtoupper($this->_lastName);
        $number = number_format($this->_size,2,',','');
           
        echo '<p>'.$firstname.' '.$lastname.'</p>';
        echo '<p>'.$this->_age.' ans, je mesure '.$number.'m et je fais partie des ';
        echo ($this->_status == 'apprenant') ? 'apprenants' : 'formateurs';
        echo ' de la promo 6 Simplon.</p>';
    }
    //FONCTION HYDRATE
    public function hydrate($tab){
        // foreach($tab as $key => $value)
        // {
            ((!empty($tab['firstname'])) OR ($tab['firstname'] !== null)) ? $this->setFirstName($tab['firstname']) : $tab['firstname'] = 'corentin';
            ((!empty($tab['lastname'])) OR ($tab['lastname'] !== null)) ? $this->setLastName($tab['lastname']) :  $tab['lastname'] = 'chopin';
            ((!empty($tab['age'])) OR ($tab['age'] !== null)) ? $this->setAge($tab['age']) :  $tab['age'] = 19;
            ((!empty($tab['size'])) OR ($tab['size'] !== null)) ? $this->setSize($tab['size']) :  $tab['size'] = 1.81;
            ((!empty($tab['status'])) OR ($tab['status'] !== null)) ? $this->setStatus($tab['status']) :  $tab['status'] = 'apprenant';
            return ($tab);
        // }
    }
}