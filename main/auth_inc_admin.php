<?php
if (!$_SESSION["rol"]){
    header("Location: ../main/login.php");
    exit();
}
?>