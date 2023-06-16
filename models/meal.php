<?php
  class meal{
    private $partnerId;
    private $mealId;
    private $mealName;
    private $description;
    private $imageName;
    private $image;
    private $imagetype;
    private $price;

    public function __construct1(){

    }

    public function __construct2($partnerId,$mealName,$description,$imageName,$image,$imagetype,$price,$mealId=0){
      $this->partnerId=$partnerId;
      $this->mealId=$mealId;
      $this->mealName=$mealName;
      $this->description=$description;
      $this->image=$image;
      $this->imageName=$imageName;
      $this->imagetype=$imagetype;
      $this->price=$price;
    }
public function getPartnerId() {
        return $this->partnerId;
    }

    public function setPartnerId($partnerId) {
        $this->partnerId = $partnerId;
    }

    public function getMealId() {
        return $this->mealId;
    }

    public function setMealId($mealId) {
        $this->mealId = $mealId;
    }

    public function getMealName() {
        return $this->mealName;
    }

    public function setMealName($mealName) {
        $this->mealName = $mealName;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

	public function getImageName() {
		return $this->imageName;
	}
	public function setImageName($imageName) {
		$this->imageName = $imageName;
		return $this;
	}

	public function getImagetype() {
		return $this->imagetype;
	}
	public function setImagetype($imagetype): self {
		$this->imagetype = $imagetype;
		return $this;
	}
}