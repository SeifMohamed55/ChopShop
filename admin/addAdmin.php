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

$admsg = "";
$_SESSION['admsg'] = $admsg;
if ($_SERVER['REQUEST_METHOD'] == "post"){
    if ($_SESSION['user']->getUserType()==UserType::ADMIN){
      $user = new Admin($_POST['email'],$_POST['gender'], $_POST['password'], $_POST['fname'],
       $_POST['lname'],0,$_POST['phoneNum'],UserType::ADMIN,$_POST['address'],array(), array()); 
    }
    }
   if (User::register($user)){
    $admsg = "User registered successfully";
   }
   $admsg = "Something went wrong or admin is already available";

   header('localhost/addadmin.html');
  
?>