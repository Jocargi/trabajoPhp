<?php require "auth_inc.php" ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="styles_Menu_clientes.css">
</head>
<body>
    <header>
    <h1>Menu de Administrador</h1>
    <div class="name-banner">
            <button name="logout" onclick="location.href='cerrar_sesion.php'"><?php echo $_SESSION['correo'] ?> </button>
        </div>
    </header>
    <section>
        <a href="vistaAdministradorCliente.php" id="enlace">CLIENTES</a>
        <a href="vistaAdministradorReserva.php"id="enlace">RESERVAS</a>
        <a href="vistaAdministradorHabitacion.php"id="enlace">HABITACIONES</a>
    </section>
</body>
</html>