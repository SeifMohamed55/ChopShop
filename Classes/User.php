<?php
include_once "Notifications.php";
abstract class User implements Notifications{
    protected int $ID;
    protected string $email;
    protected string $password;
    protected string $fname;
    protected string $lname;
    protected int $banState;
    protected  int $userType;
    protected string $phoneNum;
    protected  $gender;
    protected  $followedCategories = array();
    protected int $noOfCateg = 0;    
    function getID(){
        return $this->ID;
    }
    function getEmail(): String{
        return $this->email;
    }
    function getFname(): String{
        return $this->fname;
    }
    function getLname(): String{
        return $this->lname;
    }
    function getBanState(): int{
        return $this->banState;
    }
    function getUserType(){
        return $this->userType;
    }
    function getPassword(): String{
        return $this->password;
    }
    function getPhoneNumber(): String{
        return $this->phoneNum;
    }
    function getGender(){
        return $this->gender;
    }
    function getNoOfCateg(){
        return $this->noOfCateg;
    }
    function getFollowedCategories(){
        return $this->followedCategories;
    }
    function setEmail($email){
        $database = new Database();
        $x = $database->execute("update [user] set email = ?",array($email));
        if ($x){
            $this->email = $email;
            return true;
        }
        return false;
    }
    function setFname($fname){
        $database = new Database();
        $x = $database->execute("update [user] set fname = ?",array($fname));
        if ($x){
            $this->fname = $fname;
            return true;
        }
        return false;
    }
    function setLname($lname){
        $database = new Database();
        $x = $database->execute("update [user] set lname = ?",array($lname));
        if ($x){
            $this->lname = $lname;
            return true;
        }
        return false;
    }
    function setPhoneNumber($phoneNum){
        $database = new Database();
        $x = $database->execute("update [user] set phoneNum = ?",array($phoneNum));
        if ($x){
            $this->phoneNum = $phoneNum;
            return true;
        }
        return false;
    }
    function setPassword($oldPassword,$newPassword){
        if($oldPassword == $this->getPassword()){
            $database = new Database();
            $x = $database->execute("update [user] set [password] = ?", array($newPassword));
            if ($x){
                $this->password = $newPassword;
                return true;
            }
        }
        return false;
    }
    function reportUser_email($email, $description){
        $database = new Database();
        $stmt = $database->execute("select ID from [user] where email = ?",array($email));
        $reportedID = sqlsrv_get_field( $stmt, 0);
        $x = $database->execute("insert into report_user values(?,?,?)", array($this->getID(), $reportedID, $description));
        if ($x){
            return true;
        }
        return false;
    }
   static function login($email, $password){
        $hash = substr(password_hash($password, PASSWORD_DEFAULT), 0, 70);
        $database = new Database();
        $stmt = $database->execute("select email, [password] from [user] where email = ?", array($email));
        if ($stmt){
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            if($row['email'] == $email && $row['password'] == $hash){
               $stmt = $database->execute("select * from user where email = ?", array($email));
               for($i=0 ; $i < 9 ; $i++){
                $info[$i] = sqlsrv_get_field( $stmt, $i);
               }
               $type = $database->execute("select user_type from [user] where email = ?", array($email));
               if ($type == UserType::ADMIN){
                    $stmtb = $database->execute("select email , fname , lname from [user] where ban_state = 1",null);
                    $j = 0;
                    while( $row = sqlsrv_fetch_array( $stmtb, SQLSRV_FETCH_ASSOC) ) {
                        $bannedUsers[$j] = array($row['email'], $row['fname'], $row['lname'] );
                        $j++;
                    }
                    $stmtb = $database->execute("select ID,email , fname, lname, [reported_userID], [description]
                    from [user] join report_user on [user].ID = report_user.[reported_userID]", null);
                    $j = 0;
                    while( $row = sqlsrv_fetch_array( $stmtb, SQLSRV_FETCH_ASSOC) ) {
                        $reportedUsers[$j] = array($row['email'], $row['fname'], $row['lname'] , $row['description'] );
                        $j++;
                    }
                    $user = new Admin($info[0],$info[1],$info[8],$info[2],$info[3],$info[4],$info[5],$info[6],$info[7], $bannedUsers, $reportedUsers);
                    return $user;
                }
               if ($type == UserType::BUYER){
                    $stmt = $database->execute("select [user_ID], category 
                    from followed_categories where [user_ID] = ?",array($info[0]));
                    $j = 0;
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                        $followedCategories[$j] = $row['category'];
                        $j++;
                    }
                    $stmt = $database->execute("select seller_id, [user_id], email
                    from [user] join followed_sellers on [user].ID = [seller_id]
                    where [user_id] = ?", array($info[0]));
                    $j = 0;
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                        $followedSellers[$j] = $row['email'];
                        $j++;
                    }
                    $stmt = $database->execute("select [user_ID], prod_barcode from user_wishlists
                    where [user_ID] = ?", array($info[0]));
                    $j = 0;
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                        $wishlist[$j] = $row['prod_barcode'];
                        $j++;
                    }
                    $user = new Buyer($info[0],$info[1],$info[8],$info[2],$info[3],$info[4],$info[5],$info[6],$info[7], $followedCategories, $followedSellers , null, $wishlist );
                    return $user;
                }
               
               if ($type == UserType::SELLER){
                    $stmt = $database->execute("select [user_ID], category 
                    from followed_categories where [user_ID] = ?",array($info[0]));
                    $j = 0;
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                        $followedCategories[$j] = $row['category'];
                        $j++;
                    }
                    $stmt = $database->execute("select seller_ID, barcode
                    from product where seller_ID = ?",array($info[0]));
                    $j = 0;
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                        $onSaleProduct[$j] = $row['barcode'];
                        $j++;
                    }

                    $user = new Seller($info[0],$info[1],$info[8],$info[2],$info[3],$info[4],$info[5],$info[6],$info[7], $followedCategories, $onSaleProduct );
                    return $user;
               }
            }
        }
        return false;
    }   
    static function register($user): bool{
        $database = new Database();
        $stmt = $database->execute("insert into 
        [user](email , password, fname, lname, ban_state, user_type, phone_num, gender)
         VALUES(?, ?, ?, ?, ?, ?, ?, ?)", array($user->email, $user->password, $user->fname,
          $user->lname, 0, $user->userType, $user->phoneNum, $user->gender));
          $rows_affected = sqlsrv_rows_affected($stmt);
          if ($rows_affected == 0)
              return false;
          return true;
    }
    static function getIDFromEmail($email){
        $database = new Database();
        $stmt = $database->execute("SELECT ID from [user] where email = ?", array($email));
        if ($stmt){
            $row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);
            $ID = $row['ID'];
            return $ID;
        }
        return false;
    }
}
