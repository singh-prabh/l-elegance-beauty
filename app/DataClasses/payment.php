<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:52 PM
 */
class payment
{

    public $paymentID;
    public $orderID;

    public $completed;


    public function __construct()
    {

    }

    //get
    public function __getPaymentID($paymentID){
        return $this->$paymentID;
    }

    public function __getOrderID($orderID){
        return $this->$orderID;
    }



    public function __getCompleted($completed){
        return $this->$completed;
    }




    //set
    public function __setPaymentID($paymentID, $val){
        return $this->$paymentID=$val;
    }

    public function __setOrderID($orderID, $val){
        return $this->$orderID=$val;
    }



    public function __setCompleted($completed, $val){
        return $this->$completed=$val;
    }
}