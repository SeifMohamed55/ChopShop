<?php

include_once '../Classes/Seller.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sellproduct.css">
    <script src="Project.js"></script>
    <title>Remove products</title>
    <div id="nav">
        <ul>
            <li><a href="sellproduct.php" class="navitem" id="Sell">Sell product</a></li>
            <li><a href="removeproduct.php" class="navitem">Remove a product</a></li>
            <li><a href="sellerProfile.php" class="navitem">Profile</a></li>
            <li style="float: right;"><a href="../index.php" class="navitem">Log out</a></li>
        </ul>
    </div>
</head>

<body>
    <footer>
        <div id="selling">
            <form action="removeProductScript.php" method="post">
                <br>
                <label for="pid"><img src="../photos/user.png" alt="" width="20px" height="20px"></label>
                <input type="text" required class="text" placeholder="              Product_id" name="pbarcode" style="height: 20px; " >
                <br> <br>
            <?php
              // Check if a condition is true
              if (isset($_SESSION['delprodbool'])) {
                echo '<div>'.'<br>'.$_SESSION["delprodmsg"].'</div>';
                $_SESSION['delprodmsg'] = null;
                $_SESSION['delprodbool'] = null;
              }
            ?>
            <br> <br>
                <input type="submit" class="text" value="Remove" style="width: max-content; padding: 7px;">
            </form>
        </div>
    </footer>
</body>