<?php 
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
include_once 'Classes/Admin.php';
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/Signin.css" />
  <title> Sign in </title>
</head>

<body>
  <div id="nav">
    <ul>
      <li><a href="virtualhome.html" class="navitem" id="home">Home</a></li>
      <li><a href="virtualcategories.html" class="navitem">Categories</a></li>
    </ul>
  </div>
  <div class="container">

    <div class="field">
      <div class="text">
        <h1>Sign in</h1><br><br>
        <h3>Use your Account</h3>
      </div>
      <form action="login.php" method="post">
        <div class="input">
          <img src="photos/email.png" alt="email" width="20" height="20" id="logo"><input type="email" id="email"
            name="email" placeholder="Email" required>
          <br><br>
          <img src="photos/password.png" alt="email" width="20" height="20" id="logo"><input type="password"
            id="password" name="password" placeholder="password" required>
            <?php
              // Check if a condition is true
              if (isset($_SESSION['bool'])) {
                  // Display an error message
                  echo '<div><br><br>Error: Wrong Email or password!</div>';
                  $_SESSION['bool'] = null;
              }
            ?>
        </div>
        <input type="submit" class="submit" name="Login" value="Log in">
      </form>
      <center>
        <form action="SignUp.php"><input type="submit" class="submit2" value="Sign UP"></form>       
      </center>
    </div>
  </div>
</body>
</html>