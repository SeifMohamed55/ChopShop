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
        protected Database $database = new Database();

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
        $sql = "SELECT pay_ID FROM payment";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['pay_ID'];
}

sqlsrv_free_stmt($stmt);



        return $this->payID;
    }

    function getUserId(){
        $sql = "SELECT uder_ID FROM payment";
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

    function getOrderId(){
        $sql = "SELECT order_ID FROM payment";
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

    function getPayMethod(){
        $sql = "SELECT pay_method FROM payment";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['pay_method'];
}

sqlsrv_free_stmt($stmt);


        return $this->payMethod;
    }

    function getPayStatus(){
        $sql = "SELECT pay_status FROM payment";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['pay_status'];
}

sqlsrv_free_stmt($stmt);



        return $this->payStatus;
    }

    function getPayAmount(){
        $sql = "SELECT pay_amount FROM payment";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['pay_amount'];
}

sqlsrv_free_stmt($stmt);


        return $this->payAmount;
    }

    function getPayDate(){
        $sql = "SELECT pay_date FROM payment";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['pay_date'];
}

sqlsrv_free_stmt($stmt);


        return $this->payDate;
    }

    }
?>