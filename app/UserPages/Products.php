<?php
if(!isset($_COOKIE["account"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {
        include '../DataClasses/vw_item.php';
    include '../DatabaseConnection/DBConnect.php';
        }
?>

<!DOCTYPE html>
<html>
<head>
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


        .img-product {
            width: 200px;
            height: 200px;
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
            letter-spacing: 5px;
            padding-top: 0;
            padding-bottom: 20px;
        }



    </style>
</head>
<body>
<?php
include '../Structure/header.php';
?>
<div>
    <p class="form-title">
        Products</p>
</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container marketing">
    <div class="row">
        <?php
            $dbOne = new DBConnect();
            if ($dbOne->connectToDatabase()) {

                $sqlSelect = "SELECT * FROM vw_item";
                $res = mysqli_query($dbOne->myconn, $sqlSelect);

                if ($res) {

                    $a = array();
                    while ($resArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                        $item = new vw_item();
                        $item->itemID = $resArray["ItemID"];
                        $item->itemName = $resArray["ItemName"];
                        $item->itemDescription = $resArray["ItemDescription"];
                        $item->itemPrice = $resArray["ItemPrice"];
                        $item->itembrandID = $resArray["BrandID"];
                        $item->itembrandName = $resArray["Brand"];
                        $item->categoryName = $resArray["Category"];
                        $item->categoryName = $resArray["CategoryID"];
                        $item->itemImage = $resArray["Image"];

                        array_push($a, $item);
                    }

                    for ($i = 0; $i < count($a); $i++) {
                        $s = $a[$i];
                        echo <<<EOD
                    <div class="col-md-4 text-center col-sm-12">
                        <img class="img-product" src="../Images/pic1.jpg">
                        <h3>$s->itemName</h3>
                        <p>$s->itemDescription</p>
                        <p> R $s->itemPrice</p>
                        <p> Brand: $s->itembrandName</p>
                        <button onclick="productPage($s->itemID);">View Product</button>
                        <br/>
                    </div>
EOD;


                    }

                }
            }
            else{
                echo "poop";
            }
        ?>
    </div>

</div><!-- /.row -->

<?php
include '../Structure/footer.php'
?>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
<script>
    function productPage(num){
        window.location.href = "Product.php?id=" + num;
    }
</script>
</body>
</html>