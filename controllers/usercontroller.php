<?php
  require_once("../models/user.php");
  require_once("dbcontroller.php");
  require_once("person.php");
  require_once("../models/order.php");
  class usercontro extends person{
    private user $user;

    private order $order;
    protected $db;

    public function __construct1(){
    }

    public function __construct2(user $user){
      $this->user=$user;
    }

    public function setOrder(order $order){
      $this->order=$order;
    }
    public function getId(){
      $this->db=new DBController;
      $email=$this->user->getEmail();
      $query="select id from user where email='$email'";
      $rows=$this->db->select($query);
      if(!empty($rows)){
        return $rows;
      }else{
        echo "error in query";
      }
    }

    public function getUserData(){
      $this->db=new DBController;
      $email=$this->user->getEmail();
      $query="SELECT id,email,name,location,phone FROM user WHERE email='$email'";
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

    public function update(){
      $this->db=new DBController;
      $id=$this->user->getId();
      $name=$this->user->getName();
      $email=$this->user->getEmail();
      $phone=$this->user->getPhone();
      $location=$this->user->getLocation();
      $query="UPDATE user SET email='$email',name='$name',location='$location',phone='$phone' WHERE id='$id'";
      $this->db->update($query);
    }

    public function makeOrder(){
      $this->db=new DBController;
      $deliveryId=$this->order->getDeliveryId();
      $userId=$this->order->getUserId();
      $totalPrice=$this->order->getTotalPrice();
      $orderdetails=$this->order->getorderdetails();
      $fees=$this->order->getFees();
      $mealPrice=$this->order->getMealPrice();
      $partnerId=$this->order->getPartnerId();
      $feedback=$this->order->getFeedback();
      $ratings=$this->order->getRatings();
      $review=$this->order->getReview();
      $status=$this->order->getStatus();
      $orderTime=$this->order->getOrderTime();
      $query="INSERT INTO delivers(deliveryid,userid,orderdetails,totalPrice,mealPrice,fees,partnerid,feedback,ratings,review,staus, orderTime, deliveryTime) VALUES ('$deliveryId','$userId','$orderdetails','$totalPrice','$mealPrice','$fees','$partnerId','$feedback','$ratings','$review','$status','$orderTime','none')";
      $this->db->insert($query);
    }

    public function getOrders(){
      $this->db=new DBController;
      $userId=$this->user->getId();
      $query="SELECT partner.name as restaurant,delivers.orderdetails,delivers.totalPrice,delivers.staus FROM delivers INNER join partner on delivers.partnerid=partner.id WHERE delivers.userid='$userId'";
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
  }