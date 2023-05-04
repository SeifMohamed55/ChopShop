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
            return $this->feedbackID;
        }
        
        function getUserId(){
            return $this->userID;
        }

        function getProductBarcode(){
            return $this->productBarcode;
        }

        function getFeedbackRating(){
            return $this->feedbackRating;
        }
    }
?>