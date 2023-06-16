<?php
  class delivery{
    private $id;
    private $email;
    private $password;
    private $name;
    private $phone;
    private $license;
    private $roleId=4;

    public function __construct1(){
      
    }

    public function __construct2($email,$password,$name,$phone,$license,$id=0){
      $this->id=$id;
      $this->email=$email;
      $this->password=$password;
      $this->name=$name;
      $this->phone=$phone;
      $this->license=$license;
    }

/*Set and Get for Id*/ 
    public function setId($id){
      $this->id=$id;
    }

    public function getId(){
      return $this->id;
    }
/*End Set and get Id*/

/*Set and get for name */
    public function setName($name){
      $this->name=$name;
    }
    public function getName(){
      return $this->name;
    }
/*End set and get name*/

/*Set and get fo email*/ 
    public function setEmail($email){
      $this->email=$email;
    }
    public function getEmail(){
      return $this->email;
    }
/*End set and get email*/

/*Set and get for pass*/
    public function setPass($password){
      $this->password=$password;
    }
    public function getPass(){
      return $this->password;
    }
/*End for set and get pass*/

/*Set and get for phone*/
    public function setphone($phone){
      $this->phone=$phone;
    }
    public function getPhone(){
      return $this->phone;
    }
/*End for set and get phone*/

/*Set and get for license*/
    public function setLicense($license){
      $this->license=$license;
    }
    public function getLicense(){
      return $this->license;
    }
/*End for set and get license*/

	public function getRoleId() {
		return $this->roleId;
	}
}