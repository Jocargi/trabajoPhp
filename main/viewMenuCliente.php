<?php
session_start();
if (empty($_SESSION['correo'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Este es un menu de cliente</h1>
    <a href="cerrar-sesion.php"> cerrar sesion</a>
</body>
</html>