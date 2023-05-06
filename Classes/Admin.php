<?php
class Admin extends User{

    private $bannedUsers = array();
    private $reportedUsers = array();
    protected Database $database = new Database();

    function __construct($ID, $email, $gender, $password, $fname, $lname, $banState, $phoneNum, $userType, $bannedUsers, $reportedUsers){
        $this->ID = $ID;
        $this->email = $email;
        $this->password = $password;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->banState = $banState;
        $this->gender = $gender;
        $this->userType =$userType;
        $this->phoneNum = $phoneNum;
        $this->bannedUsers = $bannedUsers;
        $this->reportedUsers = $reportedUsers;
    }
  
    function getNoOfCateg(){
        return $this->noOfCateg;
    }
    function getFollowedCategories(){
        return $this->followedCategories;
    }

    function followCategory($category){
        $this->noOfCateg++;
        $this->followedCategories[$this->noOfCateg - 1] = $category;
    }
    function getBannedUsers(){
        //database

        return $this->bannedUsers;
    }
    function getReportedUsers(){
        $sql = "SELECT reported_user FROM report_user";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['reported_user'];
}

sqlsrv_free_stmt($stmt);

        return $this->reportedUsers;
    }
    function banUser_user(User $user){
        //database
    }
    function banUser_email(String $email){
        //database
    }
    function unbanUser_email (String $email){
        //database
    }
    function reportUser_user($user){
        $sql = "INSERT INTO repor_user (report_ID, user_ID, reported_userID, description) VALUES (?, ?, ?, ?)";
        $params = array(3);

        $stmt = sqlsrv_query( $conn, $sql, $params);
    }
    function reportUser_email($email, $description){
        $stmt = $this->database->execute("select ID from [user] where email = ?",array($email));
        $reportedID = sqlsrv_get_field( $stmt, 0);
        $x = $this->database->execute("insert into report_user values(?,?,?)", array($this->getID(), $reportedID, $description));
        if ($x){
            return true;
        }
        return false;
    }
    function getNotified(){

    }
    function deleteProduct_barcode(String $barcode){
        $x = $this->database->execute("update [product] delete barcode = ?", array($barcode));
    }
    function deleteProduct_prod(Product $product){
        $x = $this->database->execute("delete from [product] where barcode = ?", array($product));
    }
    function addAdmin_email(String $email){
        $sql = "INSERT INTO [user] (id) VALUES (?)";
        $params = array($email);
        
        $stmt = sqlsrv_query( $conn, $sql, $params);
    }
    function addAdmin_user(User $user){
        $sql = "INSERT INTO user (id, email, password, fname, lname, ban_state, user_type, phone_num) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array(1);

        $stmt = sqlsrv_query( $conn, $sql, $params);
    }
    function deleteAdmin(String $email){
        $x = $this->database->execute("delete from [user] where email = ?", array($email));
    }
}