<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-12
 * Time: 03:45 PM
 */
class overallCart
{

    public $shoppingcartID;
    public $userID;
    public $sci;


    public function __construct()
    {
        $this->sci = array();
    }

    //get
    public function __getShoppingcart($shoppingcartID){
        return $this->$shoppingcartID;
    }

    public function __getUser($userID){
        return $this->$userID;
    }

    public function __setShoppingcartID($shoppingcartID, $val){
        return $this->$shoppingcartID=$val;
    }

    public function __setUser($userID, $val){
        return $this->$userID=$val;
    }
}