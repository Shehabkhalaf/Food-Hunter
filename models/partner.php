<?php
    namespace Custom;
class Partner {
    private $id;
    private $email;
    private $password;
    private $name;
    private $location;
    private $phone;
    private $logoName;
    private $logo;

    private$logotype;
    private $open;
    private $close;
    private $fees;
    private $time;
    private $status;
    private $description;
    private $minorder;

    private $category;
    private $roleid = 2;

    // Empty constructor
    public function __construct1() {}

    // Parameterized constructor
    public function __construct2($email, $password, $name, $location, $phone, $logoName, $logo, $open, $close, $fees, $time, $status, $description, $minorder,$category) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->location = $location;
        $this->phone = $phone;
        $this->logoName = $logoName;
        $this->logo = $logo;
        $this->open = $open;
        $this->close = $close;
        $this->fees = $fees;
        $this->time = $time;
        $this->status = $status;
        $this->description = $description;
        $this->minorder = $minorder;
        $this->category = $category;
    }

    // Getter and Setter methods
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getLogoName() {
        return $this->logoName;
    }

    public function setLogoName($logoName) {
        $this->logoName = $logoName;
    }

    public function getLogo() {
        return $this->logo;
    }

    public function setLogo($logo) {
        $this->logo = $logo;
    }

    public function getOpen() {
        return $this->open;
    }

    public function setOpen($open) {
        $this->open = $open;
    }

    public function getClose() {
        return $this->close;
    }

    public function setClose($close) {
        $this->close = $close;
    }

    public function getFees() {
        return $this->fees;
    }

    public function setFees($fees) {
        $this->fees = $fees;
    }

	public function getTime() {
		return $this->time;
	}
	
	public function setTime($time){
		$this->time = $time;
		return $this;
	}

	public function getStatus() {
		return $this->status;
	}
	
	public function setStatus($status): self {
		$this->status = $status;
		return $this;
	}

	public function getDescription() {
		return $this->description;
	}
	
	public function setDescription($description){
		$this->description = $description;
		return $this;
	}

	public function getMinorder() {
		return $this->minorder;
	}
	
	public function setMinorder($minorder){
		$this->minorder = $minorder;
		return $this;
	}
	public function getRoleid() {
		return $this->roleid;
	}
	
	public function setRoleid($roleid){
		$this->roleid = $roleid;
		return $this;
	}

	public function getCategory() {
		return $this->category;
	}
	public function setCategory($category){
		$this->category = $category;
		return $this;
	}
	public function getLogotype() {
		return $this->logotype;
	}
	public function setLogotype($logotype){
		$this->logotype = $logotype;
		return $this;
	}
}