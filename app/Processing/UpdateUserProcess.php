<?php
if (empty($_POST) ){

}
else {





    $db = new DBConnect();
    $user = new user();

    $user->userID = $_POST['uID'];
    $user->userName = $_POST['uName'];
    $user->userSurname = $_POST['uSurname'];
    $user->userContact = $_POST['uContact'];
    $user->userEmail = $_POST['uEmail'];
    $user->userPassword = $_POST['uPassword'];
    $user->activated = $_POST['activated'];
    $user->admin = $_POST['admin'];


    if ($db->connectToDatabase()) {

        $update = $db->updateUser($user);

        if ($update==true) {
            $_SESSION['errors'] = array("true");
        }
        else{
            $_SESSION['errors'] = array("Something went wrong, the user was not updated!");
        }

    }
    else {

        $_SESSION['errors'] = array("Something went wrong, the user was not updated!");

    }
}
?>