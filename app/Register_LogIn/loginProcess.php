<?php
/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-06
 * Time: 12:30 PM
 */

if (empty($_POST) ){

}
else {

    session_start();
    include "app/DataClasses/user.php";
    include "app/DataClasses/logintimestamp.php";
    include "app/DatabaseConnection/DBConnect.php";
    $dbOne = new DBConnect();
    $userOne = new user();
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];


    if ($dbOne->connectToDatabase()) {

        $sqlSelect = "SELECT * FROM user WHERE userEmail= '" . $email . "' && userPassword= '" . $password . "'";
        $res = mysqli_query($dbOne->myconn, $sqlSelect);

        if ($res) {
            $count = mysqli_num_rows($res);
            $resArray = mysqli_fetch_array($res, MYSQLI_ASSOC);


            if ($count == 1) {

                $userOne->userID = $resArray["id_user"];
                $userOne->userName = $resArray["userName"];
                $userOne->userSurname = $resArray["userSurname"];
                $userOne->userContact = $resArray["userContact"];
                $userOne->userEmail = $resArray["userEmail"];
                $userOne->userPassword = $resArray["userPassword"];
                $userOne->activated = $resArray["activated"];
                $userOne->admin = $resArray["admin"];
                $logintimestamp = new logintimestamp();
                $logintimestamp->userID= $userOne->userID;
                date_default_timezone_set('Africa/Johannesburg');
                if ($userOne->activated==1 && $userOne->admin==1) {

                    $logintimestamp->timestamp= date('Y-m-d H:i:s');

                    $insertLogOn = $dbOne->insertLogintimestamp($logintimestamp);
                    if($insertLogOn){
                        $cookie_name = "account";
                        $cookie_value = $userOne;
                        setcookie($cookie_name, serialize($cookie_value), 0, "/");
                        header('Location: ' . 'app/AdminPages/Home.php'); /* Redirect browser */
                        die();
                    }



                } else if ($userOne->activated == 1 && $userOne->admin == 0) {

                    $logintimestamp->timestamp= date('Y-m-d H:i:s');

                    $insertLogOn = $dbOne->insertLogintimestamp($logintimestamp);
                    if($insertLogOn){
                        $cookie_name = "account";
                        $cookie_value = $userOne;
                        setcookie($cookie_name, serialize($cookie_value), 0, "/");
                        header('Location: ' . 'app/UserPages/Home.php'); /* Redirect browser */
                        die();
                    }

                } else {

                    $_SESSION['errors'] = array("Your account has been deactivated. "   );


                }


            } else {
                //show error to login page
                $_SESSION['errors'] = array("Your username or password was incorrect.");

            }
        }

    }
    else{

    }
}



?>