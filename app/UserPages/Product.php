
<?php
include "../DataClasses/vw_item.php";
include "../DatabaseConnection/DBConnect.php";

if(!isset($_COOKIE["account"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {
    $user= unserialize($_COOKIE["account"]);
    $iID=$_GET["id"];
    $dbOne = new DBConnect();
    if ($dbOne->connectToDatabase()) {

        $sqlSelect = "SELECT * FROM vw_item WHERE ItemID ='".$iID."'";
        $res = mysqli_query($dbOne->myconn, $sqlSelect);

        if ($res) {


            if($resArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                $item = new vw_item();
                $item->itemID = $resArray["ItemID"];
                $item->itemName = $resArray["ItemName"];
                $item->itemDescription = $resArray["ItemDescription"];
                $item->itemPrice = $resArray["ItemPrice"];
                $item->itembrandID = $resArray["BrandID"];
                $item->itembrandName = $resArray["Brand"];
                $item->categoryName = $resArray["Category"];
                $item->categoryID = $resArray["CategoryID"];
                $item->itemImage = $resArray["Image"];


            }
        }
        else{
            echo "p2";
        }
    }

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
            table-layout: fixed;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .btn-login {
            background-color: #47c4b6;
            color: white;
        }

        .spinner {
            width: 100px;
        }
        .spinner input {
            text-align: right;
        }
        .input-group-btn-vertical {
            position: relative;
            white-space: nowrap;
            width: 1%;
            vertical-align: middle;
            display: table-cell;
        }
        .input-group-btn-vertical > .btn {
            display: block;
            float: none;
            width: 100%;
            max-width: 100%;
            padding: 8px;
            margin-left: -1px;
            position: relative;
            border-radius: 0;
        }
        .input-group-btn-vertical > .btn:first-child {
            border-top-right-radius: 4px;
        }
        .input-group-btn-vertical > .btn:last-child {
            margin-top: -2px;
            border-bottom-right-radius: 4px;
        }
        .input-group-btn-vertical i{
            position: absolute;
            top: 0;
            left: 1px;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

    </style>
</head>
<body>
<?php
include '../Structure/header.php'
?>
<div>
    <p class="form-title">
        Products</p>
</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container">
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8 col-sm-12">
            <div style= "text-align: center;" ></div>
            <table>

                <tr>
                    <td><b>Product ID:</b></td>
                    <?php
                    echo "<td>$item->itemID</td>";
                    ?>
                </tr>
                <tr>
                    <td><b>Product Name:</b></td>
                    <?php
                    echo "<td>$item->itemName</td>";
                    ?>


                </tr>
                <tr>
                    <td><b>Product Description:</b></td>
                    <?php
                    echo "<td>$item->itemDescription</td>";
                    ?>

                </tr>
                <tr>
                    <td><b>Product Price:</td>
                    <?php
                    echo "<td>R $item->itemPrice</b></td>";
                    ?>

                </tr>
                <tr>
                    <td><b>Product Brand:</td>
                    <?php
                    echo "<td>$item->itembrandName</b></td>";
                    ?>

                </tr>
                <tr>
                    <td><b>Product Category:</td>
                    <?php
                    echo "<td>$item->categoryName</b></td>";
                    ?>

                </tr>
                <tr>
                    <td><b>Product Image:</td>
                    <td>
                        <?php
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($item->itemImage) .'" />';
                        ?>
                    </td>

                </tr>

            </table>
            <br/>
            <form action = "AddToCart.php" method= "post" class="form-horizontal" role="form">
                <div class="input-group spinner">
                    <input type="number" class="form-control" name="quantity" value="1" min="1"  oninput="validity.valid||(value='');">
                    <div class="input-group-btn-vertical">
                        <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-triangle-top"></i></button>
                        <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-triangle-bottom"></i></button>

                    </div>
                </div>
                <input type="hidden" name="itemID" value="<?php echo $item->itemID ?>">
                <input type="hidden" name="price" value="<?php echo $item->itemPrice ?>">
                <br/>
                <button type="submit" class="btn btn-sm btn-login"><b>Add to Cart</b></button>
            </form>



        </div>
    </div>
</div><!-- /.row -->

<?php
include '../Structure/footer.php'
?>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
<script>
    (function ($) {
        $('.spinner .btn:first-of-type').on('click', function() {
            $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
        });
        $('.spinner .btn:last-of-type').on('click', function() {
            if($('.spinner input').val()==1){

            }
            else {
                $('.spinner input').val(parseInt($('.spinner input').val(), 10) - 1);
            }
        });
    })(jQuery);
</script>
</body>
</html>
