<?php
session_start();
include '../Classes/Admin.php';
include '../Classes/Database.php';
include '../Classes/UserType.php';
$serialized = $_SESSION['user'];
$user = unserialize($serialized);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profileStyleSheet.css">
    <script src="Project.js"></script>
    <title>profile</title>
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
</head>

<body>
    <p id="prsnlinfo">Admin Personal Inforamtion :</p>
    <div id="infobox">
        <p id="name" class="profile"> &ensp; &emsp; name: <?php echo $user->getFname().' ' . $user->getLname(); ?></p>
        <p id="mail" class="profile"> &ensp; &emsp; e-mail: <?php echo $user->getEmail(); ?> </p>
        <p id="adrs" class="profile"> &ensp; &emsp; address: <?php echo $user->getAddress(); ?> </p>
        <p id="phone" class="profile"> &ensp; &emsp; phone: <?php echo $user->getPhoneNumber(); ?></p>

    </p>
        <p id="type" class="profile"> &ensp; &emsp; user type: 
        <?php 
            if($user->getUserType() == UserType::SELLER){
                echo 'Seller';
            }
            if($user->getUserType() == UserType::ADMIN){
                echo 'Admin';
            }
            if($user->getUserType() == UserType::BUYER){
                echo 'Buyer';
            }
        ?> 
    </p>
    </div>
</body>

</html>