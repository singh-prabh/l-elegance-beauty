<?php
if(!isset($_COOKIE["account"])) {
    header('Location: ' . '../../index.php'); /* Redirect browser */
    die();
} else {

}
?>
<?php
echo "You have selected the product with the id  " . $_GET["id"];
?>