
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
            padding-top: 0px;
            padding-bottom: 20px;
        }

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

<div class="container marketing">
    <div class="row">
        <?php
        for( $i = 0; $i<5; $i++ ) {
            echo <<<EOD
            <div class="col-md-4 text-center col-sm-12">
            <img class="img-product" src="../Images/pic1.jpg">
            <h2>Search for Products</h2>
            <p>Find the perfect product for your skin!</p>
            <button onclick="productPage($i);">Press me</button>
        </div>
EOD;
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