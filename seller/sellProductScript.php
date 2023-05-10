<?php
include_once "../Classes/Seller.php";
include_once "../Classes/Product.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $seller = unserialize($_SESSION['user']);
    if (isset($_POST['description'])&& isset($_POST['barcode'])){
        
        $prod = new Product($_POST['barcode'], $_POST['pname'], date("Y-m-d"), 
        $_POST['price'], $_POST['quantity'], $_POST['description'], $_POST['date'], $seller->getID(), array(), array());
         if ($seller->addProduct($prod)){
            $prodmsg = "product added successfully";
            $prodbool = true;
         }
         else{
            $prodmsg = "Something went wrong";
            $prodbool = false;
         }
         $_SESSION['prodmsg'] = $prodmsg;
         $_SESSION['prodbool'] = $prodbool;
    }
 header('Location: http://localhost/seller/sellproduct.php');
}

?>