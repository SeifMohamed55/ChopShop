<?php
include '../Classes/Admin.php';
include '../Classes/Database.php';
include '../Classes/UserType.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adminStyleSheet.css">
    <title>Remove a product</title>
</head>

<body>
    <header>
        <div id="nav">
            <ul>
                <li><a href="reported.php" class="navitem" id="home">Reported users</a></li>
                <li><a href="bannedusers.php" class="navitem" id="home">Banned users</a></li>
                <li><a href="ban.php" class="navitem">Ban/Unban users</a></li>
                <li><a href="rmvproduct.php" class="navitem">Remove a product</a></li>
                <li><a href="adminprofile.php" class="navitem">Profile</a></li>
                <li><a href="addAdmin.php" class="navitem">Add admin</a></li>
                <li style="float: right;"><a href="../index.php" class="navitem">Logout</a></li>
            </ul>
        </div>
    </header>
    <div id="selling">
        <form action="removeProductScript.php" method="post">
            <p>Remove a product:</p>
            <br><br>
            <label for="pid"><img src="../photos/user.png" alt="" width="20px" height="20px"></label>
            <input type="text" required class="text" placeholder="          Product_Barcode" name="pid" style="height: 20px;">
            <br> <br>
            <?php
              // Check if a condition is true
              if (!isset($_SESSION['prodBool'])) {
                  // Display an error message
                  $_SESSION['prodBool'] = null;
              }
              elseif($_SESSION['prodBool'] == true){
                echo '<div>'.'<br>'.$_SESSION['rmprod'].'<br>'.'<br>'.'</div>';
                $_SESSION['prodBool'] = null;
              }
              elseif($_SESSION['prodBool'] == false)
              {
                echo '<div>'.$_SESSION['rmprod'].'<br>'.'<br>'.'</div>';
                $_SESSION['prodBool'] = null;
              }
            ?>
            <input type="submit" class="text" value="Remove" style="width: max-content; padding: 7px; background-color: #984063;" >
        </form>
    </div>
</body>