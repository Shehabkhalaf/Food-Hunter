<?php
  require_once("../controllers/partnercontroller.php");
  require_once("../models/partner.php");
  if(isset($_GET)){
    $id=$_GET["id"];
    $partner=new Custom\Partner;
    $partner->setId($id);
    $partcontr=new restaurant($partner);
    $rows=$partcontr->getFeedback();
    header('Content-Type: application/json');
    echo json_encode($rows);
  }