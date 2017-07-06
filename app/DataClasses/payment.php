<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:52 PM
 */
class payment
{

    private $paymentID;
    private $orderID;
    private $paymentType;
    private $paymentAccount;
    private $completed;


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

    public function __getPaymentType($paymentType){
        return $this->$paymentType;
    }

    public function __getPaymentAccount($paymentAccount){
        return $this->$paymentAccount;
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

    public function __setPaymentType($paymentType, $val){
        return $this->$paymentType=$val;
    }

    public function __setPaymentAccount($paymentAccount, $val){
        return $this->$paymentAccount=$val;
    }

    public function __setCompleted($completed, $val){
        return $this->$completed=$val;
    }
}