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
protected Database $database = new Database();

function __construct($barcode, $productName, $addDate, $price, $quantity, $description, $auctionDuration, $sellerID, $categories){
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
}
function getBarcode(): String{
    $sql = "SELECT barcode FROM product";
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
    
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          echo $row['barcode'];
    }
    
    sqlsrv_free_stmt($stmt);


    return $this->barcode;
}
function getProductName(): String{
    $sql = "SELECT prod_name FROM product";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['prod_name'];
}

sqlsrv_free_stmt($stmt);


    return $this->productName;
}
function getAddDate(){
    $sql = "SELECT add_date FROM product";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['add_date'];
}

sqlsrv_free_stmt($stmt);


    return $this->addDate;
}

function getPrice(){
    $sql = "SELECT price FROM product";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['price'];
}

sqlsrv_free_stmt($stmt);


    return $this->price;
}
function getQuantity(){
    $sql = "SELECT quantity FROM product";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['quantity'];
}

sqlsrv_free_stmt($stmt);


    return $this->quantity;
}
function getDescription(){
    $sql = "SELECT description FROM product";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['description'];
}

sqlsrv_free_stmt($stmt);


    return $this->description;
}
function getCategories(){
    return $this->categories;
}
function getAuctionDuration(){
    $sql = "SELECT auction_duration FROM product";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['auction_duration'];
}

sqlsrv_free_stmt($stmt);


    return $this->auctionDuration;
}
function getSellerID(){
    $sql = "SELECT seller_ID FROM product";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['seller_ID'] . ", " . $row['FirstName'];
}

sqlsrv_free_stmt($stmt);


    return $this->sellerID;
}
function setPrice($price){
    $x = $this->database->execute("update [product] set price = ?",array($price));
        if ($x){
            $this->price = $price;
            return true;
        }
        return false;
}
function setDescription($description){
    $x = $this->database->execute("update [product] set description = ?",array($description));
        if ($x){
            $this->description = $description;
            return true;
        }
        return false;
}
function setAuctionDuration($duration){
    $x = $this->database->execute("update [product] set auctionDuration = ?",array($duration));
        if ($x){
            $this->auctionDuration = $duration;
            return true;
        }
        return false;
}
function addCategory(Categories $category){
    $sql = "INSERT INTO prod_category (category) VALUES (?)";
$params = array($category);

$stmt = sqlsrv_query( $conn, $sql, $params);
    $this->no_of_categ++;
    $this->categories[$this->no_of_categ - 1] = $category;
}

}