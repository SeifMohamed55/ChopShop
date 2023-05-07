<?php 
class Product {
    private $barcode;
    private $productName;
    private $addDate;
    private $price;
    private $quantity;
    private $description;
    private $auctionDuration;
    private $sellerID;
    private $categories = array();
    private $no_of_categ = 0;
    private  $feedback = array();

    function __construct($barcode, $productName, $addDate, $price, $quantity, $description, $auctionDuration, $sellerID, $categories, $feedback){
        $this->barcode = $barcode;
        $this->productName = $productName;
        $this->addDate = $addDate;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $description;
        $this->auctionDuration = $auctionDuration;
        $this->sellerID = $sellerID;
        $this->categories = $categories;
        $this->no_of_categ = count($categories);
        $this->feedback = $feedback;
    }
    function getBarcode(): String{
        return $this->barcode;
    }
    function getProductName(): String{
        return $this->productName;
    }
    function getAddDate(){
        return $this->addDate;
    }

    function getPrice(){
        return $this->price;
    }
    function getQuantity(){
        return $this->quantity;
    }
    function getDescription(){
        return $this->description;
    }
    function getCategories(){
        return $this->categories;
    }
    function getAuctionDuration(){
        return $this->auctionDuration;
    }
    function getSellerID(){
        return $this->sellerID;
    }
    function setPrice($price){
        $database = new Database();
        $stmt = $database->execute("UPDATE product set price = ? where barcode = ?", array($price, $this->getBarcode()));   
        $rows_affected = sqlsrv_rows_affected($stmt);
        if ($rows_affected == 0)
                return false;
        $this->price = $price;
        return true; 
        
    }
    function setDescription($description)
    {
        $database = new Database();
        $stmt = $database->execute("UPDATE product set [description] = ? where barcode = ?", array($description, $this->getBarcode()));   
        $rows_affected = sqlsrv_rows_affected($stmt);
        if ($rows_affected == 0)
                return false;
        $this->description = $description;
    }
    function setAuctionDuration($duration){
        $database = new Database();
        $stmt = $database->execute("UPDATE product set [auction_duration] = ? where barcode = ?", array($duration, $this->getBarcode()));   
        $rows_affected = sqlsrv_rows_affected($stmt);
        if ($rows_affected == 0)
                return false;
        $this->auctionDuration = $duration;
        return true;
    }
    function addCategory($category){
        $database = new Database();
        $stmt = $database->execute("INSERT INTO product values(?,?)", array($this->getBarcode(), $category));   
        $rows_affected = sqlsrv_rows_affected($stmt);
        if ($rows_affected == 0)
                return false;
        $this->no_of_categ++;
        $this->categories[$this->no_of_categ - 1] = $category;
        return true;
    }
    static function retrieveProduct($barcode){
       $database = new Database();
       $stmt = $database->execute("SELECT category from prod_category where barcode = ?", array($barcode));
       $i = 0;
       while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $categories[$i] = $row['category'];
            $i++;
        }
        $stmt = $database->execute("SELECT * from feedback where prod_barcode = ?", array($barcode));
        $i = 0;
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $feedback[$i] = new Feedback($row['user_ID'], $row['prod_barcode'], $row['feedback_rating'], $row['description']);
            $i++;
        }

       $stmt = $database->execute("SELECT * from product where barcode = ?", array($barcode)); 
       $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
       $prod = new Product($barcode, $row['prod_name'], $row['prod_name'],$row['price'],$row['quantity'],$row['description'], $row['auction_duration'],$row['seller_ID'],$categories, $feedback);
       return $prod;
    }

}