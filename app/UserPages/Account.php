
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
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
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

<div class="container marketing">
    <table>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Telephone Number</th>
            <th>Position</th>
        </tr>
        <tr>
            <td>Lisle</td>
            <td>Weiermans</td>
            <td>lisleweiermans@gmail.com</td>
            <td>082-805-5501</td>
            <td>Beauty Therapist and Owner</td>


        </tr>
        <tr>
            <td>Margo</td>
            <td>Henning</td>
            <td>hmargo.mh@gmail.com</td>
            <td>076-909-2776</td>
            <td>Website Developer and Tech Support</td>

        </tr>

    </table>

</div><!-- /.row -->

<?php
include '../Structure/footer.php'
?>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>