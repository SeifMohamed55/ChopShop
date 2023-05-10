<?php
session_start();
include '../Classes/Admin.php';
include '../Classes/Database.php';
include '../Classes/UserType.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="../css/addadmin.css" />
  <title> Add Admin</title>
</head>

<body background-image: linear-gradient(to bottom, rgba(152, 64, 99), rgba(0, 0, 255, 0.5) ), url(backg.png);>
  <div id="nav">
    <ul>
      <li><a href="reported.php" class="navitem" id="reported">Reported users</a></li>
      <li><a href="bannedusers.php" class="navitem" id="home">Banned users</a></li>
      <li><a href="ban.php" class="navitem">Ban/Unban users</a></li>
      <li><a href="rmvproduct.php" class="navitem">Remove a product</a></li>
      <li><a href="adminprofile.php" class="navitem">Profile</a></li>
      <li><a href="addadmin.php" class="navitem">Add admin</a></li>
      <li style="float: right;"><a href="../index.php" class="navitem">Logout</a></li>

    </ul>
  </div>
  <div class="container">
    <div class="field">
      <div class="text">
        <h1>Add Admin</h1>
        <h3>create administrator account</h3>
      </div> <br>
        <div class="input">
          <form method="post" action="addAdminScript.php">
            <img src="../photos/user.png" alt="Fname" width="20" height="20">
            <input type="text" id="fname" name="fname" placeholder="First Name" required><br><br>

            <img src="../photos/user.png" alt="Lname" width="20" height="20">
            <input type="text" id="lname" name="lname" placeholder="Last Name" required><br><br>

            <img src="../photos/email.png" alt="email" width="20" height="20">
            <input type="email" id="email" name="email" placeholder="Email" required><br><br>

            <img src="../photos/password.png" alt="password" width="20" height="20">
            <input type="password" id="password" name="password" placeholder="password" required><br><br>

            <img src="../photos/phone.png" alt="phone " width="20" height="20">
            <input type="tel" id="phone" name="phoneNum" placeholder="Phone Number" required ><br><br>

            <img src="../photos/addresslogo.png" alt="address" width="20" height="20">
            <input type="text" id="address" name="address" placeholder="address" required><br><br>
            
            <img src="../photos/sex.png" alt="Fname" width="20" height="20">
            <input type="radio" id="Male" name="gender" value="Male" required>
            <label for="html">Male</label>
            <input type="radio" id="css" name="gender" value="Female">
            <label for="css">Female</label>
            <br><br><br>
            <?php
              // Check if a condition is true
              if (!isset($_SESSION['adminBool'])) {
                  // Display an error message
                  $_SESSION['adminBool'] = null;
              }
              elseif($_SESSION['adminBool'] == true){
                echo '<div>'.'<br>'.$_SESSION["regmsg"].'</div>';
                $_SESSION['adminBool'] = null;
              }
              elseif($_SESSION['adminBool'] == false)
              {
                echo '<div>'.$_SESSION["regmsg"].'<br>'.'<br>'.'</div>';
                $_SESSION['adminBool'] = null;
              }
            ?>
            
            <input type="submit" id="btn2" name="Login" value="Add" style="margin-left: 20px; flex-basis: 230%; background-color: burlywood; height: 50px; border: none; padding: 15px 30px; cursor: pointer; border-radius: 50px; text-align: center;">
          </form>
        </div>
        <br><br>
    </div>
  </div>
</body>
</html>