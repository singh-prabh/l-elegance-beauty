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
    include "app/DataClasses/user.php";
    include "app/DatabaseConnection/DBConnect.php";
    $dbOne = new DBConnect();
    $userOne = new user();
    //$userOne->userID = $_POST['inputEmail'];
    $userOne->userName = $_POST['inputName'];
    $userOne->userSurname = $_POST['inputSurname'];
    $userOne->userContact = $_POST['inputContact'];
    $userOne->userEmail = $_POST['inputEmail'];
    $userOne->userPassword = $_POST['inputPassword'];
    $userOne->activated = 1;
    $userOne->admin = 0;




    if ($dbOne->connectToDatabase()) {

        $sqlSelect = "SELECT * FROM user WHERE userEmail= '" . $email . "' && userPassword= '" . $password . "'";
        $res = mysqli_query($dbOne->myconn, $sqlSelect);

        if ($res) {
            $count = mysqli_num_rows($res);
            $resArray = mysqli_fetch_array($res, MYSQL_ASSOC);


            if ($count == 1) {

                $userOne->userID = $resArray["id_user"];
                $userOne->userName = $resArray["userName"];
                $userOne->userSurname = $resArray["userSurname"];
                $userOne->userContact = $resArray["userContact"];
                $userOne->userEmail = $resArray["userEmail"];
                $userOne->userPassword = $resArray["userPassword"];
                $userOne->activated = $resArray["activated"];
                $userOne->admin = $resArray["admin"];

                if ($userOne->activated && $userOne->admin) {

                    $isError =false;
                    $cookie_name = "account";
                    $cookie_value = $userOne;
                    setcookie($cookie_name, serialize($cookie_value), 0, "/");
                    header('Location: ' . 'app/AdminPages/Home.php'); /* Redirect browser */
                    die();

                } else if ($userOne->activated == true && $userOne->admin == false) {


                    $cookie_name = "account";
                    $cookie_value = $userOne;
                    setcookie($cookie_name, $cookie_value, 0, "/");
                    header('Location: ' . 'app/UserPages/Home.php'); /* Redirect browser */
                    die();
                } else {

                    $_SESSION['errors'] = array("Your account has been deactivated.");


                }


            } else {
                //show error to login page
                $_SESSION['errors'] = array("Your username or password was incorrect.");

            }
        }

    }
}

?>