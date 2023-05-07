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
        $database = new Database();
        $x = $database->execute("Insert into followed_categories values(?,?)", array($this->getID(), $category));
        if ($x){
            $this->noOfCateg++;
            $this->followedCategories[$this->noOfCateg - 1] = $category;
            return true;
        }
        return false;
    }
    function addToWishlist($prod_barcode){
        $database = new Database();
        $x = $database->execute("Insert into user_wishlists values(?,?)", array($this->getID(), $prod_barcode));
        if ($x){
            $this->noOfWishlist++;
            $this->wishlist[$this->noOfWishlist - 1] = $prod_barcode;
            return true;
        }
        return false;
    }
    
   /*  function addToCart($prod){
        $this->noOfProd++;
        $this->productCart[$this->noOfProd - 1] = $prod;
    } */

    
    function getNotified(){
        //still
    }
    
}