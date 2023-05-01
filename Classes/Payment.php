<?php

    //include 'C:\xampp\htdocs\omar\project\PaymentMethod.php';


    class Payment{
        private $payID;
        private $userID;
        private $orderID;
        private $payMethod;
        private $payStatus;
        private $payAmount;
        private $payDate ;

    public function __construct($payID, $userID, $orderID, $payMethod, $payStatus, $payAmount){
        $this->payID = $payID;
        $this->userID = $userID;
        $this->orderID = $orderID;
        $this->payMethod = $payMethod;
        $this->payStatus = $payStatus;
        $this->payAmount = $payAmount;
        $this->payDate = date("y-m-d");
    }
    
    function getPayId(){
        return $this->payID;
    }

    function getUserId(){
        return $this->userID;
    }

    function getOrderId(){
        return $this->orderID;
    }

    function getPayMethod(){
        return $this->payMethod;
    }

    function getPayStatus(){
        return $this->payStatus;
    }

    function getPayAmount(){
        return $this->payAmount;
    }

    function getPayDate(){
        return $this->payDate;
    }

    }
?>
