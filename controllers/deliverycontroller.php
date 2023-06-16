<?php
  require_once("../models/delivery.php");
  require_once("dbcontroller.php");
  require_once("person.php");
  require_once("../models/order.php");

  class deliverycontro extends person{
    private delivery $delivery;
    protected $db;
    private order $order;
    public function __construct1(){
    }

    public function __construct2(delivery $delivery){
      $this->delivery=$delivery;
    }

    public function setOrder(order $order){
      $this->order=$order;
    }

    public function update(){
      $this->db=new DBController;
      $id=$this->delivery->getId();
      $name=$this->delivery->getName();
      $license=$this->delivery->getLicense();
      $phone=$this->delivery->getPhone();
      $query="UPDATE delivery SET name='$name',phone='$phone',license='$license' WHERE id='$id'";
      $this->db->update($query);
    }

    public function getData(){
      $this->db=new DBController;
      $email=$this->delivery->getEmail();
      $query="SELECT id,email,name,phone,license FROM delivery WHERE email='$email'";
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

    public function showOrderRequests(){
      $this->db=new DBController;
      $query="SELECT delivers.orderid as id,delivers.totalPrice,delivers.fees,delivers.mealPrice as mealPrice,delivers.orderdetails as details,user.name as userName,user.location as userLocation,user.phone as userPhone,partner.name as restaurant,partner.location as partnerLocation,delivers.orderTime FROM delivers JOIN user ON delivers.userid=user.id JOIN partner on delivers.partnerid=partner.id WHERE delivers.staus='pending'";
      $result=$this->db->select($query);
      if($result){
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
      }
      return $rows;
      }else{
        echo "empty result";
        return [];
      }
    }

    public function deliverOrder(){
      $this->db=new DBController;
      $deliveryId=$this->delivery->getId();
      $orderId=$this->order->getOrderId();
      $deliveryTime=$this->order->getDeliveryTime();
      $query="UPDATE delivers SET deliveryid='$deliveryId',staus='delivered',deliveryTime='$deliveryTime' WHERE delivers.orderid='$orderId'";
      $this->db->update($query);
    }

    public function showDeliveredOrders(){
      $this->db=new DBController;
      $deliveryId=$this->delivery->getId();
      $query="SELECT delivers.orderid as id,delivers.fees as fees,delivers.orderdetails as details,user.name as userName,user.location as userLocation,user.email as userEmail,partner.name as restaurant,delivers.deliveryTime FROM delivers JOIN user ON delivers.userid=user.id JOIN partner on delivers.partnerid=partner.id WHERE delivers.deliveryid='$deliveryId'";
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