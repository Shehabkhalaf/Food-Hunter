<?php
  require_once("../controllers/admincontroller.php");
  $admincontro=new admincontroller;
  $admincontro->__construct();
  $rows=$admincontro->getAllpartners();
  if(!empty($rows)){
    foreach($rows as $key=>$row){
      $imageData = $rows[$key]['logo'];
      $imageType = $rows[$key]['logotype'];
      $imageName = $rows[$key]['logoname'];
      $imageUrl = "data:image/" . $imageType . ";base64," . base64_encode($imageData);
      $rows[$key]["logo"]=$imageUrl;
    }
  }
  header('Content-Type: application/json');
  echo json_encode($rows);