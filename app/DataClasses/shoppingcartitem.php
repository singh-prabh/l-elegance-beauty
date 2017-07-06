<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:51 PM
 */
class shoppingcartitem
{

    private $shoppingcartitemID;
    private $shoppingcartID;
    private $itemID;
    private $quantity;



    public function __construct()
    {

    }

    //get
    public function __getShoppingcartitemID($shoppingcartitemID){
        return $this->$shoppingcartitemID;
    }

    public function __getShoppingcartID($shoppingcartID){
        return $this->$shoppingcartID;
    }

    public function __getItemID($itemID){
        return $this->$itemID;
    }

    public function __getQuantity($quantity){
        return $this->$quantity;
    }






    //set
    public function __setShoppingcartitemID($shoppingcartitemID, $val){
        return $this->$shoppingcartitemID=$val;
    }

    public function __setShoppingcartID($shoppingcartID, $val){
        return $this->$shoppingcartID=$val;
    }

    public function __setItemID($itemID, $val){
        return $this->$itemID=$val;
    }

    public function __setQuantity($quantity, $val){
        return $this->$quantity=$val;
    }


}