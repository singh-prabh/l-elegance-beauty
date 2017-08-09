<?php
if (empty($_GET) ){

}
else {

    include "../DataClasses/item.php";
    include "../DatabaseConnection/DBConnect.php";
    session_start();

    $iID=$_GET["id"];
    $db = new DBConnect();
    if ($db->connectToDatabase()) {
        $sqlSelect = "SELECT * FROM item WHERE id_item='" . $iID . "'";
        $res = mysqli_query($db->myconn, $sqlSelect);


        if ($res) {
            $count = mysqli_num_rows($res);
            $resArray = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if ($count == 1) {
                $item = new item();

                $item->itemID = $resArray['id_item'];
                $item->itemName = $resArray['itemName'];
                $item->itemDescription = $resArray['itemDescription'];
                $item->categoryID = $resArray['id_category'];
                $item->itembrandID = $resArray['id_itembrand'];
                $item->activated = "0";
                $item->itemPrice = $resArray['itemPrice'];
                $item->itemImage = addslashes($resArray['itemImage']);

                $update = $db->updateItem($item);

                if ($update==true) {
                    echo "<script type='text/javascript'>alert('The product was removed successfully!')
                                                                window.location = 'ProductsAdmin.php';
                                                              </script>";
                }
                else{
                    echo "<script type='text/javascript'>alert('".$update."')
                                                                window.location = 'ProductsAdmin.php';
                                                              </script>";
                }


            }
            else {

                echo "<script type='text/javascript'>alert('The product was not removed successfully! 2')
                                                                window.location = 'ProductsAdmin.php';
                                                              </script>";

            }
        }
        else {

            echo "<script type='text/javascript'>alert('The product was not removed successfully! 3')
                                                                window.location = 'ProductsAdmin.php';
                                                              </script>";

        }
    }
    else {

        echo "<script type='text/javascript'>alert('The product was not removed successfully! 4')
                                                                window.location = 'ProductsAdmin.php';
                                                              </script>";

    }








}
?>