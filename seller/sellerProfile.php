<?php
include_once '../Classes/Seller.php';
session_start();
$user = unserialize($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
    #prsnlinfo {
        font-family: "Arial", sans-serif;
        color: #FE9677;
        font-size: 24px;
        text-align: center;
        margin-top: 50px;
    }

    #infobox {
  width: 500px;
  height: 300px;
  border: 2px solid #000000;
  border-radius: 10px;
  padding: 20px;
  margin-top: 20px;
  background-color: #FFFFFF;
}

    .profile {
        font-family: "Arial", sans-serif;
        color: #000;
        font-size: 16px;
        margin: 10px 0;
    }

    #name::before {
        content: "\f007";
        font-family: "FontAwesome";
        color: #FE9677;
        margin-right: 10px;
    }

    #mail::before {
        content: "\f0e0";
        font-family: "FontAwesome";
        color: #FE9677;
        margin-right: 10px;
    }

    #adrs::before {
        content: "\f041";
        font-family: "FontAwesome";
        color: #FE9677;
        margin-right: 10px;
    }

    #phone::before {
        content: "\f095";
        font-family: "FontAwesome";
        color: #FE9677;
        margin-right: 10px;
    }

    #type::before {
        content: "\f007";
        font-family: "FontAwesome";
        color: #FE9677;
        margin-right: 10px;
    }
</style>
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
    <center>
    <p id="prsnlinfo" style="color: white;"> Personal Inforamtion :</p>
    <div id="infobox">
        <p id="name" class="profile"> &ensp; &emsp; name: <?php echo $user->getFname() . " " . $user->getLname(); ?> </p>
        <p id="mail" class="profile"> &ensp; &emsp; e-mail: <?php echo $user->getEmail(); ?></p>
        <p id="adrs" class="profile"> &ensp; &emsp; address: <?php echo $user->getAddress(); ?></p>
        <p id="phone" class="profile"> &ensp; &emsp; phone: <?php echo $user->getPhoneNumber(); ?></p>
        <p id="type" class="profile"> &ensp; &emsp; user type: <?php echo "Buyer" ?></p>
    </div>
    </center>
</body>

<script src="for_abdo_only.js"></script>

</html>