<?php
require 'app/Register_LogIn/loginProcess.php';
//<link rel="stylesheet" href="app/packages/bootstrap/css/bootstrap-theme.min.css" crossorigin="anonymous">
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>L'Elegance Beauty</title>
    <link rel="stylesheet" href="app/packages/bootstrap/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="app/packages/bootstrap/css/bootstrap-theme.min.css" crossorigin="anonymous">

    <style>
        body {
            background: url(app/Images/380566.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .panel-default {
            opacity: 0.9;
            margin-top:30px;
        }
        .form-group.last {
            margin-bottom:0px;
        }
        .btn-login {
            background-color: #47c4b6;
            color: white;
        }
        .form-title
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
            padding-bottom: 80px;
        }
    </style>
</head>
<body>
<div class="form-title" style="background-color: white;">
    <div >L'Elegance Beauty </div>
    <div style="font-size: 12px;"> Please Log In to continue </div>


</div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-lock"></span> Login</div>
                    <div class="panel-body">
                        <form action = "index.php" method= "post" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">
                                    Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail3" name ="inputEmail" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">
                                    Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="inputPassword3" name="inputPassword" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group last">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-sm btn-login">
                                        Sign in</button>
                                    <button type="reset" class="btn btn-default btn-sm">
                                        Reset</button>
                                </div>
                            </div>
                            <div class="form-group last">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <?php if (isset($_SESSION['errors'])): ?>
                                        <div class="form-errors" style="color: red;">
                                            </br>
                                            <?php foreach($_SESSION['errors'] as $error): ?>
                                                <p><?php echo $error ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        Not Registred? <a href="app/Register_LogIn/register.php">Register here</a></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
