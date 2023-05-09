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


/* $user = new Seller("seifelden073@gmail.com", "seif", "Seif-Elden" ,"Mohamed", 0, UserType::SELLER 
, "01142236508", "Male", "52 abdel qader",array(),array()); */
$database = new Database();
$stmt = $database->execute("SELECT * from [user] where email = ?", array('seifelden073@gmail.com'));
 sqlsrv_fetch($stmt);
 for($i=0 ; $i < 9 ; $i++){
    $info[$i] = sqlsrv_get_field( $stmt, $i);
}
for($i = 0; $i < 9; $i++){
    echo $info[$i];
}
echo '<br>';
/* $hash = substr(password_hash('seif', PASSWORD_DEFAULT), 0, 70);
$user = User::login('seifelden073@gmail.com', $hash);
echo var_dump($user); */
$user1 = User::login('seifelden073@gmail.com','seif');
echo $user1->getEmail() . "<br>" . $user1->getID() ."<br>". $user1->getFname() . "<br>" . $user1->getLname();
$user = User::login('seifelden073@gmail.com', 'lolo');
 if($user == false) {
    echo '<script type="text/javascript">alert("'.$user1->getEmail().'");</script>';
  }?>
 

