<?php
session_start();
if (isset($_SESSION["correo"])){
    header("Location: index.php");
    exit();
}
?>

//require (__DIR__)."/auth.inc.php");