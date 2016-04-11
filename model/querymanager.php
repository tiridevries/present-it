<?php

require_once("MySQLConnection.php");
require_once("../model/userClass.php");

//moet nog aangepast worden aan de hand van database en benodigdheden
class QueryManager {
   
    private $dbconn;
    
    public function QueryManager() {
      $this->dbconn = new MySQLConnection();     
    }
	
    /***************************************************
	 Hieronder staan alle queries voor de users:
	***************************************************/
	
    public function findUserById($id) {
        
        // 1 rij uit de database
        $result = $this->dbconn->query("SELECT * FROM user WHERE id='$id'");
        $row = mysqli_fetch_array($result);
        // OOP: instantieer een Userobject en geef deze als resultaat
        return (new User($row['id'], $row['firstname'],$row['lastname'], $row['phonenumber'], $row['password']));
    }
       // alle users
    public function findAllUsers() {         
        $result = $this->dbconn->query("SELECT * FROM user");
        // OOP: alle users:
        while ($row = mysqli_fetch_array($result)) {
        $userList[] = new User($row['id'],$row['firstname'],$row['lastname'], $row['phonenumber'], $row['password']);
        }
        return $userList;
      }            
    public function saveUser($firstname,$lastname,$phonenumber, $password) {
    $this->dbconn->query("INSERT into user (firstname, lastname, phonenumber, password) VALUES 
	('$firstname','$lastname','$phonenumber', '$password')"); 
    }
    
     public function loginUser($firstname, $password) { 
     $result = $this->dbconn->query("SELECT * FROM user WHERE firstname ='$firstname' AND password = '$password'");
	 $row = mysqli_num_rows($result);
	 return $row;
    }
	
    
    
}
