<?php
class Admin extends User{

    private $bannedUsers = array();
    private $reportedUsers = array();

    function __construct($ID, $email, $gender, $password, $fname, $lname, $banState, $phoneNum, $followedCategories){
        $this->ID = $ID;
        $this->email = $email;
        $this->password = $password;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->banState = $banState;
        $this->gender = $gender;
        $this->userType = UserType ::SELLER;
        $this->phoneNum = $phoneNum;
        $this->followedCategories = $followedCategories;
        $this->noOfCateg = count($followedCategories);
        $this->database = new Database();

    }
    function getID(){
        return $this->ID;
    }
    function getEmail(): String{
        return $this->email;
    }
    function getName(): String{
        return $this->name;
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
        $this->email = $email;
    }
    function setName($fname , $lname){
        $this->fname = $fname;
        $this->lname = $lname;
    }
    function setPhoneNumber($phoneNum){
        $this->phoneNum = $phoneNum;
    }
    function setPassword($oldPassword,$newPassword){
        if($oldPassword == $this->getPassword()){
            $this->password = $newPassword;
            return true;
        }
        return false;
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
        //database

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

    }
    function reportUser_email($email){

    }
    static function login($email, $password): bool{
        $hash = substr(password_hash($password, PASSWORD_DEFAULT), 0, 70);
        $database = new Database();
        $stmt = $database->execute("select email, [password] from [user] where email = ?", array($email));
        if ($stmt){
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            if($row['email'] == $email && $row['password'] == $hash){
                return true;
            }
        }
        return false;
    }
    function register(): bool{
        $stmt = $this->database->execute("insert into 
        [user](email , password, fname, lname, ban_state, user_type, phone_num, gender)
         VALUES(?, ?, ?, ?, ?, ?, ?, ?)", array($this->email, $this->hash, $this->fname,
          $this->lname, 0, UserType::ADMIN, $this->phoneNum, $this->gender));
        if($stmt)
            return true;
        return false;

    }
    function getNotified(){

    }
    function deleteProduct_barcode(String $barcode){
        //database
    }
    function deleteProduct_prod(Product $product){
        //database
    }
    function addAdmin_email(String $email){
            //database
    }
    function addAdmin_user(User $user){
        //database
    }
    function deleteAdmin(String $email){
        //database
    }
}