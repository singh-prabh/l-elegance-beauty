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

?>
<?php
include "../DataClasses/itembrand.php";


?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>L'Elegance Beauty-Brands</title>
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
<div >
    <p class="form-title">
        Brands</p>

</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container">
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8 col-sm-12">
            <div align="left">

                <button onclick="addBrand();" class="btn btn-sm btn-add"><b>Add Brand</b></button>&nbsp;&nbsp;


            </div>
            <br/>
            <table id="table">
                <tr>
                    <th>Brand ID</th>
                    <th>Brand Name</th>


                </tr>
                <?php
                $dbOne = new DBConnect();

                if ($dbOne->connectToDatabase()) {

                    $sqlSelect = "SELECT * FROM itembrand ";
                    $res = mysqli_query($dbOne->myconn, $sqlSelect);


                    if ($res ) {

                        $a = array();
                        while($resArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                            $One = new itembrand();
                            $One->itembrandID = $resArray["id_itembrand"];
                            $One->itembrandName = $resArray["itembrandName"];

                            array_push($a,$One);
                        }

                        for($i=0;$i<count($a);$i++){
                            $s = $a[$i];
                            echo <<<EOD
                    <tr>
                        <td>$s->itembrandID</td>
                         <td>$s->itembrandName</td>
                         
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

            function addBrand(){

                window.location.href = "AddBrand.php";


            }



        </script>

</body>
</html>