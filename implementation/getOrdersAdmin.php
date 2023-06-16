<?php
  require_once("../controllers/admincontroller.php");
  $admincontro=new admincontroller;
  $rows=$admincontro->getReport();
  header('Content-Type: application/json');
  echo json_encode($rows);