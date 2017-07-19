<?php
if(!isset($_COOKIE["account"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {
    include "../DataClasses/user.php";
    include "../DatabaseConnection/DBConnect.php";
    $dbOne = new DBConnect();
    $user = unserialize($_COOKIE["account"]);

    if ($dbOne->connectToDatabase()) {

        $c = "SELECT * FROM user WHERE id_user ='".$user->userID."'";
        $r = mysqli_query($dbOne->myconn, $c);

        if ($r) {
            if(mysqli_fetch_array($r, MYSQLI_ASSOC))
            {

            }
            else{
                header('Location: ' . '../../index.php'); /* Redirect browser */
                die();
            }
        }

    }

}
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