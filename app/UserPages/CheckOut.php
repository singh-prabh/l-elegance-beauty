<?php
if(!isset($_COOKIE["account"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {
    include "../DataClasses/user.php";
    include "../DataClasses/vw_cart.php";
    include "../Processing/ForeignExchange.php";

    $user= unserialize($_COOKIE["account"]);

    include "../DatabaseConnection/DBConnect.php";
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>L'Elegance Beauty-myCart</title>
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

        .btn-remove {
            background-color: #5e5e5e;
            color: white;
        }

    </style>
</head>
<body>


<?php
include '../Structure/header.php'
?>
<div>
    <p class="form-title">
        my-Cart</p>
</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container marketing">
    <table>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Brand</th>
            <th>Product Category</th>
            <th>Product Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Remove Product from Cart</th>
            <th>Cart Total</th>
        </tr>
        <?php
        function fmtMoney($amount)
        {
            return sprintf('.%.2f', $amount);
        }

        $checkoutprice =0;
        $final =0;
        $user= unserialize($_COOKIE["account"]);
        $dbOne = new DBConnect();
        if ($dbOne->connectToDatabase()) {

            $sqlSelect = "SELECT * FROM vw_cart WHERE userID ='".$user->userID."'";


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

                    array_push($a, $cart);
                }

                for($x=0;$x<count($a);$x++){

                    $curr = $a[$x];
                    $checkoutprice = $checkoutprice + $curr->totalPrice;
                    $fx = new ForeignExchange('ZAR','USD');
                    $final = round($fx->toForeign($checkoutprice),2);
                    echo "<tr>";
                    echo "<td >$curr->itemID</td>";
                    echo "<td >$curr->itemName</td>";
                    echo "<td >$curr->itemDescription</td>";
                    echo "<td >$curr->itembrandName</td>";
                    echo "<td >$curr->categoryName</td>";
                    echo "<td >R $curr->itemPrice</td>";
                    echo "<td >$curr->quantity</td>";
                    echo "<td >R $curr->totalPrice</td>";
                    echo "<td ><button onclick=\"Remove($curr->shoppingcartitemID);\" class=\"btn btn-sm btn-remove\">Remove from Cart</button></td>";
                    echo "<td> </td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td colspan='9'></td>";
                echo "<td  >R $checkoutprice      $final</td>";
                echo "</tr>";





            }




        }


        ?>


    </table>
    <br/>
    <div id="paypal-button"></div>

</div><!-- /.row -->

<?php
include '../Structure/footer.php'
?>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
<script>
    function Remove(num){
        var alert= confirm("Are you sure you want to remove this product from your cart?");
        if (alert== true){
            window.location.href = "../../app/Processing/RemoveItemFromCart.php?id=" + num;

        }else{

        }


    }
</script>
<script>

    paypal.Button.render({

        env: 'sandbox', // Or ,'production'

        client: {
            sandbox:    'Ae6q5qk_Kms_siF5gKThfu6dLGWWM_oxW03zdA9ANpWJnz7sE9PbTImgfeV9gy3f9RYM77xQcF4oCEyO',
            production: 'AUrysuysNkliOuHTozqGu8cfPQIK5oBvmRsUXdqCixu-3RHuo14jlgGZpOatk4STDMTqEckl6BeGgpRl'
        },

        commit: true, // Show a 'Pay Now' button

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: <?php echo $final ?>, currency: 'USD' }
                        }
                    ]
                },
                experience: {
                    input_fields: {
                        no_shipping: 1
                    }
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function(payment) {


                window.alert("Your payment was made successfully! Your order will be logged now.");
                // You can now show a confirmation message to the customer
            });
        }

    }, '#paypal-button');
</script>
</body>
</html>