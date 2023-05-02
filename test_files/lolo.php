<?php
include_once "Classes/Categories.php";
include_once "Classes/UserType.php";
include_once "Classes/Notifications.php";
include_once "Classes/User.php";
include_once "Classes/Buyer.php";
include_once "Classes/Product.php";
echo Categories::TOYS ."<br>";
echo Categories::ELCTRONICS."<br>";
echo UserType::ADMIN."<br>"; 

$bo = new Buyer(50,"seifelden@gnail.com", "hola chicka wacka" , "seifMohamed" , 0 , "01142236555", array(Categories::CLOTHING,Categories::ELCTRONICS,Categories::KITCHEN , "No one cares"), array("Sika","Seif","Ahmed"), array("Vacumbitch", "vora", "momo"), array("prod", "dsad", "foofo"));


echo $bo->getBanState() . "<br>" . $bo->getEmail() . "<br>" . $bo->getPhoneNumber()
."<br>" . $bo->getName();

$bo->setPassword("df", "my new password");
echo $bo->getPassword() . "<br>";
echo print_r($bo->getFollowedCategories()).  "<br>";
echo $bo->getFollowedCategories()[0];
$d = date("y-m-d");
$new_date = date('Y-m-d', strtotime($d)); //sqlsrvr format
echo "<br>" . $new_date . "<br>";
$auc = strtotime($d);
$cat = array(Categories::CLOTHING,Categories::ELCTRONICS,Categories::KITCHEN,Categories::TOYS);
 $x = new Product("18599A79", "Oil 2L", $new_date, 500.2656, 20, "THee description for the oil", date("Y-m-d",strtotime("+3 years +3 months", $auc)), 12, $cat);
 echo $x->getBarcode() . " <br>" . $x->getAddDate() . "<br>" . $x->getDescription() . "<br>" . $x->getAuctionDuration() . "<br>";
echo $auc;
echo date("Y-m-d", $auc) . "<br>" . date("Y-m-d",strtotime("+6 months"));