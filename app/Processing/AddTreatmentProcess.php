<?php


if (empty($_POST) ){

}
else {
    include "../DataClasses/service.php";
    session_start();
    $dbOne = new DBConnect();
    $One = new service();
    $One->serviceName = $_POST['sName'];
    $One->serviceDescription = $_POST['sDescription'];
    $One->categoryID = $_POST['category'];
    $One->servicePrice = $_POST['price'];

    $sqlInsert = "INSERT INTO service (serviceName, serviceDescription,servicePrice, id_category) 
          VALUES('".$One->serviceName."','".$One->serviceDescription."','".$One->servicePrice."','". $One->categoryID."')";

    if ($dbOne->connectToDatabase()) {

        $c = "SELECT * FROM service WHERE serviceName ='".$One->serviceName."' && serviceDescription= '".$One->serviceDescription."' && servicePrice= '".$One->servicePrice."' && id_category= '".$One->categoryID."'";
        $r = mysqli_query($dbOne->myconn, $c);

        if ($r) {
            if(mysqli_fetch_array($r, MYSQLI_ASSOC))
            {
                $_SESSION['errors'] = array("You can't add a treatment more than once!");
            }
            else{
                $insert = $dbOne->insertService($One);

                if ($insert==true) {
                    $_SESSION['errors'] = array("true");
                }
                else{
                    $_SESSION['errors'] = array($sqlInsert);

                }

            }
        }







    }
    else {
        //show error to register page
        $_SESSION['errors'] = array("Something went wrong, the treatment was not added!2");

    }
}

?>