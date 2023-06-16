<?php

class DBController{

    private $DBhost ="localhost";
    private $DBusername="root";
    private $DBpassword="";
    private $DBname="foodhunter";
    private $conn=null;



    function __construct(){
        $this->conn=new mysqli($this->DBhost,$this->DBusername,$this->DBpassword,$this->DBname);

        if($this->conn->connect_error){
            echo $this->conn->connect_error;
            //return false;
        }
        //return true;
    }



/*
    public function openConnection(){
        $this->conn=new mysqli($this->DBhost,$this->DBusername,$this->DBpassword,$this->DBname);

        if($this->conn->connect_error){
            echo $this->conn->connect_error;
            return false;
        }
        return true;
    }
*/



    public function select($stmt){
        $result=$this->conn->query($stmt);
        if (!$result) {
        echo "Query failed: " . mysqli_error($this->conn);
        }else {
        return $result;
    }
    }







    public function insert($stmt){
        $result =$this->conn->query($stmt);
        if($result===true){
            return true;
        }else{
            return false;
        }
    }







    public function update($stmt){
        $result=$this->conn->query($stmt);
        if($result===true){
            return true;
        }else{
            return false;
        }
    }






    public function delete($stmt){
        $result=$this->conn->query($stmt);
        if($result===true){
            return true;
        }else{
            return false;
        }
    }









    public function getConnectionError(){
        return $this->conn->connect_error;
    }





    public function closeConnection(){
        $this->conn->close();
        return true;
    }






}




?>