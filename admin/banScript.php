<?php
include_once '../Classes/Admin.php';
include_once '../Classes/Database.php' ;
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    session_start();
    $admin = unserialize($_SESSION['user']);
    if (isset($_POST['ban'])){
       $bool = $admin->banUser_email($_POST['banEmail']);
       if ($bool){
        $banmsg = "User banned successfully";
        $banbool = true;
       }
       else{
        $banmsg = "Invalid email";
        $banbool = false;
       }
        $_SESSION['banbool'] = $banbool;
        $_SESSION['banmsg'] = $banmsg;
    }
    elseif (isset($_POST['unban'])){
        $bool = $admin->unbanUser_email($_POST['banEmail']);
        if ($bool){
        $unbanmsg = "User unbanned successfully";
        $unbanbool = true;
        }
        else{
            $unbanmsg = "Invalid email";
            $unbanbool = false;
           }
        $_SESSION['unbanbool'] = $unbanbool;
        $_SESSION['unbanmsg'] = $unbanmsg;
    }

}
header("Location: http://localhost/admin/ban.php");
?>