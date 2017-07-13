<?php
if(!isset($_COOKIE["account"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {
    include '../DatabaseConnection/DBConnect.php';
    include '../DataClasses/user.php';
    include '../DataClasses/vw_order.php';
    include '../DataClasses/order.php';

    $user= unserialize($_COOKIE["account"]);

}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>L'Elegance Beauty-myOrders</title>
    <link rel="stylesheet" href="../packages/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../packages/bootstrap/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <style>
        /* BOOTSTRAP 3.x GLOBAL STYLES
-------------------------------------------------- */
        body {
            padding-bottom: 40px;
            color: #5a5a5a;
            padding-top: 30px;
        }




        p.form-title
        {
            font-family: 'Open Sans' , sans-serif;
            font-size: 30px;
            font-weight: 600;
            text-align: center;
            color: #3c3c3c;
            margin-top: 5%;
            text-transform: uppercase;
            letter-spacing: 4px;
            padding-top: 0px;
            padding-bottom: 20px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
</head>
<body>
<?php
include '../Structure/header.php'
?>
<div>
    <p class="form-title">
        Contact Us</p>
</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container marketing">
    <table>
        <tr>
            <th>OrderID</th>
            <th>Order Completion Status</th>
            <th>Order Collection Status</th>
            <th>Order Date</th>
            <th>Total Price</th>
            <th>Quantity</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Price</th>
            <th>Brand</th>
            <th>Category</th>

        </tr>
        <?php
            $dbOne = new DBConnect();
            if ($dbOne->connectToDatabase()) {

                $sqlSelect = "SELECT * FROM vw_order WHERE UserID='".$user->userID."'";
                $res = mysqli_query($dbOne->myconn, $sqlSelect);

                if ($res) {

                    $a = array();
                    while ($resArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

                        $order = new vw_order();

                        $order->orderID = $resArray["OrderID"];
                        $order->orderStatusCom = $resArray["orderStatusCom"];
                        $order->orderStatusCol = $resArray["orderStatusCol"];
                        $order->orderDate = $resArray["orderDate"];
                        $order->totalPrice = $resArray["totalPrice"];


                        $order->UserID = $resArray["UserID"];
                        $order->invoiceitemID = $resArray["invoiceitemID"];
                        $order->quantity = $resArray["quantity"];
                        $order->price = $resArray["price"];
                        $order->itemID = $resArray["ItemID"];
                        $order->itemName = $resArray["ItemName"];
                        $order->itemDescription = $resArray["ItemDescription"];
                        $order->itemPrice = $resArray["ItemPrice"];
                        $order->itembrandID = $resArray["BrandID"];
                        $order->itembrandName = $resArray["BrandName"];
                        $order->categoryName = $resArray["CategoryName"];
                        $order->categoryID = $resArray["CategoryID"];
                        $order->itemImage = $resArray["Image"];

                        array_push($a, $order);
                    }

                    $sqlSelectO = "SELECT * FROM order WHERE id_user ='".$user->userID."'";
                    $resO = mysqli_query($dbOne->myconn, $sqlSelectO);

                    if ($resO) {

                        $aO = array();
                        while ($resArrayO = mysqli_fetch_array($resO, MYSQLI_ASSOC)) {
                            $orderO = new order();
                            $orderO->orderID = $resArrayO["id_order"];
                            $orderO->userID = $resArrayO["id_user"];
                            $orderO->statusCompleted = $resArrayO["statusCompleted"];
                            $orderO->orderDate = $resArrayO["orderDate"];
                            $orderO->statusCollected = $resArrayO["statusCollected"];
                            $orderO->totalPrice = $resArrayO["totalPrice"];

                            array_push($aO, $orderO);
                        }


                        for ($i = 0; $i < count($aO); $i++) {
                            $o= $aO[$i];
                            $arr = array();

                            for($j=0; $j<count($a);$j++){
                                $s = $a[$j];
                                if($s->orderID==$o->orderID){
                                    array_push($arr, $s);
                                }
                            }

                            $numItem = count($arr);
                            for($x=0;$x<$numItem; $x++){
                                $curr=$arr[$x];
                                echo "<tr>";
                              if($x==0){
                                echo "<td rowspan=\"$numItem\">$curr->orderID</td>";
                                echo "<td rowspan=\"$numItem\">$curr->orderStatusCom</td>";
                                echo "<td rowspan=\"$numItem\">$curr->orderStatusCol</td>";
                                echo "<td rowspan=\"$numItem\">$curr->orderDate</td>";
                                echo "<td rowspan=\"$numItem\">$curr->totalPrice</td>";
                              }
                              echo "<td >$curr->quantity</td>";
                              echo "<td >$curr->itemName</td>";
                              echo "<td >$curr->itemDescription</td>";
                              echo "<td >$curr->price</td>";
                              echo "<td >$curr->itembrandName</td>";
                              echo "<td >$curr->categoryName</td>";
                              echo "</tr>";


                            }



                        }
                    }




                }
            }
            else{
                echo "poop";
            }
        ?>



    </table>

</div><!-- /.row -->

<?php
include '../Structure/footer.php'
?>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>