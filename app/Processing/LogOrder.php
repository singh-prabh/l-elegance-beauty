<?php
/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-17
 * Time: 08:41 PM
 */
echo "<script>window.alert(\"Your payment was made successfully! Your order will be logged now.\");</script>";
include "../DataClasses/user.php";
include "../DataClasses/vw_cart.php";
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
        $order->orderDate= date("Y-m-d h:i:sa");
        $order->statusCollected = 0;
        $order->totalPrice = $orderTotal;

        $orderid = $dbOne->insertOrder($order);
        if($orderid!=false){

            $ok=true;
            for($i=0;$i<count($a);$i++){
                $c = $a[$i];

                $ii = new invoiceitem();
                $ii->itemID = $c->itemID;
                $ii->orderID = $orderid;
                $ii->price = $c->itemPrice;
                $ii->quantity = $c->quantity;

                $resII = $dbOne->insertInvoiceItem($ii);

                if($resII){

                }
                else{
                    $ok = false;
                    break;
                }


            }
            if($ok !=false){
                header('Location: ' . '../UserPages/Orders.php');
            }
        }




    }







}

?>