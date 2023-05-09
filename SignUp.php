<?php session_start(); ?>
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
      <form action="SignUpFormScript.php" method="post">
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
          <?php
              // Check if a condition is true
              if (!isset($_SESSION['signUpBool'])) {
                  // Display an error message
                  $_SESSION['signUpBool'] = null;
              }
              elseif($_SESSION['signUpBool'] == true){
                echo '<div>'.'<br>'.$_SESSION["admsg"].'</div>';
                $_SESSION['signUpBool'] = null;
              }
              elseif($_SESSION['signUpBool'] == false)
              {
                echo '<div>'.$_SESSION["admsg"].'<br>'.'<br>'.'</div>';
                $_SESSION['signUpBool'] = null;
              }
            ?>
          <input type="submit" class="submit" name="Login" value="Sign UP">
      </form>
      <form action="index.php"><input type="submit" class="submit2" value="Log in"></form>
    </div>
  </div>
  </div>
  </div>
</body>
<script src="for_abdo_only.js"></script>
</html>


