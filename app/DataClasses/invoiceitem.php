<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:52 PM
 */
class invoiceitem
{
    public $invoiceitemID;
    public $orderID;
    public $itemID;
    public $quantity;
    public $price;
    public $tprice;


    public function __construct()
    {

    }

    //get
    public function __getInvoiceitemID($invoiceitemID){
        return $this->$invoiceitemID;
    }

    public function __getOrderID($orderID){
        return $this->$orderID;
    }

    public function __getItemID($itemID){
        return $this->$itemID;
    }

    public function __getQuantity($quantity){
        return $this->$quantity;
    }

    public function __getPrice($price){
        return $this->$price;
    }
    public function __getTPrice($tprice){
        return $this->$tprice;
    }




    //set
    public function __setInvoiceitemID($invoiceitemID, $val){
        return $this->$invoiceitemID=$val;
    }

    public function __setOrderID($orderID, $val){
        return $this->$orderID=$val;
    }

    public function __setItemID($itemID, $val){
        return $this->$itemID=$val;
    }

    public function __setQuantity($quantity, $val){
        return $this->$quantity=$val;
    }

    public function __setPrice($price, $val){
        return $this->$price=$val;
    }
    public function __setTPrice($tprice, $val){
        return $this->$tprice=$val;
    }



}