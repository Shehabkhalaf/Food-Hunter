<?php
  class user{
    private $id;
    private $email;
    private $password;
    private $name;
    private $location;
    private $phone;

		private $roleid=3; 
    public function __construct1(){

    }

    public function __construct2($email,$password,$name,$location,$phone,$id=0){
      $this->id=$id;
      $this->email=$email;
      $this->password=$password;
      $this->name=$name;
      $this->location=$location;
      $this->phone=$phone;
    }


	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
	}


	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}

  public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
	}


	public function getLocation() {
		return $this->location;
	}
	public function setLocation($location) {
		$this->location = $location;
	}


	public function getPhone() {
		return $this->phone;
	}

	public function setPhone($phone){
		$this->phone = $phone;
	}

	public function getId() {
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function getRoleid() {
		return $this->roleid;
	}
}