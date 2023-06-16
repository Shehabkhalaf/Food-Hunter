<?php
  require_once("../models/order.php");
  require_once("../controllers/usercontroller.php");
  require_once("../models/user.php");

  if(isset($_GET)){
    $userId=$_GET["id"];
    $user=new user;
    $user->setId($userId);
    $usercontro=new usercontro;
    $usercontro->__construct2($user);
    $rows=$usercontro->getOrders();
    header('Content-Type: application/json');
    echo json_encode($rows);
  }