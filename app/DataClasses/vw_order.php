<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-13
 * Time: 05:32 PM
 */
class vw_order
{


    public $orderID;
    public $orderStatusCom;
    public $orderStatusCol;
    public $orderDate;
    public $ordertotalPrice;
    public $UserID;
    public $invoiceitemID;
    public $invoiceitemtotalprice;
    public $quantity;
    public $price;

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
    public function __getOrderID($orderID){
        return $this->$orderID;
    }

    public function __getOrderStatusCom($orderStatusCom){
        return $this->$orderStatusCom;
    }
    public function __getOrderStatusCol($orderStatusCol)
    {
        return $this->$orderStatusCol;
    }
    public function __getOrderDate($orderDate){
        return $this->$orderDate;
    }

    public function __getUserID($UserID){
        return $this->$UserID;
    }

    public function __getinvoiceitemID($invoiceitemID){
        return $this->$invoiceitemID;
    }

    public function __getinvoiceitemtotalprice($invoiceitemtotalprice){
        return $this->$invoiceitemtotalprice;
    }

    public function __getQuantity($quantity){
        return $this->$quantity;
    }

    public function __getPrice($price){
        return $this->$price;
    }

    public function __getOrderTotalPrice($ordertotalPrice){
        return $this->$ordertotalPrice;
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

    public function __setOrderID($orderID, $val){
        return $this->$orderID= $val;
    }

    public function __setOrderStatus($orderStatus, $val){
        return $this->$orderStatus= $val;
    }

    public function __setOrderStatusCol($orderStatusCol, $val){
            return $this->$orderStatusCol= $val;
        }

    public function __setOrderDate($orderDate, $val){
        return $this->$orderDate= $val;
    }

    public function __setUserID($UserID, $val){
        return $this->$UserID= $val;
    }

    public function __setinvoiceitemID($invoiceitemID, $val){
        return $this->$invoiceitemID= $val;
    }

    public function __setQuantity($quantity, $val){
        return $this->$quantity= $val;
    }

    public function __setPrice($price, $val){
        return $this->$price= $val;
    }
    public function __setinvoiceitemtotalprice($invoiceitemtotalprice, $val){
        return $this->$invoiceitemtotalprice=$val;
    }

    public function __setOrderTotalPrice($ordertotalPrice, $val){
        return $this->$ordertotalPrice= $val;
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
