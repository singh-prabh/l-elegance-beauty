<?php
setcookie("account", "", time() - 3600);
header('Location: ' . '../../index.php'); /* Redirect browser */

?>