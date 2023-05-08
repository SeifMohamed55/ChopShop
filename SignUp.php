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
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/SignUP.css" />
  <title> Sign up </title>
</head>
<body background-image: linear-gradient(to bottom, rgba(152, 64, 99), rgba(0, 0, 255, 0.5) ), url(backg.png);>
  <div id="nav">
    <ul>
      <li><a href="virtualhome.html" class="navitem" id="home">Home</a></li>
      <li><a href="virtualcategories.html" class="navitem">Categories</a></li>
    </ul>
  </div>
  <div class="container">
    <div class="field">
      <div class="text">
        <h1>Sign UP</h1>
        <h3>Create an Account Now !</h3>
      </div> <br>
      <form action="" method="post" onsubmit="return alert('<?php  echo $_SESSION['regmsg']; ?>')">
        <div class="input">
          <img src="photos/user.png" alt="Fname" width="20" height="20">
          <input type="text" id="fname" name="fname" placeholder="First Name" required><br><br>

          <img src="photos/user.png" alt="Lname" width="20" height="20">
          <input type="text" id="lname" name="lname" placeholder="Last Name" required><br><br>

          <img src="photos/email.png" alt="email" width="20" height="20">
          <input type="email" id="email" name="email" placeholder="Email" required><br><br>

          <img src="photos/password.png" alt="password" width="20" height="20">
          <input type="password" id="password" name="password" placeholder="password" required><br><br>

          <img src="photos/phone.png" alt="phone " width="20" height="20">
          <input type="tel" id="phone" name="phoneNum" placeholder="Phone Number" required pattern="[0-9]{11}"><br><br>

          <img src="photos/addresslogo.png" alt="address" width="20" height="20">
          <input type="text" id="address" name="address" placeholder="address" required><br><br>

          <img src="photos/sex.png" alt="gender" width="20" height="20">
          <input type="radio" id="Male" name="gender" value="Male" required>
          <label for="html">Male</label>
          <input type="radio" id="css" name="gender" value="Female" required>
          <label for="css">Female</label>
          <br><br>
          <img src="photos/cashlogo.png" alt="User" width="20" height="20">
          <input type="radio" id="buyer" name="userType" value="Buyer" required>
          <label for="html">Buyer</label>
          <input type="radio" id="seller" name="userType" value="Seller" required>
          <label for="css">Seller</label><br>
          <br>
          <input type="submit" class="submit" name="Login" value="Sign UP">
      </form>
      <form action="index.html"><input type="submit" class="submit2" value="Log in"></form>
    </div>
  </div>
  </div>
  </div>
</body>
<script src="for_abdo_only.js"></script>
</html>


