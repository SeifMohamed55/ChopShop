<?php
class Admin extends User{

    private $bannedUsers = array();
    private $reportedUsers = array();
    private $noOfBanned;
    private $noOfReported;

    function __construct($email, $gender, $password, $fname, $lname, $banState, $phoneNum, $userType, $address){
        $this->email = $email;
        $this->password = $password;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->banState = $banState;
        $this->gender = $gender;
        $this->userType =$userType;
        $this->phoneNum = $phoneNum;
        $this->address = $address;
    }
  
    function getBannedUsers(){
        $database = new Database();
        $stmt = $database->execute("select email , fname , lname from [user] where ban_state = 1",null);
                    $j = 0;
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                        $this->bannedUsers[$j] = array($row['email'], $row['fname'], $row['lname'] );
                        $j++;
                    }
                    $this->noOfBanned = count($this->bannedUsers);
        return $this->bannedUsers;
    }
    function getNoOfBanned(){
        return $this->noOfBanned;
    }
    function getNoOfReported(){
        return $this->noOfReported;
    }
    function getReportedUsers(){
        $database = new Database();
        $stmt = $database->execute("SELECT ID,email , fname, lname, [reported_userID], [description]
                    from [user] join report_user on [user].ID = report_user.[reported_userID]", null);
                    $j = 0;
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                        $this->reportedUsers[$j] = array($row['email'], $row['fname'], $row['lname'] , $row['description'] );
                        $j++;
                    }
                    $this->noOfReported = count($this->reportedUsers);
        return $this->reportedUsers;
    }
    function getID(){
        return ($this->ID = User::getIDFromEmail($this->email));
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