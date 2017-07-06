<?php
/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-06-29
 * Time: 03:17 PM
 */

class DBConnect //create a class for make connection
{
    var $host="localhost";
    var $username="root";    // specify the sever details for mysql
    Var $password="Mty011gp";
    var $database="beauty";
    var $myconn;

    function connectToDatabase() // create a function for connect database
    {

        $conn= mysqli_connect($this->host,$this->username,$this->password);

        if(!$conn)// testing the connection
        {
            return false;
        }

        else
        {

            $this->myconn = $conn;


            $dbselect = mysqli_select_db($this->myconn,$this->database);
            if($dbselect){
               return true;
            }
            else{
                return false;
            }

        }



    }



    function closeConnection() // close the connection
    {
        mysqli_close($this->myconn);

        echo "Connection closed";
    }

}
?>