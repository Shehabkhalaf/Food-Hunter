<?php
  require_once("../models/partner.php");
  require_once("../controllers/partnercontroller.php");
  if(isset($_POST)){
    $id=$_GET["partnerid"];
    $partner=new Custom\Partner;
    $partner->setId($id);
    $pcontro=new restaurant($partner);
    $rows=$pcontro->getMeals();
    if(!empty($rows)){
      foreach($rows as $key=>$row){
        $imageData = $rows[$key]['image'];
        $imageType = $rows[$key]['imagetype'];
        $imageName = $rows[$key]['imageName'];
        $imageUrl = "data:image/" . $imageType . ";base64," . base64_encode($imageData);
        $rows[$key]["image"]=$imageUrl;
      }
    }
    header('Content-Type: application/json');
    echo json_encode($rows);
}