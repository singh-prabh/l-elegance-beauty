<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:51 PM
 */
class shoppingcart
{

    private $shoppingcartID;
    private $userID;


    public function __construct()
    {

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