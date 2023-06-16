<?php
  require_once("../controllers/admincontroller.php");
  $admin=new admincontroller;
  $admin->__construct();
  $rows=$admin->getAllusers();
  header('Content-Type: application/json');
  echo json_encode($rows);