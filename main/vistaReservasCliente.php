<?php
require_once('auth_inc.php');
require_once('dbaccess.php');

$correo = $_SESSION['correo'];
$sql = "SELECT * FROM reserva r JOIN cliente c on c.dni = r.id_cliente where c.correo='$correo'";

$pdo->execute($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis reservas</title>
    <link rel="stylesheet" href="vistaReservasCliente.css">
</head>
<body>
    <header>
        <h1>Mis reservas</h1>
    </header>
    <main>
        
    </main>
</body>
</html>