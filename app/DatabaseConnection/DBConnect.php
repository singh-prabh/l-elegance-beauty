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
    var $password="Sharktale";
    var $database="beauty";
    var $myconn;

    function connectToDatabase() // create a function for connect database
    {
        $url = getenv('JAWSDB_URL');
        if($url==true)
        {
            $dbparts = parse_url($url);

            $this->host = $dbparts['host'];
            $this->username = $dbparts['user'];
            $this->password = $dbparts['pass'];
            $this->database = ltrim($dbparts['path'],'/');
        }
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

    //insert
    function insertUser($user){
       // $sqlSelect = "INSERT INTO user (userName, userSurname, userEmail,employeeUsername, employeePassword, AdminPrivileges, activated )
            //    VALUES(employeeName_, employeeSurname_, employeeEmail_ ,employeeUsername_, employeePassword_, AdminPrivileges_, activated_ );
        $res = mysqli_query($dbOne->myconn, $sqlSelect);
    }
    //update

    //delete

}
?>