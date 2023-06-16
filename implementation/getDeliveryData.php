<?php
  require_once("../models/delivery.php");
  require_once("../controllers/deliverycontroller.php");
  if(isset($_GET)){
    $email=$_GET["email"];
    $delivery=new delivery;
    $delivery->setEmail($email);
    $deliveryContro=new deliverycontro;
    $deliveryContro->__construct2($delivery);
    $rows=$deliveryContro->getData();
    header('Content-Type: application/json');
    echo json_encode($rows);
  }