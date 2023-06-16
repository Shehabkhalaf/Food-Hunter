<?php 
  class admin{
    private $id;
    private $username;
    private $password;

    private $roleId=1;
    public function __construct1()
    {
      
    }
    public function __construct2($name,$password,$id=0){
      $this->id=$id;
      $this->username=$name;
      $this->password=$password;
    } 

/*Set and Get for Id*/ 
    public function setId($id){
      $this->id=$id;
    }

    public function getId(){
      return $this->id;
    }
/*End Set and get Id*/

/*Set and get for pass*/
    public function setPass($password){
      $this->password=$password;
    }
    public function getPass(){
      return $this->password;
    }
/*End for set and get pass*/

	public function getRoleId() {
		return $this->roleId;
	}

	public function getUsername() {
		return $this->username;
	}
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}
}

?>