<?php require_once "../main/auth_inc.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Administrador Cliente</title>
    <link rel="stylesheet" href="../css/stylesMenuAdministrador.css" type="text/css">
    <script src="../js/eliminarHabitacion.js" type="text/javascript"></script>
</head>
<body>

    <h1>ADMINISTRACION HABITACIONES</h1>
    <header>
        <div class="name-banner">
            <button name="logout" onclick="location.href='../main/cerrar_sesion.php'"><?php echo $_SESSION['correo'] ?> </button>
        </div>
        <nav>
            <ul>
                <a href="vistaAdministradorCliente.php"><li>CLIENTE</li></a>
                <a href="vistaAdministradorReserva.php"><li>RESERVA</li></a>
                <a href="vistaAdministradorHabitacion.php"><li>HABITACION</li></a>
            </ul>
        </nav>
    </header>

<main>

    <div class="form-container">
        <form action="vistaAdministradorHabitacion.php" method="Post">

            <div class="gr1">
                <label for="id">ID: </label>
                <input type="text" name="id" placeholder="..." value="<?php if (isset($_POST['id'])) echo $_POST['id']; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" placeholder="..." value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre']; ?>">
                <label for="numero_camas">Nº camas: </label>
                <input type="text" name="numero_camas" placeholder="..." value="<?php if (isset($_POST['numero_camas'])) echo $_POST['numero_camas']; ?>">
            </div>
            
            <div class="gr2">
                <label for="max_personas">Nº de personas:</label>
                <input type="text" name="max_personas" placeholder="..." value="<?php if (isset($_POST['max_personas'])) echo $_POST['max_personas']; ?>">
                <label for="precio">Precio:</label>
                <input type="text" name="precio" placeholder="..." value="<?php if (isset($_POST['precio'])) echo $_POST['precio']; ?>">
            </div>

            <div class="gr3">
            <label for="descripcion">Descripcion:</label>
                <input type="text" name="descripcion" placeholder="..." value="<?php if (isset($_POST['descripcion'])) echo $_POST['descripcion']; ?>">
            </div>
            
            <input type="submit" name="filtrar" value="FILTRAR">
            <input type="reset" name="limpiar" value="LIMPIAR">

    </div>
    <div class="tabla-container">
            <table class="table">
                <?php include "../logica/logicaAdministradorHabitacion.php"?>
            </table>
    </div>

    <div class="paginador">
        <?php include "../logica/registros_totales_habitaciones.php"; ?>
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