<?php
  require_once("../controllers/partnercontroller.php");
  require_once("../models/partner.php");
  $partner=new Custom\Partner;
  $partcontr=new restaurant($partner);
  $rows=$partcontr->getAllpartners();
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