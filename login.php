<?php
include_once 'Classes/Buyer.php';
include_once 'Classes/Categories.php';
include_once 'Classes/Database.php';
include_once 'Classes/Feedback.php';
include_once 'Classes/Order.php';
include_once 'Classes/Payment.php';
include_once 'Classes/PayMethod.php';
include_once 'Classes/Product.php';
include_once 'Classes/Seller.php';
include_once 'Classes/User.php';
include_once 'Classes/UserType.php';
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['email']) && isset($_POST['password']))
    {
        session_start();
        $user = User::login($_POST['email'], $_POST['password']);
        if ($user == false){
            $logmsg = "Email or password is wrong";
            $_SESSION['logmsg'] = $logmsg;
            $_SESSION['bool'] = false;
            exit(header("Location: http://localhost/index.php"));  
        }
        
        else if ($user->getUserType() == UserType::ADMIN){
            $_SESSION['user'] = serialize($user);
            exit(header("Location: http://localhost/admin/adminprofile.php"));
        }
        else if ($user->getUserType() == UserType::SELLER){
            $_SESSION['user'] = serialize($user);
            exit(header("Location: http://localhost/seller/sellproduct.php"));
        }
        else if ($user->getUserType() == UserType::BUYER){
            $_SESSION['user'] = serialize($user);
            exit(header("Location: http://localhost/buyer/home.html"));
        }
        
        
    }
    
}

?>