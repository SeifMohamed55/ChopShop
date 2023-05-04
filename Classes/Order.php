<<<<<<< HEAD
<?php
/*
    include 'C:\xampp\htdocs\omar\project\Product.php';
    */
 

    class Order{
        private $orderID;
        private $userID;
        private $product = array();
        private $shippingAddress;
        private Payment $payment;
    

    public function __construct($userID, $product, $shippingAddress, $payment){
        $this->userID = $userID;
        $this->product = $product;
        $this->shippingAddress = $shippingAddress;
        $this->payment = $payment; 
    }

    function getOrderId(){
        return $this->orderID;
    }

    function getUserId(){
        return $this->userID;
    }

    function getProduct(){
        return $this->product;
    }

    
    function getShippingAddress(){
        return $this->shippingAddress;
    }

    function getPayment(){
        return $this->payment;
    }
 } 
=======
<?php
/*
    include 'C:\xampp\htdocs\omar\project\Product.php';
    */
 

    class Order{
        private $orderID;
        private $userID;
        private $product = array();
        private $shippingAddress;
        private Payment $payment;
    

    public function __construct($userID, $product, $shippingAddress, $payment){
        $this->userID = $userID;
        $this->product = $product;
        $this->shippingAddress = $shippingAddress;
        $this->payment = $payment; 
    }

    function getOrderId(){
        return $this->orderID;
    }

    function getUserId(){
        return $this->userID;
    }

    function getProduct(){
        return $this->product;
    }

    
    function getShippingAddress(){
        return $this->shippingAddress;
    }

    function getPayment(){
        return $this->payment;
    }
 } 
>>>>>>> d7721e87f755868ac15cf4b17101101ba93f301a
?>