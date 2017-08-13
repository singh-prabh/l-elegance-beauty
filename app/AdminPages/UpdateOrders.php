<?php
if(!isset($_COOKIE["accountA"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {
    include "../DataClasses/vw_order.php";
    include "../DataClasses/order.php";
    include "../DataClasses/user.php";
    include "../DatabaseConnection/DBConnect.php";
    require "../Processing/UpdateOrdersProcess.php";
    $dbOne = new DBConnect();
    $user = unserialize($_COOKIE["accountA"]);

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

if(!isset($_COOKIE["accountA"])) {
    header('Location: ' . '../../../index.php'); /* Redirect browser */
    die();
} else {





    $user = unserialize($_COOKIE["accountA"]);
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
    <title>L'Elegance Beauty-Products</title>
    <link rel="stylesheet" href="../packages/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../packages/bootstrap/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <style>

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


        .btn-login {
            background-color: #47c4b6;
            color: white;
        }

    </style>
</head>
<body>
<?php
include '../Structure/AdminHeader.php'
?>
<div>
    <p class="form-title">
        Orders</p>
</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >
<div class="container marketing">
    <table>
        <tr>
            <th>OrderID</th>
            <th>Order Completion Status</th>
            <th>Order Collection Status</th>
            <th>Order Date</th>
            <th>Total Price per Order</th>
            <th>Payment Completed</th>
            <th>Product Name</th>
            <th>Product Description</th>

            <th>Brand</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price per Product</th>


        </tr>
<?php
$orderO = new order();
if(empty($_GET)){
    $oID=$_POST['oID'];
}
else{
    $oID=$_GET["id"];
}


$dbOne = new DBConnect();

if ($dbOne->connectToDatabase()) {

    $sqlSelect = "SELECT * FROM vw_order WHERE OrderID = '".$oID."'";
    $res = mysqli_query($dbOne->myconn, $sqlSelect);


    if ($res) {

        $arr = array();
        while($resArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $order = new vw_order();

            $order->orderID = $resArray["OrderID"];
            $order->orderStatusCom = $resArray["orderStatusCom"];
            $order->orderStatusCol = $resArray["orderStatusCol"];
            $order->orderDate = $resArray["orderDate"];
            $order->totalPrice = $resArray["totalPrice"];
            $order->paymentCompleted = $resArray["paymentCompleted"];

            $order->UserID = $resArray["UserID"];
            $order->invoiceitemID = $resArray["invoiceitemID"];
            $order->invoiceitemtotalprice = $resArray["invoiceTotalPrice"];

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

            array_push($arr, $order);
        }
        $sqlSelectO= "SELECT * FROM `order` WHERE id_order = '".$oID."'";
        $resO = mysqli_query($dbOne->myconn, $sqlSelectO);

        if ($resO) {


            if ($resArrayO = mysqli_fetch_array($resO, MYSQLI_ASSOC)) {
                $orderO = new order();
                $orderO->orderID = $resArrayO["id_order"];
                $orderO->userID = $resArrayO["id_user"];
                $orderO->statusCompleted = $resArrayO["statusCompleted"];
                $orderO->orderDate = $resArrayO["orderDate"];
                $orderO->statusCollected = $resArrayO["statusCollected"];
                $orderO->totalPrice = $resArrayO["totalPrice"];
                $orderO->paymentCompleted = $resArrayO["paymentCompleted"];


                $numItem = count($arr);
                for($x=0;$x<$numItem; $x++){
                    $curr=$arr[$x];
                    echo "<tr>";
                    if($x==0){
                        echo "<td rowspan=\"$numItem\">$curr->orderID</td>";
                        if($curr->orderStatusCom==0){
                            echo "<td rowspan=\"$numItem\">No</td>";
                        }
                        else{
                            echo "<td rowspan=\"$numItem\">Yes</td>";
                        }
                        if($curr->orderStatusCol==0) {
                            echo "<td rowspan=\"$numItem\">No</td>";
                        }
                        else{
                            echo "<td rowspan=\"$numItem\">Yes</td>";
                        }

                        echo "<td rowspan=\"$numItem\">$curr->orderDate</td>";
                        echo "<td rowspan=\"$numItem\">R $curr->totalPrice</td>";
                        if($curr->paymentCompleted==0) {
                            echo "<td rowspan=\"$numItem\">No</td>";
                        }
                        else{
                            echo "<td rowspan=\"$numItem\">Yes</td>";
                        }
                    }

                    echo "<td >$curr->itemName</td>";
                    echo "<td >$curr->itemDescription</td>";

                    echo "<td >$curr->itembrandName</td>";
                    echo "<td >$curr->categoryName</td>";
                    echo "<td >$curr->quantity</td>";
                    echo "<td >R $curr->price</td>";
                    echo "<td >R $curr->invoiceitemtotalprice</td>";

                    echo "</tr>";


                }
            }

        }
        else{
            echo $sqlSelectO;
        }


    }




}
?>
    </table>
    <br/>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon "></span>Update Order</div>
                <div class="panel-body">
                    <form action = "UpdateOrders.php" method= "post" class="form-horizontal" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="orderID" class="col-sm-3 control-label">
                                Order ID</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="oID" name="oID" placeholder="Order ID" value="<?php echo $orderO->orderID ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="itemName" class="col-sm-3 control-label">
                                Order Completed</label>
                            <div class="col-sm-9">
                                <select name="completed" id="completed" class="form-control">
                                    <?php
                                    if($orderO->statusCompleted ==1){
                                        echo "<option id=\"1\" value=\"1\" selected>Yes</option>";
                                        echo "<option id=\"0\" value=\"0\">No</option>";
                                    }
                                    else{
                                        echo "<option id=\"1\" value=\"1\" >Yes</option>";
                                        echo "<option id=\"0\" value=\"0\" selected>No</option>";
                                    }
                                    ?>



                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="itemDescription" class="col-sm-3 control-label">
                                Order Collected</label>
                            <div class="col-sm-9">
                                <select name="collected" id="collected" class="form-control">
                                    <?php
                                    if($orderO->statusCollected ==1){
                                        echo "<option id=\"1\" value=\"1\" selected>Yes</option>";
                                        echo "<option id=\"0\" value=\"0\">No</option>";
                                    }
                                    else{
                                        echo "<option id=\"1\" value=\"1\" >Yes</option>";
                                        echo "<option id=\"0\" value=\"0\" selected>No</option>";
                                    }
                                    ?>



                                </select>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-sm btn-login">
                                    Update</button>

                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <?php if (isset($_SESSION['errors'])): ?>
                                    <div class="form-errors" style="color: red;">
                                        </br>
                                        <?php foreach($_SESSION['errors'] as $error): ?>
                                            <p><?php if($error=="true")
                                                {
                                                    echo "<script type='text/javascript'>alert('You have updated the product successfully!')
                                                                window.location = 'OrdersAdmin.php';
                                                              </script>";

                                                }
                                                else {
                                                    echo $error;
                                                } ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif;

                                ?>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include '../Structure/footer.php'
?>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>