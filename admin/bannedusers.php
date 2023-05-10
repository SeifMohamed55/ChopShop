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
    <title>Banned users</title>
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
    <br><br>
    <p style="font-family: 'Times New Roman';
    color: #000000;
    -webkit-text-stroke: black, 5px;
    font-size: larger;
    text-align: left;
    background-color: #ffb7a0;
    padding: 1%;
    border-radius: 10px;">Banned Users :</p>

    <center>
        <table id="reptable">
            <tr>
                <th id="tbname">
                    Name
                </th>

                <th id="tbmail">
                    E-mail
                </th>

            </tr>
<?php
    $admin = unserialize($_SESSION['user']);
    $bannedUsers = $admin->getBannedUsers();
    foreach ($bannedUsers as $ban ) {
        $name = $ban[1] . " " . $ban[2];
        echo '
            <tr>
                <td>
                    <label for="flname">'.$name. '</label>
                </td>

                <td>
                    <label for="e-mail"> '.$ban[0].' </label>
                </td>
            </tr>';
    }
?>
        </table>
    </center>
</body>