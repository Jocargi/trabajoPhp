<?php
session_start();
if (empty($_SESSION["correo"])){
    header("Location: index.php");
    exit();
}

/**require (__DIR__)."/auth.inc.php");*/
?>


