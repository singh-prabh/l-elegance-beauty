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
 * Time: 08:41 PM
 */

include "../DataClasses/user.php";
include "../DataClasses/order.php";
include "../DataClasses/vw_cart.php";
include "../DataClasses/invoiceitem.php";
include "../DataClasses/payment.php";
include "../DatabaseConnection/DBConnect.php";

$user= unserialize($_COOKIE["account"]);
$orderTotal = 0;
$dbOne = new DBConnect();
if ($dbOne->connectToDatabase()) {

    $sqlSelect = "SELECT * FROM vw_cart WHERE userID ='" . $user->userID . "'";
    $res = mysqli_query($dbOne->myconn, $sqlSelect);

    if ($res) {
        $a = array();
        while ($resArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

            $cart = new vw_cart();

            $cart->shoppingcartitemID = $resArray["shoppingcartitemID"];
            $cart->totalPrice = $resArray["totalPrice"];
            $cart->quantity = $resArray["quantity"];
            $cart->UserID = $resArray["userID"];
            $cart->itemID = $resArray["ItemID"];
            $cart->itemName = $resArray["ItemName"];
            $cart->itemDescription = $resArray["ItemDescription"];
            $cart->itemPrice = $resArray["ItemPrice"];
            $cart->itembrandID = $resArray["BrandID"];
            $cart->itembrandName = $resArray["BrandName"];
            $cart->categoryName = $resArray["CategoryName"];
            $cart->categoryID = $resArray["CategoryID"];
            $cart->itemImage = $resArray["Image"];

            $orderTotal = $orderTotal + $resArray["totalPrice"];
            array_push($a, $cart);
        }

        $order = new order();
        $order->userID = $user->userID;
        $order->statusCompleted = 0;
        date_default_timezone_set('Africa/Johannesburg');
        $order->orderDate= date("Y-m-d H:i:s");
        $order->statusCollected = 0;
        $order->totalPrice = $orderTotal;

        $orderid = $dbOne->insertOrder($order);
        echo $orderid;
        if($orderid!=false){

            $p = new payment();
            $p->orderID = $orderid;
            $p->completed = 1;
            $pay = $dbOne->insertPayment($p);
            if($pay){
                $ok=true;
                for($i=0;$i<count($a);$i++){
                    $c = $a[$i];

                    $ii = new invoiceitem();
                    $ii->itemID = $c->itemID;
                    $ii->orderID = $orderid;
                    $ii->price = $c->itemPrice;
                    $ii->quantity = $c->quantity;
                    $ii->tprice = $c->quantity * $c->itemPrice;

                    $resII = $dbOne->insertInvoiceItem($ii);

                    if($resII){

                    }
                    else{
                        $ok = false;
                        break;
                    }


                }
                if($ok !=false){
                    $deleted = true;
                    for($r=0;$r<count($a);$r++){
                        $del = $dbOne->deleteShoppingCartItem($a[$r]->shoppingcartitemID);
                        if($del ==true){

                        }
                        else{
                            $deleted = false;
                            break;
                        }

                    }
                    if($deleted == true){
                        header('Location: ' . '../UserPages/Orders.php');
                    }

                }
            }

        }
        else{

        }




    }







}

?>