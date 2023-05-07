<?php
class Admin extends User{

    private $bannedUsers = array();
    private $reportedUsers = array();

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
  
    function getBannedUsers(){
        return $this->bannedUsers;
    }
    function getReportedUsers(){
        return $this->reportedUsers;
    }
    function banUser_email(String $email){
        $database = new Database();
        $stmt = $database->execute("UPDATE [user] set ban_state = 1 where email = ?",array($email));
        if ($stmt)
            return true;
        return false;
    }
    function unbanUser_email (String $email){
        $database = new Database();
        $stmt = $database->execute("UPDATE [user] set ban_state = 0 where email = ?",array($email));
        if ($stmt)
            return true;
        return false;
    }
    function getNotified(){

    }
    function deleteProduct_barcode(String $barcode){
        $database = new Database();
        $stmt = $database->execute("DELETE from product where barcode = ?", array($barcode));
        $rows_affected = sqlsrv_rows_affected($stmt);
        if ($rows_affected == 0)
            return false;
        return true;
    }
    function addAdmin_user($user){
        $database = new Database();
        $stmt = $database->execute("insert into 
        [user](email , password, fname, lname, ban_state, user_type, phone_num, gender)
         VALUES(?, ?, ?, ?, ?, ?, ?, ?)", array($user->email, $user->password, $user->fname,
        $user->lname, 0, UserType::ADMIN, $user->phoneNum, $user->gender));
        $rows_affected = sqlsrv_rows_affected($stmt);
        if ($rows_affected == 0)
            return false;
        return true;
    }
    function deleteAdmin(String $email){
        $database = new Database();
        $stmt = $database->execute("DELETE from [user] where email = ?", array($email));
        $rows_affected = sqlsrv_rows_affected($stmt);
        if ($rows_affected == 0)
            return false;
        return true;
    }
}