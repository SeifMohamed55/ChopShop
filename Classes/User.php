<?php
include_once "Notifications.php";
abstract class User implements Notifications{
    protected int $ID;
    protected string $email;
    protected string $password;
    protected string $name;
    protected int $banState;
    protected  $userType;
    protected string $phoneNum;
    protected  $followedCategories = array();
    protected int $noOfCateg = 0;
    
   abstract function getID();
   abstract function getEmail(): String;
   abstract function getName(): String;
   abstract function getBanState(): int;
   abstract function getUserType();
   abstract function getPassword(): String;
   abstract function getPhoneNumber(): String;
   abstract function getFollowedCategories();
   abstract function getNoOfCateg();
   abstract function setEmail($email);
   abstract function setName($name);
   abstract function setPhoneNumber($phoneNum);
   abstract function setPassword($oldpassword, $newPassword);
   abstract function followCategory($category);
   abstract function reportUser_user($user);
   abstract function reportUser_email($email);
   abstract function login($email, $password): bool;
}
