<?php
  require_once("../models/partner.php");
  require_once("../controllers/partnercontroller.php");
  if(isset($_GET)){
    $partnerId=$_GET["id"];
    $partner=new Custom\Partner;
    $partner->setId($partnerId);
    $partcontr=new restaurant($partner);
    $rows=$partcontr->getFeedback();
    header('Content-Type: application/json');
    echo json_encode($rows);
  }