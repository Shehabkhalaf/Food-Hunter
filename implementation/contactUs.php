<?php
  require_once("../controllers/emailcontroller.php");
  if(isset($_POST)){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $subject=$_POST["subject"];
    $message=$_POST["message"];
    $mail=new email;
    $mail->__construct2($mail->getOurGmail(),$email,$subject,$message);
    $mail->sendEmail();
  }