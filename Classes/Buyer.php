<?php
//modify getters and setters with database
include_once "Classes/Notifications.php";
class Buyer extends User{
    private  $followedSellers = array(); //array of users
    private  $productCart = array(); //array of products
    private  $wishlist = array(); // array of products
    private int $noOfWishlist; // no of products in wishlist
    private int $noOfProd;  // no of products in cart
    private int $noFollowedSellers; // no of followed sellers
    function __construct($ID, $email, $gender, $password, $fname, $lname, $banState, $userType, $phoneNum, $followedCategories, $followedSellers, $productCart, $wishlist ){
        $this->ID = $ID;
        $this->email = $email;
        $this->password = substr(password_hash($password, PASSWORD_DEFAULT), 0, 70);
        $this->fname = $fname;
        $this->lname = $lname;
        $this->banState = $banState;
        $this->userType = $userType;
        $this->phoneNum = $phoneNum;
        $this->followedCategories = $followedCategories;
        $this->followedSellers = $followedSellers;
        $this->productCart = $productCart;
        $this->wishlist = $wishlist;
        $this->noOfWishlist = count($this->wishlist);
        $this->noOfCateg = count($this->followedCategories);
        $this->noFollowedSellers = count($this->followedSellers);
        $this->noOfProd = count($this->productCart);
        $this->gender = $gender;  
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

    
    function getNotified(){
        //still
    }
    
}