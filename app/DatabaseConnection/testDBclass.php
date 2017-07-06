<?php
/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-06-29
 * Time: 03:18 PM
 */

include ('DBConnect.php');

$connection = new createConnection(); //i created a new object

$connection->connectToDatabase(); // connected to the database

echo "<br />"; // putting a html break

$connection->selectDatabase();// closed connection

echo "<br />";

$connection->closeConnection();
?>