<?php
include_once '../Classes/Buyer.php';
include_once '../Classes/Categories.php';
include_once '../Classes/Database.php';
include_once '../Classes/Feedback.php';
include_once '../Classes/Order.php';
include_once '../Classes/Payment.php';
include_once '../Classes/PayMethod.php';
include_once '../Classes/Product.php';
include_once '../Classes/Seller.php';
include_once '../Classes/User.php';
include_once '../Classes/UserType.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['pid']))
    {
        session_start();
        $database = new Database();
        $stmt = $database->execute("DELETE FROM product where barcode = ?",array($_POST['pid']));
        $rows_affected = sqlsrv_rows_affected($stmt);
        if ($rows_affected == 0){
            $rmprod = "NO such Barcode available !";
            $_SESSION['prodBool'] = false;
            $_SESSION['rmprod'] = $rmprod;
        }
        else{
            $rmprod = "Product deleted successfully";
            $_SESSION['prodBool'] = true;
            $_SESSION['rmprod'] = $rmprod;
        }
            
    }
}
header("Location: http://localhost/admin/rmvproduct.php");