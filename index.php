<!DOCTYPE html>
<html>
<head>
    <title>Margo App</title>
    <link rel="stylesheet" href="app/packages/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="app/packages/bootstrap/css/bootstrap-theme.min.css" crossorigin="anonymous">
</head>
<body>
<?php
include 'app/header.php'
?>
<div class="container">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Hello World</h1>
        <p>Margo hello world project</p>
        <p><?php
            echo "Margo App testing"
            ?></p>
        <p>
            <a class="btn btn-lg btn-primary" href="app/app.php" role="button">View navbar docs »</a>
        </p>
    </div>

</div>
<?php
include 'app/footer.php'
?>
<script src="app/packages/jquery/jquery-3.2.1.min.js"></script>
<script src="app/packages/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>