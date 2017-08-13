<?php
if(!isset($_COOKIE["accountA"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {
    include "../DataClasses/user.php";
    include "../DatabaseConnection/DBConnect.php";
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

    include "../DataClasses/category.php";
    require "../Processing/AddTreatmentProcess.php";


    $user= unserialize($_COOKIE["accountA"]);

    $dbOne = new DBConnect();

    if ($dbOne->connectToDatabase()) {
        $c= array();


        $sqlC = "SELECT * FROM category ";
        $resc = mysqli_query($dbOne->myconn, $sqlC);




        if ( $resc) {


            while($resArrayc = mysqli_fetch_array($resc, MYSQLI_ASSOC)) {
                $cOne = new category();
                $cOne->categoryID = $resArrayc["id_category"];
                $cOne->categoryName = $resArrayc["categoryName"];
                array_push($c,$cOne);
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
    <title>L'Elegance Beauty-Treatments</title>
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
       Treatments</p>
</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon "></span></div>
                <div class="panel-body">
                    <form action = "AddTreatment.php" method= "post" class="form-horizontal" role="form" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="sName" class="col-sm-3 control-label">
                                Treatment Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="sName" name="sName" placeholder="Treatment Name"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sDescription" class="col-sm-3 control-label">
                                Treatment Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="sDescription" name="sDescription" placeholder="Treatment Description"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-sm-3 control-label">
                                Category</label>
                            <div class="col-sm-9">
                                <select name="category" id="category" class="form-control">
                                    <?php
                                    for($i=0;$i<count($c);$i++){

                                        echo "<option id=".$c[$i]->categoryID." value=".$c[$i]->categoryID." >".$c[$i]->categoryName."</option>.";

                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">
                                Treatment Price (ZAR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="price" name="price" placeholder="Price"  required>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-sm btn-login">
                                    Add Treatment</button>

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
                                                    echo "<script type='text/javascript'>alert('You have added the treatment successfully!')
                                                                window.location = 'ServicesAdmin.php';
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