<?php
  require_once("../models/user.php");
  require_once("../controllers/usercontroller.php");
  if(isset($_GET)){
    $email=$_GET["email"];
    $user=new user;
    $user->setEmail($email);
    $usercontro=new usercontro;
    $usercontro->__construct2($user);
    $rows=$usercontro->getUserData();
    header('Content-Type: application/json');
    echo json_encode($rows);
  }