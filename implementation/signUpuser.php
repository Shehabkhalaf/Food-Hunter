<?php
  require_once("../models/user.php");
  require_once("../controllers/usercontroller.php");
  require_once("../controllers/emailcontroller.php");
  if(isset($_POST)){
    $user = new user;
    $user->__construct2($_POST["email"],$_POST["password"],$_POST["name"],$_POST["location"],$_POST["phone"]);
    $usercontro=new usercontro;
    $email=$user->getEmail();
    $password=$user->getPassword();
    $name=$user->getName();
    $location=$user->getLocation();
    $phone=$user->getPhone();
    $role=$user->getRoleid();
    $query="INSERT INTO user(email,password,name,location,phone) VALUES ('$email','$password','$name','$location','$phone')";
    $usercontro->signup($query);
    $query="insert into role(email,password,roleid) values('$email','$password','$role')";
    $usercontro->signup($query);
    $mail=new email;
    $mail->__construct2($email,$mail->getFrom(),"Food-Hunter","You have signed up.<br>Now you can make your orders and enjoy meals from best restaurants.");
    $mail->sendEmail();
  }