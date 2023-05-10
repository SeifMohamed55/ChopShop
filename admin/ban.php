<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adminStyleSheet.css">
    <title>Ban/Unban users</title>
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
        <form action="banScript.php" method="post">
            <p>Ban/Unban user:</p><br>
            <label for="pname" ><img src="../photos/user.png" alt="" width="20px" height="20px" style="margin-top: 2px;"></label>
            <input type="text" required class="text" placeholder="            User e-mail" name="banEmail" style="height: 20px;">
            <br> <br>
            <input type="submit" class="text" name="ban"  value="Ban user" style="width: max-content; padding: 7px; margin: 5px; background-color: #984063; ">
            <input type="submit" class="text" name="unban" value="Unban user" style="width: max-content; padding: 7px; margin: 5px; background-color: #984063; ">
        </form>
        <?php
              // Check if a condition is true
              if (isset($_SESSION['banbool'])) {
                  echo '<div>'.'<br>'.$_SESSION["banmsg"].'</div>';
                  $_SESSION['banbool'] = null;
                  $_SESSION["banmsg"] = null;
              }
              elseif(isset($_SESSION['unbanbool'])){
                echo '<div>'.'<br>'.$_SESSION["unbanmsg"].'</div>';
                $_SESSION['unbanbool'] = null;
                $_SESSION["unbanmsg"] = null;
              }
            ?>
    </div>
</body>