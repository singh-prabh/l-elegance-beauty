<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:49 PM
 */
class User
{
    private $userID;
    private $userName;
    private $userSurname;
    private $userContact;
    private $userEmail;
    private $userPassword;
    private $activated;
    private $admin;

    public function __construct()
    {

    }

    //get
    public function __getUserID($userID){
        return $this->$userID;
    }

    public function __getUserName($userName){
        return $this->$userName;
    }

    public function __getUserSurname($userSurname){
        return $this->$userSurname;
    }

    public function __getUserContact($userContact){
        return $this->$userContact;
    }

    public function __getUserEmail($userEmail){
        return $this->$userEmail;
    }

    public function __getUserPassword($userPassword){
        return $this->$userPassword;
    }

    public function __getActivated($activated){
        return $this->$activated;
    }

    public function __getAdmin($admin){
        return $this->$admin;
    }


    //set
    public function __setUserID($userID, $val){
        return $this->$userID=$val;
    }

    public function __setUserName($userName, $val){
        return $this->$userName=$val;
    }

    public function __setUserSurname($userSurname, $val){
        return $this->$userSurname=$val;
    }

    public function __setUserContact($userContact, $val){
        return $this->$userContact=$val;
    }

    public function __setUserEmail($userEmail, $val){
        return $this->$userEmail=$val;
    }

    public function __setUserPassword($userPassword, $val){
        return $this->$userPassword=$val;
    }

    public function __setActivated($activated, $val){
        return $this->$activated=$val;
    }

    public function __setAdmin($admin, $val){
        return $this->$admin=$val;
    }
}