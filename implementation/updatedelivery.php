<?php
  require_once("../models/delivery.php");
  require_once("../controllers/deliverycontroller.php");
  if(isset($_POST)){
    $delivery=new delivery;
    $id=$_POST["id"];
    $delivery->setId($id);
    $delivery->setName($_POST["name"]);
    $delivery->setLicense(($_POST["license"]));
    $delivery->setphone($_POST["phone"]);
    $deliveryContro=new deliverycontro;
    $deliveryContro->__construct2($delivery);
    $deliveryContro->update();
  }