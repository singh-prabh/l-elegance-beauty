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

    include "../Processing/updateProductProcess.php";
    include "../DataClasses/vw_item.php";

    $user= unserialize($_COOKIE["accountA"]);
    $iID=$_GET["id"];

$dbOne = new DBConnect();

if ($dbOne->connectToDatabase()) {

    $sqlSelect = "SELECT * FROM vw_item WHERE ItemID = '".$iID."'";
    $res = mysqli_query($dbOne->myconn, $sqlSelect);


    if ($res) {


        if($resArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $One = new vw_item();
            $One->itemID = $resArray["ItemID"];
            $One->itemName = $resArray["ItemName"];
            $One->itemDescription = $resArray["ItemDescription"];
            $One->itemPrice = $resArray["ItemPrice"];
            $One->itembrandName = $resArray["Brand"];
            $One->categoryName = $resArray["Category"];
            $One->itemImage = $resArray["Image"];
            $One->activated = $resArray["activated"];
            $One->categoryID= $resArray["CategoryID"];
            $One->itembrandID= $resArray["BrandID"];


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

    </style>
</head>
<body>
<?php
include '../Structure/AdminHeader.php'
?>
<div>
    <p class="form-title">
        Products</p>
</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon "></span></div>
                <div class="panel-body">
                    <form action = "UpdateProduct.php" method= "post" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="itemID" class="col-sm-3 control-label">
                                Product ID</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="itemID" name="itemID" placeholder="Product ID" value="<?php echo $One->itemID ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="itemName" class="col-sm-3 control-label">
                                Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Product Name" value="<?php echo $One->itemName ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="itemDescription" class="col-sm-3 control-label">
                                Product Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="itemDescription" name="itemDescription" placeholder="Product Description" value="<?php echo $One->itemDescription ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-sm-3 control-label">
                                Category</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="category" name="category" placeholder="Category" value="<?php echo $One->categoryName ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brand" class="col-sm-3 control-label">
                                Brand</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand" value="<?php echo $One->itembrandName ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">
                                Product Price</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $One->itemPrice?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="activated" class="col-sm-3 control-label">
                                Activated</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="activated" name="activated" placeholder="Activated" value="<?php if($One->activated==1){ echo "True";}else{echo "False";}?>" required>
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
                                                    echo "<script type='text/javascript'>alert('You have updated your account successfully!')
                                                                window.location = 'AccountAdmin.php';
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