<?php
/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-17
 * Time: 02:21 PM
 */
include "../DatabaseConnection/DBConnect.php";
$ID=$_GET["id"];

$dbOne = new DBConnect();
if ($dbOne->connectToDatabase()) {

    $sql = $dbOne->deleteShoppingCartItem($ID);


    if ($sql) {
        header('Location: ' . '../UserPages/CheckOut.php');
    }
}
?>