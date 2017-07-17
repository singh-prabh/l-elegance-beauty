<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-17
 * Time: 01:46 PM
 */


/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-13
 * Time: 05:32 PM
 */
class vw_cart
{


    public $shoppingcartitemID;
    public $totalPrice;
    public $quantity;
    public $UserID;
    public $itemID;
    public $itemName;
    public $itemDescription;
    public $itemPrice;
    public $itemImage;
    public $itembrandID;
    public $itembrandName;
    public $categoryID;
    public $categoryName;


    public function __construct()
    {

    }

    //get
    public function __getShoppingcartitemID($shoppingcartitemID){
        return $this->$shoppingcartitemID;
    }

    public function __getTotalPrice($totalPrice){
        return $this->$totalPrice;
    }

    public function __getQuantity($quantity){
        return $this->$quantity;
    }

    public function __getUserID($UserID){
        return $this->$UserID;
    }

    public function __getCategoryID($categoryID){
        return $this->$categoryID;
    }


    public function __getCategoryName($categoryName){
        return $this->$categoryName;
    }

    public function __setCategoryID($categoryID, $val){
        return $this->$categoryID=$val;
    }

    public function __setCategoryName($categoryName, $val){
        return $this->$categoryName=$val;
    }


    //get
    public function __getItembrandID($itembrandID){
        return $this->$itembrandID;
    }

    public function __getItembrandName($itembrandName){
        return $this->$itembrandName;
    }

    public function __setItembrandID($itembrandID, $val){
        return $this->$itembrandID=$val;
    }

    public function __setItembrandName($itembrandName, $val){
        return $this->$itembrandName=$val;
    }

    public function __setShoppingcartitemID($shoppingcartitemID, $val){
        return $this->$shoppingcartitemID= $val;
    }


    public function __setUserID($UserID, $val){
        return $this->$UserID= $val;
    }


    public function __setQuantity($quantity, $val){
        return $this->$quantity= $val;
    }

    public function __setPrice($price, $val){
        return $this->$price= $val;
    }




    //get
    public function __getItemID($itemID){
        return $this->$itemID;
    }

    public function __getItemName($itemName){
        return $this->$itemName;
    }

    public function __getItemDescription($itemDescription){
        return $this->$itemDescription;
    }

    public function __getItemPrice($itemPrice){
        return $this->$itemPrice;
    }



    public function __getItemImage($itemImage){
        return $this->$itemImage;
    }




    //set
    public function __setItemID($itemID, $val){
        return $this->$itemID=$val;
    }

    public function __setItemName($itemName, $val){
        return $this->$itemName=$val;
    }

    public function __setItemDescription($itemDescription, $val){
        return $this->$itemDescription=$val;
    }

    public function __setItemPrice($itemPrice, $val){
        return $this->$itemPrice=$val;
    }



    public function __setItemImage($itemImage, $val){
        return $this->$itemImage=$val;
    }
}
