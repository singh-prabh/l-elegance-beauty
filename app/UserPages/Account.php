<?php
include "../DataClasses/user.php";
if(!isset($_COOKIE["account"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {
    $user= unserialize($_COOKIE["account"]);
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
    <title>L'Elegance Beauty-myAccount</title>
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
include '../Structure/header.php'
?>
<div>
    <p class="form-title">
        my-Account</p>
</div>
<hr style="border-color:#47c4b6; border-width: 4px;" >

<div class="container">
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8 col-sm-12">
            <div style= "text-align: center;" ><b>You are logged in as the following user</b></div>
            <table>

                <tr>
                    <td><b>Name:</b></td>
                    <?php
                    echo "<td>$user->userName</td>";
                    ?>
                </tr>
                <tr>
                    <td><b>Surname:</b></td>
                    <?php
                    echo "<td>$user->userSurname</td>";
                    ?>


                </tr>
                <tr>
                    <td><b>Contact Number:</b></td>
                    <?php
                    echo "<td>$user->userContact</td>";
                    ?>

                </tr>
                <tr>
                    <td><b>Email:</td>
                    <?php
                    echo "<td>$user->userEmail</b></td>";
                    ?>

                </tr>

            </table>
            <br/>
            <button onclick="window.location.href='UpdateAccount.php'" class="btn btn-sm btn-login"><b>Update Account</b></button>
        </div>
    </div>
</div><!-- /.row -->

<?php
include '../Structure/footer.php'
?>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>