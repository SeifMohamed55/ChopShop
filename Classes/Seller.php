<?php
class Seller extends User{
    private $onSaleProduct = array();
    private $noOfProd = 0;
    protected Database $database = new Database();

    function __construct($ID, $email, $password, $fname, $lname, $banState, $userType, $phoneNum, $gender, $followedCategories, $onSaleProduct){
        $this->ID = $ID;
        $this->email = $email;
        $this->password = substr(password_hash($password, PASSWORD_DEFAULT), 0, 70);
        $this->fname = $fname;
        $this->lname = $lname;
        $this->banState = $banState;
        $this->gender = $gender;
        $this->userType = $userType;
        $this->phoneNum = $phoneNum;
        $this->followedCategories = $followedCategories;
        $this->noOfCateg = count($followedCategories);
        $this->onSaleProduct = $onSaleProduct;
        $this->onSaleProduct = count($onSaleProduct);
    }
    
    
    function followCategory($category){
        $this->noOfCateg++;
        $this->followedCategories[$this->noOfCateg - 1] = $category;
    }
     function getNotified(){
        //still
    }
    function addProduct(Product $product){
        $sql = "INSERT INTO product (barcode, prod_name, add_date, price, quantity, descripion, auction_duration, seller_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$params = array($product);

$stmt = sqlsrv_query( $conn, $sql, $params);
        $this->noOfProd++;
        $this->onSaleProduct[$this->noOfProd - 1] = $product;
    }
    function deleteProduct_prod(Product $product ){
        $x = $this->database->execute("delete from [product] where barcode = ?", array($product));
    }
    function deleteProduct_barcode($barcode){
        $x = $this->database->execute("update [product] delete barcode = ?", array($barcode));
    }
    function scanBarcode($barcode){

    }
}