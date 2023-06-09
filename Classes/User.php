<?php
include_once "Notifications.php";
include_once "Admin.php";
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
    protected $address;
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
    function getAddress(){
        return $this->address;
    }
    function getFollowedCategories(){
        $database = new Database();
        $ID = User::getIDFromEmail($this->email);
        $stmt = $database->execute("select [user_ID], category 
                from followed_categories where [user_ID] = ?",array($ID));
                $j = 0;
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                $this->followedCategories[$j] = $row['category'];
                $j++;
            }
            $this->noOfCateg = count($this->followedCategories);
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
        $database = new Database();
        $stmt = $database->execute("SELECT email, [password] from [user] where email = ?", array($email));
       
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            if($row['email'] == $email && password_verify($password, $row['password'])){
               $stmt = $database->execute("SELECT * from [user] where email = ?", array($email));
               sqlsrv_fetch($stmt);
               for($i=0 ; $i <= 9 ; $i++){
                $info[$i] = sqlsrv_get_field( $stmt, $i);
               }
               $type = $info[6];
               if ($type == UserType::ADMIN){
                    
                    
                    
                    $user = new Admin($info[1],$info[8],$info[2],$info[3],$info[4],$info[5],$info[7],$info[6], $info[9]);
                    return $user;
                }
               if ($type == UserType::BUYER){
                    
                    
                    
                   
                    $user = new Buyer($info[1],$info[8],$info[2],$info[3],$info[4],$info[5],$info[6],$info[7], $info[9]);
                    return $user;
                }
               
               if ($type == UserType::SELLER){
                    
                    $user = new Seller($info[1],$info[2],$info[3],$info[4],$info[5],$info[6],$info[7],$info[8],$info[9]);
                    return $user;
               }
            }
        
        return false;
    }   
    static function register($user): bool{
        $database = new Database();
        $stmt = $database->execute("SELECT email from [user]",null);
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            if ($row['email'] == $user->email)
                return false;
        }
        $stmt = $database->execute("INSERT into 
        [user](email , [password], fname, lname, ban_state, user_type, phone_num, gender, [address])
         VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)", array($user->email, $user->password, $user->fname,
          $user->lname, 0, $user->userType, $user->phoneNum, $user->gender, $user->address));
          $rows_affected = sqlsrv_rows_affected($stmt);
          if ($rows_affected == 0)
              return false;
          return true;
    }
    static function getIDFromEmail($email){
        $database = new Database();
        $stmt = $database->execute("SELECT ID from [user] where email = ?", array($email));
        $row = sqlsrv_fetch_array($stmt);
        $ID = $row[0];
        return $ID;
    }
}
