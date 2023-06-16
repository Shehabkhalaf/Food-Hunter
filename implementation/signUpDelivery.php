<?php
  require_once("../models/delivery.php");
  require_once("../controllers/dbcontroller.php");
  require_once("../controllers/deliverycontroller.php");
  require_once("../controllers/emailcontroller.php");
  if(isset($_POST)){
    $delivery=new delivery;
    $delivery->__construct2($_POST["email"],$_POST["password"],$_POST["name"],$_POST["phone"],$_POST["license"]);
    $deliveryContro=new deliverycontro;
    $email=$delivery->getEmail();
    $password=$delivery->getPass();
    $name=$delivery->getName();
    $phone=$delivery->getPhone();
    $license=$delivery->getLicense();
    $roleId=$delivery->getRoleId();
    $query="INSERT INTO delivery(email,password,name,phone,license,hired,adminId) VALUES ('$email','$password','$name','$phone','$license','no','1')";
    $deliveryContro->signup($query);
    $mail=new email;
    $mail->__construct2($email,$mail->getFrom(),"Food-Hunter","Yor request <strong>$name</strong> to join us as a delivery hero has been submitted successfully<br>We will send you an email as soon as possible to know if we accept or reject you request<br><h2>Thanks a lot.</h2>");
    $mail->sendEmail();
  }