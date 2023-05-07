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
    $this->price = $price;
}
function setDescription($description)
{
    $this->description = $description;
}
function setAuctionDuration($duration){
    $this->auctionDuration = $duration;
}
function addCategory(Categories $category){
    $this->no_of_categ++;
    $this->categories[$this->no_of_categ - 1] = $category;
}

}