<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:50 PM
 */
class category
{
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

}