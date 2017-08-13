<?php
if(!isset($_COOKIE["accountA"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {
    include "../DataClasses/user.php";
    include "../DatabaseConnection/DBConnect.php";
    $dbOne = new DBConnect();
    $user = unserialize($_COOKIE["accountA"]);

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
if (empty($_GET) ){

}
else {

    include "../DataClasses/service.php";

    session_start();

    $ID=$_GET["id"];
    $db = new DBConnect();
    if ($db->connectToDatabase()) {

        $res = $db->deleteService($ID);


        if ($res) {
            echo "<script type='text/javascript'>alert('The treatment was removed successfully!')
                                                                window.location = 'ServicesAdmin.php';
                                                              </script>";
        }
        else {

            echo "<script type='text/javascript'>alert('The treatment was not removed successfully!')
                                                                window.location = 'ServicesAdmin.php';
                                                              </script>";

        }
    }
    else {

        echo "<script type='text/javascript'>alert('The treatment was not removed successfully!')
                                                                window.location = 'ServicesAdmin.php';
                                                              </script>";

    }








}
?>