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
if(!isset($_COOKIE["account"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {

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
    <title>L'Elegance Beauty</title>
    <link rel="stylesheet" href="../packages/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../packages/bootstrap/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <style>

        body {
            padding-bottom: 40px;
            color: #5a5a5a;
            padding-top: 50px;
        }


       .img-circle {
           width: 200px;
           height: 200px;
       }


        .carousel .item {
            height: 400px;
            background-color:#555;
        }
        .carousel img {
            position: absolute;
            top: 0;
            left: 0;
            min-height: 400px;
        }


        .marketing {
            padding-left: 15px;
            padding-right: 15px;
        }

        .marketing .col-lg-4 {
            text-align: center;
            margin-bottom: 20px;
        }
        .marketing h2 {
            font-weight: normal;
        }
        .marketing .col-lg-4 p {
            margin-left: 10px;
            margin-right: 10px;
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
            padding-top: 50px;
            padding-bottom: 100px;
        }




        @media (min-width: 768px) {


            .marketing {
                padding-left: 0;
                padding-right: 0;
            }


            .navbar-wrapper {
                margin-top: 20px;
                margin-bottom: -90px;
            }

            .navbar-wrapper .navbar {
                border-radius: 4px;
            }


            .carousel-caption p {
                margin-bottom: 20px;
                font-size: 21px;
                line-height: 1.4;
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
        Welcome to L'Elegance Beauty</p>

</div>

<div class="container marketing">


    <div class="row">
        <div class="col-md-4 text-center col-sm-12">
            <img class="img-circle" src="../Images/pic1.jpg">
            <h2>Search for Products</h2>
            <p>Find the perfect product for your skin!</p>

        </div>
        <div class="col-md-4 text-center col-sm-12">
            <img class="img-circle" src="../Images/pic2.jpg">
            <h2>Order Products Online</h2>
            <p>You are now able to order your favorite products online!</p>

        </div>
        <div class="col-md-4 text-center col-sm-12">
            <img class="img-circle" src="../Images/pic3.jpg">
            <h2>View all Treatments</h2>
            <p>You can view the list of treatments available!</p>

        </div>
    </div><!-- /.row -->
    <div style="text-align:center;">
        <a style ="color: black;  "href="../UserManual/UserManualNormal.pdf" target=_tab>
            User Manual Document</a>
    </div>

<?php
include '../Structure/footer.php'
?>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>