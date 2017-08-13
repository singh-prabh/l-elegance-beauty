<?php
if(!isset($_COOKIE["accountA"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {
    include "../DataClasses/user.php";
    include "../DatabaseConnection/DBConnect.php";
    include "../DataClasses/itembrand.php";
    require "../Processing/AddBrandProcess.php";
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
    $c= array();
    $b= array();



    $user= unserialize($_COOKIE["accountA"]);



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
    <title>L'Elegance Beauty-Brand</title>
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

    </style>
</head>
<body>
<?php
include '../Structure/AdminHeader.php'
?>
<div>
    <p class="form-title">
        Brand</p>
</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon "></span></div>
                <div class="panel-body">
                    <form action = "AddBrand.php" method= "post" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label for="brand" class="col-sm-3 control-label">
                                Brand Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand Name"  required>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-sm btn-login">
                                    Add Brand</button>

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
                                                    echo "<script type='text/javascript'>alert('You have added a brand successfully!')
                                                                window.location = 'ProductsAdmin.php';
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