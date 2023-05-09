<?php
class Seller extends User{
    private $onSaleProduct = array();
    private $noOfProd = 0;

    function __construct($email, $password, $fname, $lname, $banState, $userType, $phoneNum, $gender, $address){
        $this->email = $email;
        $this->password = substr(password_hash($password, PASSWORD_DEFAULT), 0, 70);
        $this->fname = $fname;
        $this->lname = $lname;
        $this->banState = $banState;
        $this->gender = $gender;
        $this->userType = $userType;
        $this->phoneNum = $phoneNum;
        $this->address = $address;

    }
    function getOnSaleProduct(){
        $database = new Database();
        $ID = User::getIDFromEmail($this->email);
        $stmt = $database->execute("select seller_ID, barcode
                from product where seller_ID = ?",array($ID));
        $j = 0;
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                $this->onSaleProduct[$j] = $row['barcode'];
                    $j++;
                }
            $this->noOfProd = count($this->onSaleProduct);
        return $this->onSaleProduct;
    }
    function getID(){
        return ($this->ID = User::getIDFromEmail($this->email));
    }
    function addProduct(Product $prod){
        $database = new Database();
        $x = $database->execute("Insert into product values(?,?,?,?,?,?,?,?)",
         array($prod->getBarcode(), $prod->getProductName(),$prod->getAddDate(),$prod->getPrice(),
         $prod->getQuantity(),$prod->getDescription(),$prod->getAuctionDuration(),$prod->getSellerID()));
        if ($x){
            $this->noOfProd++;
            $this->onSaleProduct[$this->noOfProd - 1] = $prod->getBarcode();
            return true;
        }
        return false;
    }
    function deleteProduct_barcode($barcode){
        $database = new Database();
        $stmt = $database->execute("select seller_ID from product where barcode = ?",array($barcode));
        sqlsrv_fetch( $stmt );
        $seller_ID = sqlsrv_get_field( $stmt, 0);
        if ($seller_ID != $this->getID())
            return false;
        $stmt = $database->execute("delete from product where barcode = ?",array($barcode));
        $rows_affected = sqlsrv_rows_affected($stmt);
        if ($rows_affected == 0)
            return false;
        return true;
    }
    function scanBarcode($barcode){
        
    }
    function getNotified(){
        //still
    }
}