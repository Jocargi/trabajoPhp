<?php
session_start();
if (empty($_SESSION["correo"])){
    header("Location: ../main/index.php");
    exit();
}
?>



