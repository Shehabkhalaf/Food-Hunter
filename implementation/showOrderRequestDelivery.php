<?php
  require_once("../controllers/deliverycontroller.php");
  $deliveryContro=new deliverycontro;
  $rows=$deliveryContro->showOrderRequests();
  header('Content-Type: application/json');
  echo json_encode($rows);