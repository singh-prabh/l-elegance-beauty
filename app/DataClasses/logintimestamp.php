<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-10
 * Time: 01:21 PM
 */
class logintimestamp
{
    public $logintimestampID;
    public $timestamp;
    public $userID;
    public $email;

    public function __construct()
    {

    }

    //get
    public function __getLogintimestampID($logintimestampID){
        return $this->$logintimestampID;
    }

    public function __getTimestamp($timestamp){
        return $this->$timestamp;
    }

    public function __getUserID($statusCompleted){
        return $this->$statusCompleted;
    }

    public function __getEmail($email){
        return $this->$email;
    }

    //set
    public function __setLogintimestampID($logintimestampID, $val){
        return $this->$logintimestampID=$val;
    }

    public function __setTimestamp($timestamp, $val){
        return $this->$timestamp=$val;
    }

    public function __setUserID($userID, $val){
        return $this->$userID=$val;
    }

    public function __setEmail($email, $val){
        return $this->$email=$val;
    }

}