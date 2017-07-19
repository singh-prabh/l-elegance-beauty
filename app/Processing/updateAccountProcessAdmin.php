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
    include "../DatabaseConnection/DBConnect.php";
    session_start();
    $dbOne = new DBConnect();
    $CurUser= unserialize($_COOKIE["account"]);
    $CurUser->userName = $_POST['inputName'];
    $CurUser->userSurname = $_POST['inputSurname'];
    $CurUser->userContact = $_POST['inputContact'];
    $CurUser->userEmail = $_POST['inputEmail'];
    $CurUser->userPassword = $_POST['inputPassword'];





    if ($dbOne->connectToDatabase()) {

        $updateUser = $dbOne->updateUser($CurUser);

        if ($updateUser==true) {
            $_SESSION['errors'] = array("true");
            $cookie_name = "account";
            $cookie_value = $CurUser;
            setcookie($cookie_name, serialize($cookie_value), 0, "/");
        }
        else{
            $_SESSION['errors'] = array("Something went wrong, the user was not updated! You can only use an email address once!");
        }

    }
    else {
        //show error to register page
        $_SESSION['errors'] = array("Something went wrong, the user was not updated!");

    }
}

?>