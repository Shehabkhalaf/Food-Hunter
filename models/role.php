<?php
  class role{
    private $email;
    private $password;
    private $roleId;

    public function __construct1($email,$password,$roleId=0){
      $this->email=$email;
      $this->password=$password;
      $this->roleId=$roleId;
    }

    public function __construct2(){
      
    }
    public function getRoleId() {
        return $this->roleId;
    }
    
    public function setRoleId($roleId) {
        $this->roleId = $roleId;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
  }