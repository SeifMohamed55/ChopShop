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
$user = $_SESSION['user'];



    if ($_SESSION['user']->getUserType()==UserType::ADMIN){
     $banned_user = $user->getBannedUsers(); 
    }
   $_SESSION['banned_user'] = $banned_user;
   header('localhost/banned.html');

?>