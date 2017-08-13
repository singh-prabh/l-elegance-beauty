<?php
if (empty($_POST) ){

}
else {



    session_start();

    $ID = $_POST['oID'];
    $completed = $_POST['completed'];
    $collected = $_POST['collected'];
    $db = new DBConnect();
    if ($db->connectToDatabase()) {
        $sqlSelect = "SELECT * FROM `order` WHERE id_order='" . $ID . "'";
        $res = mysqli_query($db->myconn, $sqlSelect);


        if ($res) {
            $count = mysqli_num_rows($res);
            $resArray = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if ($count == 1) {
                $o = new order();

                $o->orderID = $resArray['id_order'];
                $o->statusCollected = $collected;
                $o->statusCompleted = $completed;
                $o->orderDate = $resArray['orderDate'];
                $o->paymentCompleted = $resArray['paymentCompleted'];
                $o->totalPrice = $resArray['totalPrice'];
                $o->userID = $resArray['id_user'];

                $update = $db->updateOrder($o);

                if ($update==true) {
                    echo "<script type='text/javascript'>alert('The order was updated successfully!')
                                                                window.location = 'OrdersAdmin.php';
                                                              </script>";
                }
                else{
                    echo "<script type='text/javascript'>alert('The order was not updated successfully!1')
                                                                window.location = 'OrdersAdmin.php';
                                                              </script>";
                }


            }
            else {

                echo "<script type='text/javascript'>alert('The order was not updated successfully!2')
                                                                window.location = 'OrdersAdmin.php';
                                                              </script>";

            }
        }
        else {

            echo "<script type='text/javascript'>alert('The order was not updated successfully!3')
                                                                window.location = 'OrdersAdmin.php';
                                                              </script>";

        }
    }
    else {

        echo "<script type='text/javascript'>alert('The order was not updated successfully!4')
                                                                window.location = 'OrdersAdmin.php';
                                                              </script>";

    }








}
?>