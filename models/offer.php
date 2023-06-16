<?php 
class useroffer{
    private $userId;
    private $adminId;
    private $offer;
    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getAdminId() {
        return $this->adminId;
    }

    public function setAdminId($adminId) {
        $this->adminId = $adminId;
    }

    public function getOffer() {
        return $this->offer;
    }

    public function setOffer($offer) {
        $this->offer = $offer;
    }

}