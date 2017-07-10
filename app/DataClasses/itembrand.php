<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:51 PM
 */
class itembrand
{

    public $itembrandID;
    public $itembrandName;


    public function __construct()
    {

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
}