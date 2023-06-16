<?php
  require_once("../models/partner.php");
  require_once("../controllers/partnercontroller.php");
  require_once("../controllers/emailcontroller.php");
    if(isset($_POST)){
    $logo_name=$_FILES["image"]["name"];
    $logo=addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $logoType=$_FILES["image"]["type"];
    $partner= new Custom\Partner;
    $partner->__construct2($_POST["email"],$_POST["password"],$_POST["name"],$_POST["address"],$_POST["phone"],$logoName,$logo,$_POST["open"],$_POST["close"],$_POST["fees"],$_POST["time"],$_POST["status"],$_POST["description"],$_POST["minorder"],$_POST["category"]);
    $pcontro=new restaurant($partner);
    $email=$partner->getEmail();
    $password=$partner->getPassword();
    $name=$partner->getName();
    $address=$partner->getLocation();
    $phone=$partner->getPhone();
    $logoName=$partner->getLogoName();
    $logo=$partner->getLogo();
    $open=$partner->getOpen();
    $close=$partner->getClose();
    $fees=$partner->getFees();
    $time=$partner->getTime();
    $status=$partner->getStatus();
    $description=$partner->getDescription();
    $minOrder=$partner->getMinOrder();
    $category=$partner->getCategory();
    $role=$partner->getRoleid();
    $query="insert into partner(email,password,name,location,phone,logoname,logo,logotype,open,close,fees,time,status,description,minorder,category) VALUES ('$email','$password','$name','$address','$phone','$logo_name','$logo','$logoType','$open','$close','$fees','$time','$status','$description','$minOrder','$category')";
    $pcontro->signup($query);
    $query="insert into role(email,password,roleid) values('$email','$password','$role')";
    $pcontro->signup($query);
    $mail=new email;
    $mail->__construct2($email,$mail->getFrom(),"Food-Hunter","Thanks $name to join us as a partner");
    $mail->sendEmail();
    }