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
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {

}
?>
<?php
include "../DataClasses/vw_item.php";


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


        .btn-update {
            background-color: #47c4b6;
            color: white;
        }
        .btn-add {


            text-align: center;
            padding: 10px;



        }

        #name {

            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 20%;
            font-size: 12px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }


    </style>
</head>
<body>
<?php
include '../Structure/AdminHeader.php'
?>
<div align="center">
    <p class="form-title">
        Products</p>

</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container marketing">

    <div align="left">
        <button onclick="addProduct();" class="btn btn-sm btn-add"><b>Add Product</b></button>&nbsp;&nbsp;
        <button onclick="addCategory();" class="btn btn-sm btn-add"><b>Add Category</b></button>&nbsp;&nbsp;
        <button onclick="addBrand();" class="btn btn-sm btn-add"><b>Add Brand</b></button>

    </div>
    <br/>
    <table id="table">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Price (ZAR)</th>
            <th>Product Brand</th>
            <th>Product Category</th>
            <th>Product Activated</th>

            <th>Update Product</th>
            <th>Remove Product</th>

        </tr>
        <?php
        $dbOne = new DBConnect();

        if ($dbOne->connectToDatabase()) {

            $sqlSelect = "SELECT * FROM vw_item ORDER BY activated";
            $res = mysqli_query($dbOne->myconn, $sqlSelect);


            if ($res ) {

                $a = array();
                while($resArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                    $One = new vw_item();
                    $One->itemID = $resArray["ItemID"];
                    $One->itemName = $resArray["ItemName"];
                    $One->itemDescription = $resArray["ItemDescription"];
                    $One->itemPrice = $resArray["ItemPrice"];
                    $One->itembrandName = $resArray["Brand"];
                    $One->categoryName = $resArray["Category"];
                    $One->itemImage = $resArray["Image"];
                    $One->activated = $resArray["activated"];


                    array_push($a,$One);
                }

                for($i=0;$i<count($a);$i++){
                    $s = $a[$i];
                    echo <<<EOD
                    <tr>
                        <td>$s->itemID</td>
                         <td>$s->itemName</td>
                         <td>$s->itemDescription</td>
                         <td>$s->itemPrice</td>
                         <td>$s->itembrandName</td>
                         <td>$s->categoryName</td>
EOD;
                    if($s->activated==0) {
                        echo "<td >False</td>";
                    }
                    else{
                        echo "<td >True</td>";
                    }
                    echo <<<EOD
                         <td><button onclick="productUpdate($s->itemID);" class="btn btn-sm btn-update">Update Product</button></td>
                         <td><button onclick="productRemove($s->itemID);" class="btn btn-sm ">Remove Product</button></td>
                    </tr>
EOD;



                }

            }
        }

        ?>

    </table>

</div><!-- /.row -->

<?php
include '../Structure/footer.php'
?>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
<script>
    function productUpdate(num){
        window.location.href = "UpdateProduct.php?id=" + num;
    }
</script>
<script>
    function productRemove(num){
        var ok =window.confirm("Are you sure you want to remove this product?");
        if(ok==true){
            window.location.href = "RemoveProduct.php?id=" + num;
        }
        else{

        }

    }
    function addProduct(){

            window.location.href = "AddProduct.php";


    }
    function addCategory(){

        window.location.href = "AddCategory.php";


    }
    function addBrand(){

        window.location.href = "AddBrand.php";


    }


</script>

</body>
</html>