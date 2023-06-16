<?php 
  require_once("dbcontroller.php");
  class person{
    protected $db;

    public function __construct(){

    }
    public function signup($query){
      $this->db=new DBController;
      $operation=$this->db->insert($query);
      if($operation){
        $this->db->closeConnection();
        return true;
      }else{
        return false;
      }
  }

    public function login($email,$password){
      $this->db=new DBController;
      $query="select roleid from role where email='$email' AND password='$password'";
      $result=$this->db->select($query);
      $rows = array();
      while ($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
      }
      return $rows;
    }
}
