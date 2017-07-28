<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
if(!isset($_COOKIE["account"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {
    include "../DataClasses/user.php";
    include "../DatabaseConnection/DBConnect.php";
    $dbOne = new DBConnect();
    $user = unserialize($_COOKIE["account"]);

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
if (empty($_POST) ){

}
else {


    include '../DataClasses/shoppingcartitem.php';
    include '../DataClasses/item.php';

    $user = unserialize($_COOKIE["account"]);
    $itemID = $_POST['itemID'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    if($quantity <1){
        header('Location: ' . '../Processing/ErrorPage.php'); /* Redirect browser */
    }
    else{
        $cartItem = new shoppingcartitem();

        $cartItem->userID = $user->userID;
        $cartItem->itemID = $itemID;
        $cartItem->quantity = $quantity;
        $cartItem->totalPrice = $price * $quantity;

        $dbOne = new DBConnect();
        if ($dbOne->connectToDatabase()) {

            $insert = $dbOne->insertShoppingCartItem($cartItem);

            if ($insert==true) {
                echo "<script type='text/javascript'>alert('Product added to cart successfully!')
                        window.location = 'Home.php';
                     </script>";
            }
            else{
                echo "<script type='text/javascript'>alert('Something went wrong, the product was not added to the cart! ')
                        window.location = 'Home.php';
                     </script>";

            }

        }
        else {
            //show error to register page
            echo "<script type='text/javascript'>alert('Something went wrong, the product was not added to the cart!')
                        window.location = 'Home.php';
                     </script>";

        }


    }

}



?>
</body>
