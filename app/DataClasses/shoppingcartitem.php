<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:51 PM
 */
class shoppingcartitem
{

    public $shoppingcartitemID;
    public $userID;
    public $itemID;
    public $quantity;
    public $totalPrice;


    public function __construct()
    {

    }

    //get
    public function __getShoppingcartitemID($shoppingcartitemID){
        return $this->$shoppingcartitemID;
    }

    public function __getUserID($shoppingcartID){
        return $this->$shoppingcartID;
    }

    public function __getItemID($itemID){
        return $this->$itemID;
    }

    public function __getQuantity($quantity){
        return $this->$quantity;
    }

    public function __getTotalPrice($totalPrice){
        return $this->$totalPrice;
    }






    //set
    public function __setShoppingcartitemID($shoppingcartitemID, $val){
        return $this->$shoppingcartitemID=$val;
    }

    public function __setShoppingcartID($userID, $val){
        return $this->$userID=$val;
    }

    public function __setItemID($itemID, $val){
        return $this->$itemID=$val;
    }

    public function __setQuantity($quantity, $val){
        return $this->$quantity=$val;
    }

    public function __setTotalPrice($totalPrice, $val){
        return $this->$totalPrice=$val;
    }


}