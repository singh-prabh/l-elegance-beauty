<?php
/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-06
 * Time: 12:29 PM
 */

if (empty($_POST) ){

}
else {

    session_start();
    $dbOne = new DBConnect();
    $One = new itembrand();
    $One->itembrandName = $_POST['brand'];

    if ($dbOne->connectToDatabase()) {

        $c = "SELECT * FROM itembrand WHERE itembrandName ='".$One->itembrandName."'";
        $r = mysqli_query($dbOne->myconn, $c);

        if ($r) {
            if(mysqli_fetch_array($r, MYSQLI_ASSOC))
            {
                $_SESSION['errors'] = array("You can't add a brand more than once!");
            }
            else{
                $insert = $dbOne->insertItemBrand($One);

                if ($insert==true) {
                    $_SESSION['errors'] = array("true");
                }
                else{
                    $_SESSION['errors'] = array("Something went wrong, the brand was not added! ");
                }

            }
        }







    }
    else {
        //show error to register page
        $_SESSION['errors'] = array("Something went wrong, the brand was not added!");

    }
}

?>