<?php require_once "auth_inc.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Administrador</title>
    <link rel="stylesheet" href="stylesMenuAdministrador.css" type="text/css">
    <script src="eliminarCliente.js" type="text/javascript"></script>
</head>
<body>
<h1>CLIENTES</h1>
    <header>
        <div class="name-banner">
            <button name="logout" onclick="location.href='cerrar_sesion.php'"><?php
            echo $_SESSION['correo'] ?>
            </button>
        </div>
        <nav>
            <ul>
                <a href="vistaMenuAdministrador.php"><li>Volver al menu</li></a>
            </ul>
        </nav>
    </header>

<main>

    <div class="form-container">
        <form action="vistaAdministradorCliente.php" method="Post">

            <div class="gr1">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" placeholder="..." value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre']; ?>">
                <label for="apellido_1">P. Apellido:</label>
                <input type="text" name="apellido_1" placeholder="..." value="<?php if (isset($_POST['apellido_1'])) echo $_POST['apellido_1']; ?>">
                <label for="apellido_2">S. Apellido: </label>
                <input type="text" name="apellido_2" placeholder="..." value="<?php if (isset($_POST['apellido_2'])) echo $_POST['apellido_2']; ?>">
            </div>
            
            <div class="gr2">

                <label for="dni">DNI:</label>
                <input type="text" name="dni" placeholder="..." value="<?php if (isset($_POST['dni'])) echo $_POST['dni']; ?>">
                <label for="correo">Correo:</label>
                <input type="text" name="correo" placeholder="..." value="<?php if (isset($_POST['correo'])) echo $_POST['correo']; ?>">
                <label for="direccion">Direccion:</label>
                <input type="text" name="direccion" placeholder="..." value="<?php if (isset($_POST['direccion'])) echo $_POST['direccion']; ?>">
            </div>

            <div class="gr3"> 
            
                <label for="localidad">Localidad:</label>
                <input type="text" name="localidad" placeholder="..." value="<?php if (isset($_POST['localidad'])) echo $_POST['localidad']; ?>">
                
                <label for="telefono">Telefono:</label>
                <input type="text" name="telefono" placeholder="..." value="<?php if (isset($_POST['telefono'])) echo $_POST['telefono']; ?>">

            </div>
            
            <input type="submit" name="filtrar" value="FILTRAR">
            <input type="reset" name="limpiar" value="LIMPIAR">

    </div>
    <div class="tabla-container">
            <table class="table">
                <?php include "logicaAdministradorCliente.php"?>
            </table>
    </div>

    <div class="paginador">
        <?php include "registros_totales_cliente.php"; ?>
        <input type="submit" name="primera_pagina" value="&lt;&lt;" <?php echo $btn_primera_pagina; ?> >
        <input type="submit" name="anterior" value="&lt;">
        <input type="number" name="pagina" value="<?php echo $pagina; ?>">
        <input type="submit" name="siguiente" value="&gt;" <?php echo $btn_ultima_pagina; ?>>
        <input type="submit" name="ultima_pagina" value="&gt;&gt;" <?php echo $btn_ultima_pagina; ?>>
        <select name="registros_pagina">
            <option value="2" <?php echo $selected1; ?>>2</option>
            <option value="4" <?php echo $selected2; ?>>4</option>
            <option value="6" <?php echo $selected3; ?>>6</option>
        </select>

    </div>
</form>

</main>
</body>
</html>