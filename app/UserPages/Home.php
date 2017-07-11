<?php
if(!isset($_COOKIE["account"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>L'Elegance Beauty</title>
    <link rel="stylesheet" href="../packages/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../packages/bootstrap/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <style>
        /* BOOTSTRAP 3.x GLOBAL STYLES
-------------------------------------------------- */
        body {
            padding-bottom: 40px;
            color: #5a5a5a;
            padding-top: 50px;
        }



        /* CUSTOMIZE THE NAVBAR
        -------------------------------------------------- */

       .img-circle {
           width: 200px;
           height: 200px;
       }



        /* CUSTOMIZE THE CAROUSEL
        -------------------------------------------------- */



        /* Declare heights because of positioning of img element */
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



        /* MARKETING CONTENT
        -------------------------------------------------- */

        /* Pad the edges of the mobile views a bit */
        .marketing {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Center align the text within the three columns below the carousel */
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






        /* RESPONSIVE CSS
        -------------------------------------------------- */

        @media (min-width: 768px) {

            /* Remve the edge padding needed for mobile */
            .marketing {
                padding-left: 0;
                padding-right: 0;
            }

            /* Navbar positioning foo */
            .navbar-wrapper {
                margin-top: 20px;
                margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
            }
            /* The navbar becomes detached from the top, so we round the corners */
            .navbar-wrapper .navbar {
                border-radius: 4px;
            }

            /* Bump up size of carousel content */
            .carousel-caption p {
                margin-bottom: 20px;
                font-size: 21px;
                line-height: 1.4;
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

    <!-- Three columns of text below the carousel -->
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

<?php
include '../Structure/footer.php'
?>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>