<?php
//moet nog aangepast worden aan de hand van database
class User {

    private $id;
    private $firstname;
    private $lastname;
	private $phonenumber;
	private $password;    
    
    public function User($id, $firstname,$lastname, $phonenumber, $password){
    
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
		$this->phonenumber = $phonenumber;
		$this->password = $password;
          
    }    
	public function getId() {
        return $this->id;
    }	
    public function getFirstName() {
        return $this->firstname;
    }    
    public function getLastName() {
        return $this->lastname;
    }
    public function getPhonenumber() {
        return $this->phonenumber;
    }	 
    public function getPassword() {
        return $this->password;
    }    
}


?>