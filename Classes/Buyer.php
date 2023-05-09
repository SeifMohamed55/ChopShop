<?php
include_once 'Buyer.php';
include_once 'Admin.php';
include_once 'Seller.php';
class Buyer extends User{
    private  $followedSellers = array(); //array of users
    private  $productCart = array(); //array of products
    private  $wishlist = array(); // array of products
    private int $noOfWishlist; // no of products in wishlist
    private int $noOfProd;  // no of products in cart
    private int $noFollowedSellers; // no of followed sellers
    function __construct($email, $gender, $password, $fname, $lname, $banState, $userType, $phoneNum, $address){
        $this->email = $email;
        $this->password = substr(password_hash($password, PASSWORD_DEFAULT), 0, 70);
        $this->fname = $fname;
        $this->lname = $lname;
        $this->banState = $banState;
        $this->userType = $userType;
        $this->phoneNum = $phoneNum;
        $this->noOfProd = count($this->productCart);
        $this->gender = $gender;  
        $this->address = $address;
    }
    
    function getWishlist(){
        $ID = User::getIDFromEmail($this->email);
        $database = new Database();
        $stmt = $database->execute("select [user_ID], prod_barcode from user_wishlists
                    where [user_ID] = ?", array($ID));
                    $j = 0;
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                        $this->wishlist[$j] = $row['prod_barcode'];
                        $j++;
                    }
                    $this->noOfWishlist = count($this->wishlist);
        return $this->wishlist;
    }
    function getID(){
        return ($this->ID = User::getIDFromEmail($this->email));    
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
    function getFollowedSellers(){
        $ID = User::getIDFromEmail($this->email);
        $database = new Database();
        $stmt = $database->execute("select seller_id, [user_id], email
                    from [user] join followed_sellers on [user].ID = [seller_id]
                    where [user_id] = ?", array($ID));
                    $j = 0;
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                        $this->followedSellers[$j] = $row['email'];
                        $j++;
                    }
                    $this->noFollowedSellers = count($this->followedSellers);
                    return $this->followedSellers;
    }
    
   /*  function addToCart($prod){
        $this->noOfProd++;
        $this->productCart[$this->noOfProd - 1] = $prod;
    } */

    
    function getNotified(){
        //still
    }
    
}