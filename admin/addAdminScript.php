<?php
include_once '../Classes/Buyer.php';
include_once '../Classes/Categories.php';
include_once '../Classes/Database.php';
include_once '../Classes/Feedback.php';
include_once '../Classes/Order.php';
include_once '../Classes/Payment.php';
include_once '../Classes/PayMethod.php';
include_once '../Classes/Product.php';
include_once '../Classes/Seller.php';
include_once '../Classes/Admin.php';
include_once '../Classes/UserType.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
   
      $admin = new Admin($_POST['email'],$_POST['gender'], $_POST['password'], $_POST['fname'],
         $_POST['lname'],0,$_POST['phoneNum'],UserType::ADMIN,$_POST['address']); 

      if (Admin::register($admin) != false){
            $admsg = "Admin added successfully";
            $_SESSION['admin'] = $admin;
         }
         else{
            $admsg = "Something went wrong or email already in use ";
         }
   $_SESSION['admsg'] = $admsg;
   header('Location: http://localhost/admin/addadmin.php');
}
?>