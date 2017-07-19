<?php
header("Cache-Control", "no-cache, no-store, must-revalidate");
unset($_COOKIE["account"]);
date_default_timezone_set('Africa/Johannesburg');
$res = setcookie("account", '', time() - 36000, "/");

unset($_COOKIE["accountA"]);
date_default_timezone_set('Africa/Johannesburg');
$res = setcookie("accountA", '', time() - 36000, "/");

//echo "<script> var win = window.open('../../index.php', '_blank');</script>";
//echo "<script> win.focus();</script>";
//echo "<script> window.close();</script>";


header('Location: ' . '../../index.php'); /* Redirect browser */

?>