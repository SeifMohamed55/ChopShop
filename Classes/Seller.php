<?php
class Seller extends User{
    private $onSaleProduct = array();
    private $noOfProd = 0;

    function __construct($email, $password, $name, $banState, $phoneNum, $followedCategories, $onSaleProduct){
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->banState = $banState;
        $this->userType = UserType ::SELLER;
        $this->phoneNum = $phoneNum;
        $this->followedCategories = $followedCategories;
        $this->noOfCateg = count($followedCategories);
        $this->onSaleProduct = $onSaleProduct;
        $this->onSaleProduct = count($onSaleProduct);
    }
    function getID(){
        return $this->ID;
    }
    function getEmail(): String{
        return $this->email;
    }
    function getName(): String{
        return $this->name;
    }
    function getBanState(): int{
        return $this->banState;
    }
    function getUserType(){
        return $this->userType;
    }
    function getPassword(): String{
        return $this->password;
    }
    function getPhoneNumber(): String{
        return $this->phoneNum;
    }
    function getNoOfCateg(){
        return $this->noOfCateg;
    }
    function getFollowedCategories(){
        return $this->followedCategories;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setName($name){
        $this->name = $name;
    }
    function setPhoneNumber($phoneNum){
        $this->phoneNum = $phoneNum;
    }
    function setPassword($oldPassword,$newPassword){
        if($oldPassword == $this->getPassword()){
            $this->password = $newPassword;
            return true;
        }
        return false;
    }
    function reportUser_user($user){
        //database
    }
    function reportUser_email($email){
        //database
    }
    function login($email, $password): bool{
        //database
    }
    function followCategory($category){
        $this->noOfCateg++;
        $this->followedCategories[$this->noOfCateg - 1] = $category;
    }
     function getNotified(){
        //still
    }
    function addProduct(Product $product){
        //database
        $this->noOfProd++;
        $this->onSaleProduct[$this->noOfProd - 1] = $product;
    }
    function deleteProduct_prod(Product $product ){
        //database
    }
    function deleteProduct_barcode($barcode){

    }
    function scanBarcode($barcode){

    }
}