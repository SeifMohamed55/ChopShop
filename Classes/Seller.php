<?php
class Seller extends User{
    private $onSaleProduct = array();
    private $noOfProd = 0;

    function __construct($ID, $email, $password, $fname, $lname, $banState, $phoneNum, $gender, $followedCategories, $onSaleProduct){
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
        $this->onSaleProduct = $onSaleProduct;
        $this->onSaleProduct = count($onSaleProduct);
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
    function setName($name){
        $this->name = $name;
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
    function reportUser_user($user){
        //database
    }
    function reportUser_email($email){
        //database
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
          $this->lname, 0, UserType::SELLER, $this->phoneNum, $this->gender));
        if($stmt)
            return true;
        return false;

    }
    function followCategory($category){
        $this->noOfCateg++;
        $this->followedCategories[$this->noOfCateg - 1] = $category;
    }
     function getNotified(){
        //still
    }
    function addProduct(Product $product){
        //database
        $this->noOfProd++;
        $this->onSaleProduct[$this->noOfProd - 1] = $product;
    }
    function deleteProduct_prod(Product $product ){
        //database
    }
    function deleteProduct_barcode($barcode){

    }
    function scanBarcode($barcode){

    }
}