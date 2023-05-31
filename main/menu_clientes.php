<?php require "auth_inc_cliente.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu_clientes</title>
    <link rel="stylesheet" href="../css/styles_Menu_clientes.css">
</head>
<body>
    <header>
    <h1>Hola de nuevo, <?php echo $_SESSION['nombre']; ?></h1>
    <div class="name-banner">
        <button name="logout" onclick="location.href='../main/cerrar_sesion.php'"><?php
        echo $_SESSION['nombre'] ?>
        </button>
    </div>
    </header>
    <section>
        <a href="" id="enlace">Haga sus reservas</a>
        <a href=""id="enlace">Mis reservas</a>
        <a href="modificar_cliente.php"id="enlace">Mis Datos</a>
    </section>
</body>
</html>