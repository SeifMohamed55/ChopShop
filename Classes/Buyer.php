<?php
include_once "Classes/Notifications.php";
class Buyer extends User{
    private  $followedSellers = array(); //array of users
    private  $productCart = array(); //array of products
    private  $wishlist = array(); // array of products
    private int $noOfWishlist; // no of products in wishlist
    private int $noOfProd;  // no of products in cart
    private int $noFollowedSellers; // no of followed sellers
    function __construct($email, $password, $name, $banState, $phoneNum, $followedCategories, $followedSellers, $productCart, $wishlist ){
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->banState = $banState;
        $this->userType = UserType ::BUYER;
        $this->phoneNum = $phoneNum;
        $this->followedCategories = $followedCategories;
        $this->followedSellers = $followedSellers;
        $this->productCart = $productCart;
        $this->wishlist = $wishlist;
        $this->noOfWishlist = count($this->wishlist);
        $this->noOfCateg = count($this->followedCategories);
        $this->noFollowedSellers = count($this->followedSellers);
        $this->noOfProd = count($this->productCart);

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
    function getFollowedSellers(){
        return $this->followedSellers;
    }
     function getFollowedCategories(){
        return $this->followedCategories;
    }
    function getProductCart(){
        return $this->productCart;
    }
    function getWishlist(){
        return $this->wishlist;
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

    function followCategory($category){
       $this->noOfCateg++;
       $this->followedCategories[$this->noOfCateg - 1] = $category;
    }
    function addToWishlist(Product $prod){
        $this->noOfWishlist++;
        $this->wishlist[$this->noOfWishlist - 1] = $prod;
    }
    function addToCart(Product $prod){
        $this->noOfProd++;
        $this->productCart[$this->noOfProd - 1] = $prod;
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
    function getNotified(){
        //still
    }
    
}