<?php
  require_once("../models/meal.php");
  require_once("../controllers/partnercontroller.php");
  require_once("../models/partner.php");
  if(isset($_POST)){
    $partner=new Custom\Partner;
    $pcontro=new restaurant($partner);
    $meal=new meal;
    $id=$_POST["mealid"];
    $meal->setMealId($id);
    $pcontro->setMeal($meal);
    $pcontro->deleteMeal();
  }