<?php
  require_once("../models/delivery.php");
  require_once("../controllers/deliverycontroller.php");
  if(isset($_GET)){
    $deliveryId=$_GET["id"];
    $delivery=new delivery;
    $delivery->setId($deliveryId);
    $deliveryContro=new deliverycontro;
    $deliveryContro->__construct2($delivery);
    $rows=$deliveryContro->showDeliveredOrders();
    header('Content-Type: application/json');
    echo json_encode($rows);
  }