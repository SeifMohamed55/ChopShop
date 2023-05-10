<?php
include_once '../Classes/Buyer.php';
session_start();
$user = unserialize($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profileStyleSheet.css">
    <script src="Project.js"></script>
    <title>Profile</title>
    <div id="nav">
        <ul>
            <li><a href="home.html" class="navitem" id="home">Home</a></li>
            <li><a href="Categories.html" class="navitem">Categories</a></li>
            <li><a href="MyCart.html" class="navitem">My cart</a></li>
            <li><a href="MyProfile.php" class="navitem">Profile</a></li>
            <li style="float: right;"><a href="../index.php" class="navitem">Log out</a></li>
        </ul>
    </div>
</head>

<body>
    <p id="prsnlinfo"> Personal Inforamtion :</p>
    <div id="infobox">
        <p id="name" class="profile"> &ensp; &emsp; name: <?php echo $user->getFname() . " " . $user->getLname(); ?> </p>
        <p id="mail" class="profile"> &ensp; &emsp; e-mail: <?php echo $user->getEmail(); ?></p>
        <p id="adrs" class="profile"> &ensp; &emsp; address: <?php echo $user->getAddress(); ?></p>
        <p id="phone" class="profile"> &ensp; &emsp; phone: <?php echo $user->getPhoneNumber(); ?></p>
        <p id="type" class="profile"> &ensp; &emsp; user type: <?php echo "Buyer" ?></p>
    </div>
    <footer>
        <div id="about">
            <ul>
                <li id="Y"><a href="https://www.youtube.com/@GoogleArabia" target="_blank">Youtube</a></li>
                <li id="F"><a href="https://www.facebook.com/Google/" target="_blank">Facebook</a></li>
                <li id="T"><a href="https://twitter.com/Google" target="_blank">Twitter</a></li>
                <li id="I"><a href="https://www.instagram.com/google/" target="_blank">Instagram</a></li>
            </ul>
        </div>
        </div>
    </footer>
</body>
<script src="for_abdo_only.js"></script>

</html>