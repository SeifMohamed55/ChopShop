<?php 
    class feedback{
        private $feedbackID;
        private $userID;
        private $productBarcode;
        private $feedbackRating;
        private $feedbackDescription;


        public function __construct($userID, $productBarcode, $feedbackRating, $feedbackDescription){
            $this->userID = $userID;
            $this->productBarcode = $productBarcode;
            $this->feedbackRating = $feedbackRating;
            $this->feedbackDescription = $feedbackDescription;
     }

        function getFeedbackId(){
            $sql = "SELECT feedback_ID FROM fedback";
            $stmt = sqlsrv_query( $conn, $sql );
             if( $stmt === false) {
                 die( print_r( sqlsrv_errors(), true) );
}

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['feedback_ID'];
}

    sqlsrv_free_stmt($stmt);



            return $this->feedbackID;
        }
        
        function getUserId(){
            $sql = "SELECT ID FROM user";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['ID'];
}

sqlsrv_free_stmt($stmt);



            return $this->userID;
        }

        function getProductBarcode(){
            $sql = "SELECT barcode FROM product";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['barcode'];
}

sqlsrv_free_stmt($stmt);



            return $this->productBarcode;
        }

        function getFeedbackRating(){
            $sql = "SELECT feedback_rating FROM feedback";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['feedback'];
}

sqlsrv_free_stmt($stmt);



            return $this->feedbackRating;
        }
    }
?>