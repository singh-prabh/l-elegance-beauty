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

}
?>
<?php
include "../DataClasses/service.php";

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

<div class="container marketing">
    <div align="left">
        <button onclick="AddService()" class="btn btn-sm btn-add"><b>Add Treatment</b></button>&nbsp;&nbsp;
        <button onclick="AddCategory()" class="btn btn-sm btn-add"><b>Add Category</b></button>


    </div>
    <br/>
    <table>
        <tr>
            <th>Treatment Name</th>
            <th>Treatment Description</th>
            <th>Treatment Price (ZAR)</th>
            <th>Treatment Category</th>
            <th>Update Treatment</th>
            <th>Remove Treatment</th>

        </tr>
        <?php
        $dbOne = new DBConnect();

        if ($dbOne->connectToDatabase()) {

            $sqlSelect = "SELECT * FROM service ";
            $res = mysqli_query($dbOne->myconn, $sqlSelect);

            $sqlCat = "SELECT * FROM category ";
            $resCat = mysqli_query($dbOne->myconn, $sqlCat);


            if ($res && $resCat) {
                $ac=array();
                while($resArrayCat=mysqli_fetch_array($resCat, MYSQLI_ASSOC)){
                    $catOne = new service();
                    $catOne->categoryID = $resArrayCat["id_category"];
                    $catOne->categoryName = $resArrayCat["categoryName"];
                    array_push($ac,$catOne);
                }

                $a = array();
                while($resArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                    $serviceOne = new service();
                    $serviceOne->serviceID = $resArray["id_service"];
                    $serviceOne->serviceName = $resArray["serviceName"];
                    $serviceOne->serviceDescription = $resArray["serviceDescription"];
                    $serviceOne->servicePrice = $resArray["servicePrice"];
                    $serviceOne->categoryID = $resArray["id_category"];
                    foreach($ac as $struct) {
                        if ($serviceOne->categoryID == $struct->categoryID) {
                            $item = $struct->categoryName;
                            break;
                        }
                    }
                    $serviceOne->categoryName = $item;
                    array_push($a,$serviceOne);
                }

                for($i=0;$i<count($a);$i++){
                    $s = $a[$i];
                    echo <<<EOD
                    <tr>
                         <td>$s->serviceName</td>
                         <td>$s->serviceDescription</td>
                         <td>$s->servicePrice</td>
                         <td>$s->categoryName</td>
                         <td><button onclick="sUpdate($s->serviceID);" class="btn btn-sm btn-update">Update Treatment</button></td>
                         <td><button onclick="sRemove($s->serviceID);" class="btn btn-sm ">Remove Treatment</button></td>
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
    function sUpdate(num){
        window.location.href = "UpdateService.php?id=" + num;
    }
</script>
<script>
    function sRemove(num){
        var ok =window.confirm("Are you sure you want to remove this treatment?");
        if(ok==true){
            window.location.href = "ServiceRemove.php?id=" + num;
        }
        else{

        }

    }
    function AddService(){

        window.location.href = "AddTreatment.php";


    }
    function AddCategory(){

        window.location.href = "AddCategory.php";


    }
</script>

</body>
</html>