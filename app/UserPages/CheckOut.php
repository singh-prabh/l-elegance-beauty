<?php
if(!isset($_COOKIE["account"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {

}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>L'Elegance Beauty-myCart</title>
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
        my-Cart</p>
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


    </table>
    <div id="paypal-button"></div>

</div><!-- /.row -->

<?php
include '../Structure/footer.php'
?>
<script src="../packages/jquery/jquery-3.2.1.min.js"></script>
<script src="../packages/bootstrap/js/bootstrap.min.js"></script>
<script>
    paypal.Button.render({

        env: 'sandbox', // Or ,'production'

        client: {
            sandbox:    'Ae6q5qk_Kms_siF5gKThfu6dLGWWM_oxW03zdA9ANpWJnz7sE9PbTImgfeV9gy3f9RYM77xQcF4oCEyO',
            production: 'AUrysuysNkliOuHTozqGu8cfPQIK5oBvmRsUXdqCixu-3RHuo14jlgGZpOatk4STDMTqEckl6BeGgpRl'
        },

        commit: true, // Show a 'Pay Now' button

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '1.00', currency: 'USD' }
                        }
                    ]
                },
                experience: {
                    input_fields: {
                        no_shipping: 1
                    }
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function(payment) {


                window.alert("Payment Done Bitch!");
                // You can now show a confirmation message to the customer
            });
        }

    }, '#paypal-button');
</script>
</body>
</html>