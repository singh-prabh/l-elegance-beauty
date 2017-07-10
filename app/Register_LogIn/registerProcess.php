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
    include "../DataClasses/user.php";
    include "../DatabaseConnection/DBConnect.php";
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

        $insertUser = $dbOne->insertUser($userOne);

        if ($insertUser==true) {
            $_SESSION['errors'] = array("true");
        }
        else{
            $_SESSION['errors'] = array("Something went wrong, the user was not added! You cab only use an email address once to register!");
        }

    }
    else {
        //show error to register page
        $_SESSION['errors'] = array("Something went wrong, the user was not added!");

    }
}

?>