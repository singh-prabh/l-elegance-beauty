<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:50 PM
 */
class item
{

    public $itemID;
    public $itemName;
    public $itemDescription;
    public $itemPrice;
    public $categoryID;
    public $itembrandID;
    public $itemImage;


    public function __construct()
    {

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

    public function __getCategoryID($categoryID){
        return $this->$categoryID;
    }

    public function __getItembrandID($itembrandID){
        return $this->$itembrandID;
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

    public function __setCategoryID($categoryID, $val){
        return $this->$categoryID=$val;
    }

    public function __setItembrandID($itembrandID, $val){
        return $this->$itembrandID=$val;
    }

    public function __setItemImage($itemImage, $val){
        return $this->$itemImage=$val;
    }


}