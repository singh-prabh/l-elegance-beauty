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


?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>L'Elegance Beauty-Users</title>
    <link rel="stylesheet" href="../packages/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../packages/bootstrap/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <style>

        body {
            padding-bottom: 40px;
            color: #5a5a5a;
            padding-top: 30px;
        }

        p.form-title {
            font-family: 'Open Sans', sans-serif;
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


        }
        .btn-update {
            background-color: #47c4b6;
            color: white;
        }


        @media
        only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px)  {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr { border: 1px solid #ccc; }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }

            /*
            Label the data
            */
            td:nth-of-type(1):before { content: "User ID:"; }
            td:nth-of-type(2):before { content: "User Name:"; }
            td:nth-of-type(3):before { content: "User Surname:"; }
            td:nth-of-type(4):before { content: "User Contact Number:"; }
            td:nth-of-type(5):before { content: "User Email:"; }
            td:nth-of-type(6):before { content: "Activated:"; }
            td:nth-of-type(7):before { content: "Admin User:"; }
            td:nth-of-type(8):before { content: "Update User:"; }

        }




    </style>
</head>
<body>
<?php
include '../Structure/AdminHeader.php'
?>
<div>
    <p class="form-title">
        Users</p>
</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container marketing">
    <table>
        <thead>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>User Surname</th>
            <th>User Contact Number</th>
            <th>User Email</th>
            <th>Activated</th>
            <th>Admin User</th>
            <th>Update User</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $dbOne = new DBConnect();

        if ($dbOne->connectToDatabase()) {

            $sqlSelect = "SELECT * FROM user ";
            $res = mysqli_query($dbOne->myconn, $sqlSelect);

            if ($res) {
                $a = array();
                while($resArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){

                    if($resArray["id_user"] == $user->userID){

                    }
                    else{
                        $One = new user();
                        $One->userID = $resArray["id_user"];
                        $One->userName = $resArray["userName"];
                        $One->userSurname = $resArray["userSurname"];
                        $One->userContact = $resArray["userContact"];
                        $One->userEmail = $resArray["userEmail"];
                        $One->userPassword = $resArray["userPassword"];
                        $One->activated = $resArray["activated"];
                        $One->admin = $resArray["admin"];
                        array_push($a,$One);
                    }

                }

                for($i=0;$i<count($a);$i++){
                    $s = $a[$i];
                    echo <<<EOD
                    <tr>
                         <td>$s->userID</td>
                         <td>$s->userName</td>
                         <td>$s->userSurname</td>
                         <td>$s->userContact</td>
                         <td>$s->userEmail</td>
EOD;
                    if($s->activated==0){
                       echo "<td>No</td>";
                    }
                    else{
                       echo "<td>Yes</td>";
                    }

                    if($s->admin==0){
                       echo "<td>No</td>";
                    }
                    else{
                        echo "<td>Yes</td>";
                    }
                    echo <<<EOD
                    <td><button onclick="userUpdate($s->userID);" class="btn btn-sm btn-update">Update User</button></td></tr>
EOD;
                }

            }
        }

        ?>
        </tbody>
    </table>

</div><!-- /.row -->

<?php
include '../Structure/footer.php'
?>
<script>
    function userUpdate(num){
        window.location.href = "UpdateUser.php?id=" + num;
    }
</script>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>