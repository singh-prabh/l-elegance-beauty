<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:51 PM
 */
class order
{

    public $orderID;
    public $userID;
    public $statusCompleted;
    public $orderDate;
    public $statusCollected;
    public $totalPrice;


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

    public function __getOrderDate($orderDate){
        return $this->$orderDate;
    }
    public function __getStatusCollected($statusCollected){
        return $this->$statusCollected;
    }
    public function __getTotalPrice($totalPrice){
        return $this->$totalPrice;
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

    public function __setOrderDate($orderDate, $val){
        return $this->$orderDate=$val;
    }

    public function __setStatusCollected($statusCollected, $val){
        return $this->$statusCollected=$val;
    }

    public function __setTotalPrice($totalPrice, $val){
        return $this->$totalPrice=$val;
    }
}