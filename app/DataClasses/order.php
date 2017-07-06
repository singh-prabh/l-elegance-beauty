<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:51 PM
 */
class order
{

    private $orderID;
    private $userID;
    private $statusCompleted;

    public function __construct()
    {

    }

    //get
    public function __getOrderID($orderID){
        return $this->$orderID;
    }

    public function __getUserID($userID){
        return $this->$userID;
    }

    public function __getStatusCompleted($statusCompleted){
        return $this->$statusCompleted;
    }

    //set
    public function __setOrderID($orderID, $val){
        return $this->$orderID=$val;
    }

    public function __setUserID($userID, $val){
        return $this->$userID=$val;
    }

    public function __setStatusCompleted($statusCompleted, $val){
        return $this->$statusCompleted=$val;
    }
}