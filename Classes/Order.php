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
        protected Database $database = new Database();
    

    public function __construct($userID, $product, $shippingAddress, $payment){
        $this->userID = $userID;
        $this->product = $product;
        $this->shippingAddress = $shippingAddress;
        $this->payment = $payment; 
    }

    function getOrderId(){
        $sql = "SELECT order_ID FROM order";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['order_ID'];
}

sqlsrv_free_stmt($stmt);



        return $this->orderID;
    }

    function getUserId(){
        $sql = "SELECT user_ID FROM order";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['user_ID'];
}

sqlsrv_free_stmt($stmt);


        return $this->userID;
    }

    function getProduct(){
        $sql = "SELECT product)barcode FROM order_items";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['order_barcode'];
}

sqlsrv_free_stmt($stmt);


        return $this->product;
    }

    
    function getShippingAddress(){
        $sql = "SELECT shipping_address FROM order";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['shipping_address'];
}

sqlsrv_free_stmt($stmt);



        return $this->shippingAddress;
    }

    function getPayment(){
        return $this->payment;
    }
 } 
?>