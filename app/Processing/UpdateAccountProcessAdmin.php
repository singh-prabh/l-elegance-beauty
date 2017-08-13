<?php
/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-06
 * Time: 12:29 PM
 */
if(!isset($_COOKIE["accountA"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {


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
if (empty($_POST) ){

}
else {

    session_start();
    $dbOne = new DBConnect();
    $CurUser= unserialize($_COOKIE["accountA"]);
    $CurUser->userName = $_POST['inputName'];
    $CurUser->userSurname = $_POST['inputSurname'];
    $CurUser->userContact = $_POST['inputContact'];
    $CurUser->userEmail = $_POST['inputEmail'];
    $CurUser->userPassword = $_POST['inputPassword'];





    if ($dbOne->connectToDatabase()) {

        $updateUser = $dbOne->updateUser($CurUser);

        if ($updateUser==true) {
            $_SESSION['errors'] = array("true");
            $cookie_name = "accountA";
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