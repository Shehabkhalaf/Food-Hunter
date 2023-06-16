<?php
  require_once("person.php");
  require_once("../models/partner.php");
  require_once("dbcontroller.php");
  require_once("../models/meal.php");
  class restaurant extends person{
    private Custom\Partner $partner;
    private meal $meal;
    protected $db;
    public function __construct(Custom\Partner $partner){
      $this->partner=$partner;
    }

    public function getId(){
      $email=$this->partner->getEmail();
      $this->db=new DBController;
      $query="select id from partner where email='$email'";
      $rows=$this->db->select($query);
      if(!empty($rows)){
        return $rows;
      }else{
        echo "error in query";
      }
    }

    public function getData(){
      $email=$this->partner->getEmail();
      $this->db=new DBController;
      $query="SELECT id,email,name,location,phone,logoname,logo,logotype,open,close,fees,time,status,description,minorder FROM partner where email='$email'";
      $result=$this->db->select($query);
      if($result){
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
      }
      return $rows;
      }else{
        echo "empty result";
      }
    }

    public function setMeal(meal $meal){
      $this->meal=$meal;
    }

    public function addMeal(){
      $this->db=new DBController;
      $partnerId=$this->meal->getPartnerId();
      $mealname=$this->meal->getMealName();
      $description=$this->meal->getDescription();
      $imageName=$this->meal->getImageName();
      $image=$this->meal->getImage();
      $imagetype=$this->meal->getImagetype();
      $price=$this->meal->getPrice();
      $query="INSERT INTO meal(partnerid,mealname,description,imageName,image,imagetype,price) VALUES ('$partnerId','$mealname','$description','$imageName','$image','$imagetype','$price')";
      $this->db->insert($query);
    }

    public function deleteMeal(){
      $this->db=new DBController;
      $id=$this->meal->getMealId();
      $query="DELETE FROM meal WHERE mealid='$id'";
      $this->db->delete($query);
    }

    public function updatemeal(){
      $this->db=new DBController;
      $mealId=$this->meal->getMealId();
      $mealname=$this->meal->getMealName();
      $description=$this->meal->getDescription();
      $imageName=$this->meal->getImageName();
      $image=$this->meal->getImage();
      $imagetype=$this->meal->getImagetype();
      $price=$this->meal->getPrice();
      $query="UPDATE meal SET mealname ='$mealname', description = '$description', imageName = '$imageName', image='$image' ,imagetype = '$imagetype', price = '$price' WHERE mealid = '$mealId'";
      $this->db->update($query);
    }

    public function getMeals(){
      $this->db=new DBController;
      $id=$this->partner->getId();
      $query="SELECT mealid,mealname,description,imageName,image,imagetype,price FROM meal WHERE partnerid='$id'";
      $result=$this->db->select($query);
      if($result){
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
      }
      return $rows;
      }else{
        echo "empty result";
        return [];
      }
    }

    public function getOrders(){
      $this->db=new DBController;
      $id=$this->partner->getId();
      $query="SELECT delivers.orderid,delivers.orderdetails,delivers.totalPrice,delivers.feedback,delivers.ratings,delivers.review,user.email,user.name,user.phone,user.location,delivers.orderTime,delivers.staus as status from delivers INNER join user on delivers.userid=user.id WHERE delivers.partnerid='$id'";
      $result=$this->db->select($query);
            if($result){
              $rows = array();
              while ($row = mysqli_fetch_assoc($result)) {
              $rows[] = $row;
            }
            return $rows;
            }else{
              echo "empty result";
              return [];
            }
    }

    public function getAllpartners(){
      $this->db=new DBController;
      $query="SELECT  id,email,name,location,phone,logoname,logo,logotype,open,close,fees,time,status,description,minorder, category FROM partner";
      $result=$this->db->select($query);
      if($result){
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
      }
      return $rows;
      }else{
        echo "empty result";
        return [];
      }
    }

    public function getUsers(){
      $this->db=new DBController;
      $id=$this->partner->getId();
      $query="select user.name,user.email,user.phone,user.location from delivers inner join user on delivers.userid=user.id where delivers.partnerid='$id'";
      $result=$this->db->select($query);
      if($result){
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
      }
      return $rows;
      }else{
        echo "empty result";
        return [];
      }
    }
    public function updateData(){
      $this->db=new DBController;
      $id=$this->partner->getId();
      $name=$this->partner->getName();
      $location=$this->partner->getLocation();
      $phone=$this->partner->getPhone();
      $logoname=$this->partner->getLogoName();
      $logo=$this->partner->getLogo();
      $logotype=$this->partner->getLogotype();
      $open=$this->partner->getOpen();
      $close=$this->partner->getClose();
      $fees=$this->partner->getFees();
      $time=$this->partner->getTime();
      $status=$this->partner->getStatus();
      $description=$this->partner->getDescription();
      $minorder=$this->partner->getMinorder();
      $category=$this->partner->getCategory();
      $query="UPDATE partner SET name='$name',location='$location',phone='$phone',logoname='$logoname',logo='$logo',logotype='$logotype',open='$open',close='$close',fees='$fees',time='$time',status='$status',description='$description',minorder='$minorder',category='$category' WHERE id='$id'";
      $this->db->update($query);
    }

    public function getFeedback(){
      $id=$this->partner->getId();
      $this->db=new DBController;
      $query="select feedback,ratings from delivers where partnerid='$id'";
      $result=$this->db->select($query);
      if($result){
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
      }
      return $rows;
      }else{
        echo "empty result";
        return [];
      }
    }
  }