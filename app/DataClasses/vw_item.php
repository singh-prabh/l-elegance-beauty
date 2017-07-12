<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-12
 * Time: 04:35 PM
 */
class vw_item
{

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