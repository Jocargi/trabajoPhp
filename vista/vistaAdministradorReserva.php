<?php 

require_once "../main/auth_inc.php"; 
require_once "../main/auth_inc_admin.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Administrador Reservas</title>
    <link rel="stylesheet" href="../css/stylesMenuAdministrador.css" type="text/css">
    <script src="../js/eliminarReserva.js" type="text/javascript"></script>
</head>
<body>

    <h1> ADMINISTRACION RESERVAS</h1>

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
        <form action="vistaAdministradorReserva.php" method="Post">

            <div class="gr1">
                <label for="id">ID RESERVA: </label>
                <input type="text" name="id" placeholder="..." value="<?php if (isset($_POST['id'])) echo $_POST['id']; ?>">
                
                <label for="id_cliente">DNI CLIENTE:</label>
                <input type="text" name="id_cliente" placeholder="..." value="<?php if (isset($_POST['id_cliente'])) echo $_POST['id_cliente']; ?>">
                
                <label for="id_habitacion">Nº HABITACION: </label>
                <input type="text" name="id_habitacion" placeholder="..." value="<?php if (isset($_POST['id_habitacion'])) echo $_POST['id_habitacion']; ?>">
            </div>
            
            <div class="gr2">
                <label for="fecha_entrada">FECHA ENTRADA:</label>
                <input type="date" name="fecha_entrada" placeholder="..." value="<?php if (isset($_POST['fecha_entrada'])) echo $_POST['fecha_entrada']; ?>">
                
                <label for="fecha_salida">FECHA SALIDA:</label>
                <input type="date" name="fecha_salida" placeholder="..." value="<?php if (isset($_POST['fecha_salida'])) echo $_POST['fecha_salida']; ?>">
            </div>
            
            <input type="submit" name="filtrar" value="FILTRAR">
            <input type="reset" name="limpiar" value="LIMPIAR">

    </div>
    <div class="tabla-container">
            <table class="table">
                <?php include "../logica/logicaAdministradorReserva.php"?>
            </table>
    </div>

    <div class="paginador">
        <?php include "../logica/registros_totales_reservas.php"; ?>
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