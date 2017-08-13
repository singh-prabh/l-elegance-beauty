<?php
if (empty($_POST) ){

}
else {

    include "../DataClasses/item.php";
    session_start();


    $db = new DBConnect();
    $item = new item();

    $item->itemID = $_POST['itemID'];
    $item->itemName = $_POST['itemName'];
    $item->itemDescription = $_POST['itemDescription'];
    $item->categoryID = $_POST['category'];
    $item->itembrandID = $_POST['brand'];
    $item->activated = $_POST['activated'];
    $item->itemPrice = $_POST['price'];
    if($_FILES['image']['name']==null){
        if ($db->connectToDatabase()) {
            $sqlSelect = "SELECT itemImage FROM item WHERE id_item='" . $item->itemID . "'";
            $res = mysqli_query($db->myconn, $sqlSelect);


            if ($res) {
                $count = mysqli_num_rows($res);
                $resArray = mysqli_fetch_array($res, MYSQLI_ASSOC);
                if ($count == 1) {
                    $item->itemImage = addslashes($resArray['itemImage']);
                }
            }
        }

    }
    else{
        $imagetmp=fopen($_FILES['image']['tmp_name'],'r');

        $im =fread($imagetmp,$_FILES['image']['size']);
        fclose($imagetmp);
        $im = addslashes($im);


        $item->itemImage = $im;
    }






    if ($dbOne->connectToDatabase()) {

        $update = $dbOne->updateItem($item);

        if ($update==true) {
            $_SESSION['errors'] = array("true");
        }
        else{
            $_SESSION['errors'] = array("Something went wrong, the product was not updated!");
        }

    }
    else {

        $_SESSION['errors'] = array("Something went wrong, the product was not updated!");

    }
}
?>