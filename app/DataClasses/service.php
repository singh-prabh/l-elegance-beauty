<?php

/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-05
 * Time: 12:50 PM
 */
class service
{

    public $serviceID;
    public $serviceName;
    public $serviceDescription;
    public $servicePrice;
    public $categoryID;




    public function __construct()
    {

    }

    //get
    public function __getServiceID($serviceID){
        return $this->$serviceID;
    }

    public function __getServiceName($serviceName){
        return $this->$serviceName;
    }

    public function __getServiceDescription($serviceDescription){
        return $this->$serviceDescription;
    }

    public function __getServicePrice($servicePrice){
        return $this->$servicePrice;
    }

    public function __getCategoryID($categoryID){
        return $this->$categoryID;
    }








    //set
    public function __setServiceID($serviceID, $val){
        return $this->$serviceID=$val;
    }

    public function __setServiceName($serviceName, $val){
        return $this->$serviceName=$val;
    }

    public function __setServiceDescription($serviceDescription, $val){
        return $this->$serviceDescription=$val;
    }

    public function __setServicePrice($servicePrice, $val){
        return $this->$servicePrice=$val;
    }

    public function __setCategoryID($categoryID, $val){
        return $this->$categoryID=$val;
    }




}