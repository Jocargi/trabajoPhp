<?php
require_once "../main/auth_inc.php";
require_once "../main/dbaccess.php";

$correo = $_SESSION['correo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis reservas</title>
    <link rel="stylesheet" href="../css/stylesMenuAdministrador.css">
</head>
<body>
    <header>
        <h1>Mis reservas</h1>
        <button><?php echo $correo ?></button>
    </header>
    <main>
        <table>
            <thead>
                <th>Número de personas</th>
                <th>Fecha entrada</th>
                <th>Fecha salida</th>
            </thead>
        </table>
    </main>
</body>
</html>