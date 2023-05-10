<?php
include_once "../Classes/Seller.php";
include_once "../Classes/Product.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $seller = unserialize($_SESSION['user']);
    if (isset($_POST['pbarcode'])){
        
         if ($seller->deleteProduct_barcode($_POST['pbarcode'])){
            $delprodmsg = "product deleted successfully";
            $delprodbool = true;
         }
         else{
            $delprodmsg = "Something went wrong or product does'n exitst";
            $delprodbool = false;
         }
         $_SESSION['delprodmsg'] = $delprodmsg;
         $_SESSION['delprodbool'] = $delprodbool;
    }
 header('Location: http://localhost/seller/removeproduct.php');
}

?>