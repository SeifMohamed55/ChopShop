<?php
include_once "../Classes/Seller.php";
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
    <title>Sell a product</title>
    <div id="nav">
        <ul>
            <li><a href="sellproduct.php" class="navitem" id="Sell">Sell product</a></li>
            <li><a href="removeproduct.php" class="navitem">Remove a product</a></li>
            <li><a href="sellerProfile.php" class="navitem">Profile</a></li>
            <li style="float: right;"><a href="../index.php" class="navitem">Log out</a></li>
        </ul>
    </div>
    <div id="selling">
        <form action="sellProductScript.php" method="post">
            <label for="pname"><img src="../photos/icons8-product-24.png" alt="" width="20px" height="20px" style="margin-top: 2px;"></label>
            <input type="text" required class="text" placeholder="         Product_name" name="pname">
            <br> <br>
            <label for="pprice"><img src="../photos/cashlogo.png" alt="" width="20px" height="20px"></label>
            <input type="number" required class="text" placeholder="         Product_price" name="price" step="0.01">
            <br> <br>
            <label for="pquantity"><img src="../photos/icons8-how-many-quest-50.png" alt="" width="20px" height="20px"></label>
            <input type="number" required class="text" placeholder="         Product_quantity" name="quantity">
            <br> <br>
            <label for="pid"><img src="../photos/user.png" alt="" width="20px" height="20px"></label>
            <input type="text" required class="text" placeholder="              Product_id" name="barcode">
            <br> <br>
            <label for="dateInput"><img src="../photos/icons8-how-many-quest-50.png" alt="" width="20px" height="20px"></label>
            <input type="date" id="dateInput" name="date">
            <br> <br>
            <label for="tarea"><img src="../photos/icons8-description-64.png" alt="" width="30px" height="30px"></label>
            <textarea name="description" class="text" width: 152px;
            height: 34px; placeholder="write a description right here .." required></textarea>
            <br> <br>

            <?php
              // Check if a condition is true
              if (isset($_SESSION['prodbool'])) {
                echo '<div>'.'<br>'.$_SESSION["prodmsg"].'</div>';
                $_SESSION['prodmsg'] = null;
                $_SESSION['prodbool'] = null;
              }
            ?>

            <br><br>
            <input type="submit" class="text" value="Add" style="width: max-content; padding: 7px;">
        </form>
    </div>
</head>