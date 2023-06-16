<?php
  class order{

    private $orderId;
    private $deliveryId;
    private $userId;
    private $orderdetails;
    private $totalPrice;
    private $fees;
    private $mealPrice;
    private $partnerId;
    private $feedback;
    private $ratings;
    private $review;
    private $status;
    private $orderTime;
    private $deliveryTime;
    public function __construct1(){

    }

    public function __construct2($deliveryId,$userId,$orderdetails,$totalPrice,$fees,$mealPrice,$partnerId,$feedback,$ratings,$review,$orderTime,$deliveryTime,$status="pending"){
      $this->deliveryId=$deliveryId;
      $this->userId=$userId;
      $this->orderdetails=$orderdetails;
      $this->totalPrice=$totalPrice;
      $this->fees=$fees;
      $this->mealPrice=$mealPrice;
      $this->partnerId=$partnerId;
      $this->feedback=$feedback;
      $this->ratings=$ratings;
      $this->review=$review;
      $this->status=$status;
      $this->orderTime=$orderTime;
      $this->deliveryTime=$deliveryTime;
    }
public function getDeliveryId() {
        return $this->deliveryId;
    }

    public function setDeliveryId($deliveryId) {
        $this->deliveryId = $deliveryId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }
    public function getorderdetails() {
        return $this->orderdetails;
    }

    public function setorderdetails($orderdetails) {
        $this->orderdetails = $orderdetails;
    }

    public function getTotalPrice() {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice) {
        $this->totalPrice = $totalPrice;
    }

    public function getPartnerId() {
        return $this->partnerId;
    }

    public function setPartnerId($partnerId) {
        $this->partnerId = $partnerId;
    }


    public function getFeedback() {
    return $this->feedback;
  }


  public function setFeedback($feedback){
    $this->feedback = $feedback;
  }

	public function getOrderId() {
		return $this->orderId;
	}
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
		return $this;
	}

	public function getRatings() {
		return $this->ratings;
	}
	public function setRatings($ratings): self {
		$this->ratings = $ratings;
		return $this;
	}
	public function getReview() {
		return $this->review;
	}
	public function setReview($review){
		$this->review = $review;
		return $this;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status){
		$this->status = $status;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getOrderTime() {
		return $this->orderTime;
	}
	
	/**
	 * @param mixed $orderTime 
	 * @return self
	 */
	public function setOrderTime($orderTime) {
		$this->orderTime = $orderTime;
		return $this;
	}

	public function getDeliveryTime() {
		return $this->deliveryTime;
	}
	public function setDeliveryTime($deliveryTime){
		$this->deliveryTime = $deliveryTime;
		return $this;
	}
	public function getFees() {
		return $this->fees;
	}
	public function setFees($fees) {
		$this->fees = $fees;
		return $this;
	}
	public function getMealPrice() {
		return $this->mealPrice;
	}
	public function setMealPrice($mealPrice){
		$this->mealPrice = $mealPrice;
		return $this;
	}
}