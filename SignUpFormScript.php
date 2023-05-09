<?php
session_start();
include_once 'Classes/Buyer.php';
include_once 'Classes/Categories.php';
include_once 'Classes/Database.php';
include_once 'Classes/Feedback.php';
include_once 'Classes/Order.php';
include_once 'Classes/Payment.php';
include_once 'Classes/PayMethod.php';
include_once 'Classes/Product.php';
include_once 'Classes/Seller.php';
include_once 'Classes/User.php';
include_once 'Classes/UserType.php';

/*
1- check for radio buttons 
2- check $_POST['gender']
*/
$regmsg = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if ($_POST['userType'] == "Seller"){
      $user = new Seller($_POST['email'], $_POST['password'], $_POST['fname'],
       $_POST['lname'],0,UserType::SELLER,$_POST['phoneNum'],$_POST['gender'],$_POST['address'],array(), array()); 
    }
    else if ($_POST['userType'] == "Buyer"){
      $user = new Buyer($_POST['email'],$_POST['gender'],$_POST['password'],
        $_POST['fname'],$_POST['lname'],0,UserType::BUYER,$_POST['phoneNum'], $_POST['address'],array(),array(),array(),array());
    }
   if (User::register($user)){
    $regmsg = "User registered successfully";
   }
   else{
    $regmsg = "Something went wrong or email already in use";
   }
  
  }
  $_SESSION['regmsg'] = $regmsg;
  header('Location: http://localhost/SignUp.php');
  ?>