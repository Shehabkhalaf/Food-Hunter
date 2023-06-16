<?php
  /*$to="shehabkhalaf7474@gmail.com";
  $subject="Nothing";
  $messsage="Hello it is working";
  $headers="MIME-Version: 1.0" . "\r\n";
  $headers.="Content-type:text/html;charset=UTF-8";
  $headers.="From:<foodhunter7474@gmail.com>"."\r\n";
  mail($to,$subject,$messsage,$headers);*/

  class email{
    private $from;
    private $to;
    private $messsage;
    private $subject;
    private $ourGmail="foodhunter7474@gmail.com";
    public function __construct1(){
    }
    public function __construct2($to,$from,$subject,$messsage){
      $this->to=$to;
      $this->subject=$subject;
      $this->messsage=$messsage;
      $this->from="<"."$from".">";
    }

    public function getOurGmail(){
      return $this->ourGmail;
    }

	public function getTo() {
		return $this->to;
	}
	public function setTo($to) {
		$this->to = $to;
	}

  public function getFrom(){
    return $this->from;
  }
	public function getMesssage() {
		return $this->messsage;
	}
	public function setMesssage($messsage){
		$this->messsage = $messsage;
	}
	public function getSubject() {
		return $this->subject;
	}
	public function setSubject($subject){
		$this->subject = $subject;
	}
  public function sendEmail(){
    $from=$this->getFrom();
    $headers="MIME-Version: 1.0" . "\r\n";
    $headers.="Content-type:text/html;charset=UTF-8";
    $headers.="From:$from"."\r\n";
    mail($this->to,$this->subject,$this->messsage,$headers);
  }
}
?>