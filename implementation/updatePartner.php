<?php
  require_once("../models/partner.php");
  require_once("../controllers/partnercontroller.php");

  if(isset($_POST)){
    $id=$_POST["id"];
    $logo_name=$_FILES["image"]["name"];
    $logo=addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $logoType=$_FILES["image"]["type"];
    $partner=new Custom\Partner;
    $partner->setId($id);
    $partner->setName($_POST["name"]);
    $partner->setLocation($_POST["address"]);
    $partner->setPhone($_POST["phone"]);
    $partner->setLogoName($logo_name);
    $partner->setLogo($logo);
    $partner->setLogotype($logoType);
    $partner->setOpen($_POST["open"]);
    $partner->setClose($_POST["close"]);
    $partner->setFees($_POST["fees"]);
    $partner->setTime($_POST["time"]);
    $partner->setStatus($_POST["status"]);
    $partner->setDescription($_POST["description"]);
    $partner->setMinorder($_POST["minorder"]);
    $partner->setCategory($_POST["category"]);
    $pcontro=new restaurant($partner);
    $pcontro->updateData();
  }