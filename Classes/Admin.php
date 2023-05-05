<?php
class Admin extends User{

    private $bannedUsers = array();
    private $reportedUsers = array();

    function __construct($ID, $email, $gender, $password, $fname, $lname, $banState, $phoneNum, $userType, $bannedUsers, $reportedUsers){
        $this->ID = $ID;
        $this->email = $email;
        $this->password = $password;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->banState = $banState;
        $this->gender = $gender;
        $this->userType =$userType;
        $this->phoneNum = $phoneNum;
        $this->bannedUsers = $bannedUsers;
        $this->reportedUsers = $reportedUsers;
    }
  
    function getNoOfCateg(){
        return $this->noOfCateg;
    }
    function getFollowedCategories(){
        return $this->followedCategories;
    }

    function followCategory($category){
        $this->noOfCateg++;
        $this->followedCategories[$this->noOfCateg - 1] = $category;
    }
    function getBannedUsers(){
        //database

        return $this->bannedUsers;
    }
    function getReportedUsers(){
        //database

        return $this->reportedUsers;
    }
    function banUser_user(User $user){
        //database
    }
    function banUser_email(String $email){
        //database
    }
    function unbanUser_email (String $email){
        //database
    }
    function reportUser_user($user){

    }
    function reportUser_email($email){

    }
    function getNotified(){

    }
    function deleteProduct_barcode(String $barcode){
        //database
    }
    function deleteProduct_prod(Product $product){
        //database
    }
    function addAdmin_email(String $email){
            //database
    }
    function addAdmin_user(User $user){
        //database
    }
    function deleteAdmin(String $email){
        //database
    }
}