<?php

unset($_COOKIE["account"]);
date_default_timezone_set('Africa/Johannesburg');
$res = setcookie("account", '', time() - 36000, "/");

unset($_COOKIE["accountA"]);
date_default_timezone_set('Africa/Johannesburg');
$res = setcookie("accountA", '', time() - 36000, "/");




header('Location: ' . '../../index.php'); /* Redirect browser */

?>