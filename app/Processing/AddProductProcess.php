<?php


if (empty($_POST) ){

}
else {
    include "../DataClasses/item.php";
    session_start();
    $dbOne = new DBConnect();
    $One = new item();
    $One->itemName = $_POST['itemName'];
    $One->itemDescription = $_POST['itemDescription'];
    $One->activated = $_POST['activated'];
    $One->categoryID = $_POST['category'];
    $One->itembrandID = $_POST['brand'];
    $One->itemPrice = $_POST['price'];
    $One->categoryID = $_POST['category'];

    if($_FILES['image']['name']==null){

        $One->itemImage = null;
    }
    else{
        $imagetmp=fopen($_FILES['image']['tmp_name'],'r');

        $im =fread($imagetmp,$_FILES['image']['size']);
        fclose($imagetmp);
        $im = addslashes($im);


        $One->itemImage = $im;
    }

    if ($dbOne->connectToDatabase()) {

        $c = "SELECT * FROM item WHERE itemName ='".$One->itemName."' && itemDescription= '".$One->itemDescription."' && itemPrice= '".$One->itemPrice."' && id_category= '".$One->categoryID."' && id_itembrand='".$One->itembrandID."'";
        $r = mysqli_query($dbOne->myconn, $c);

        if ($r) {
            if(mysqli_fetch_array($r, MYSQLI_ASSOC))
            {
                $_SESSION['errors'] = array("You can't add a product more than once!");
            }
            else{
                $insert = $dbOne->insertItem($One);

                if ($insert==true) {
                    $_SESSION['errors'] = array("true");
                }
                else{
                    $_SESSION['errors'] = array("Something went wrong, the product was not added! ");
                }

            }
        }







    }
    else {
        //show error to register page
        $_SESSION['errors'] = array("Something went wrong, the product was not added!");

    }
}

?>