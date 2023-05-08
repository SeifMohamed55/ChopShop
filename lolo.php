<?php
include_once "Classes/Categories.php";
include_once "Classes/UserType.php";
include_once "Classes/Notifications.php";
include_once "Classes/User.php";
include_once "Classes/Buyer.php";
include_once "Classes/Product.php";
include_once "Classes/Database.php";
include_once "Classes/Seller.php";
echo Categories::TOYS ."<br>";
echo Categories::ELCTRONICS."<br>";
echo UserType::ADMIN."<br>"; 
$d = date("y-m-d");
$new_date = date('Y-m-d', strtotime($d)); //sqlsrvr format
echo "<br>" . $new_date . "<br>";
$auc = strtotime($d);
$cat = array(Categories::CLOTHING,Categories::ELCTRONICS,Categories::KITCHEN,Categories::TOYS);
echo $auc;
echo date("Y-m-d", $auc) . "<br>" . date("Y-m-d",strtotime("+6 months"));

$serverName = "localhost";  
$connectionInfo = array(  "Database"=>"Shop", "UID"=>"Admin", "PWD"=>"admin");
// Create connection
$conn = sqlsrv_connect( $serverName, $connectionInfo);  

// Check connection
if (!($conn)) {
  die("Connection failed: " . print_r(sqlsrv_errors(), true));
}
if ($conn)
    echo "success<br>";
/* $param = array("seifelden073@gmail.com", "seif", "Seif-Elden" ,"Mohamed", 0, UserType::BUYER , "01142236508", "Male", "52 abdel qader" ); */
/* $stmt = sqlsrv_query($conn,"INSERT into  [user](email, [password], fname, lname, ban_state, user_type, phone_num, gender, [address]) 
VALUES('seifelden073@gmail.com', 'seif', 'Seif-Elden' ,'Mohamed', 0, 3 , '01142236508', 'Male', '52 abdel qader' )");
$rows_affected = sqlsrv_rows_affected($stmt);
if ($rows_affected == 0)
    echo "<br>not successful";
echo "<br>successful";
 */


/* $param = array("seifelden073@gmail.com", "seif", "Seif-Elden" ,"Mohamed", 0, UserType::SELLER , "01142236508", "Male", "52 abdel qader" );
$stmt = $database->execute("INSERT into  [user](email, [password], fname, lname, ban_state, user_type, phone_num, gender, [address]) 
VALUES(?, ?, ?,?, ?, ? , ?, ?, ? )",$param);
if($stmt){
$rows_affected = sqlsrv_rows_affected($stmt);
if ($rows_affected == 0)
    echo "<br>not successful";
echo "<br>successful";
}
else{
    echo "Wrong";
} */


$user = new Seller("seifelden073@gmail.com", "seif", "Seif-Elden" ,"Mohamed", 0, UserType::SELLER 
, "01142236508", "Male", "52 abdel qader",array(),array());
User::register($user);