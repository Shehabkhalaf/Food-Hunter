<?php

  use Custom\Partner;

  require_once("../controllers/partnercontroller.php");
  require_once("../models/meal.php");
  require_once("../models/partner.php");
  if(isset($_POST)){
    $partner=new Custom\Partner;
    $partner->setId($_POST["id"]);
    $imageName=$_FILES["image"]["name"];
    $image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $imageType=$_FILES["image"]["type"];
    $pcontro=new restaurant($partner);
    $meal=new meal;
    $meal->__construct2($partner->getId(),$_POST["mealname"],$_POST["description"],$imageName,$image,$imageType,$_POST["price"]);
    $pcontro->setMeal($meal);
    $pcontro->addMeal();
  }