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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>L'Elegance Beauty-AboutUs</title>
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
        pre {
            padding: 20px;
        }

        .aboutus {
            width: 100%;
            float: none;
            position: relative;
            text-align: center;
            font-size: medium;
        }



    </style>
</head>
<body>
<?php
include '../Structure/header.php'
?>
<div>
    <p class="form-title">
        About Us</p>
</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container">

    <div class="aboutus" >
L’Elegance Beauty is a local business that is in the industry of selling beauty products as well as beauty services.<br/>

L’Elegance Beauty opened their doors for the first time in 2003 by the owner and beauty therapist, Lisle Weiermans.<br/>
        Lisle still runs her business herself successfully till this day.<br/>
Lisle did a three-year qualification and passed her international diploma.<br/>
After getting her qualifications, she gained a few years of experience and then decided to start her business.<br/>
She describes herself as having a passion for being practical and applying her skills in a practical manner.<br/>

Lisle has been the only therapist for her business for the last 14 years and her clients are very special to her and she appreciates their loyalty.<br/>

After talking to one of her clients it is clear that Lisle’s passion for her business and clients goes far beyond just giving them a beauty treatment,
she makes each client feel special and refreshed after their treatment.<br/>

    </div>



</div><!-- /.row -->

    <?php
    include '../Structure/footer.php'
    ?>
    <script src="../packages/jquery/jquery-3.2.1.min.js"></script>
    <script src="../packages/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>