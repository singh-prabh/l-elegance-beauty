<?php
if (empty($_POST) ){

}
else {

    //include "../DataClasses/service.php";
    //session_start();


    $db = new DBConnect();
    $s = new service();

    $s->serviceID = $_POST['sID'];
    $s->serviceName = $_POST['sName'];
    $s->serviceDescription = $_POST['sDescription'];
    $s->categoryID = $_POST['category'];
    $s->servicePrice = $_POST['price'];


    if ($db->connectToDatabase()) {

        $update = $db->updateService($s);

        if ($update==true) {
            $_SESSION['errors'] = array("true");
        }
        else{
            $_SESSION['errors'] = array("Something went wrong, the treatment was not updated!");
        }

    }
    else {

        $_SESSION['errors'] = array("Something went wrong, the treatment was not updated!");

    }
}
?>