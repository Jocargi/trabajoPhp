<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Reserva</title>
    <link rel="stylesheet" href="stylesCrearReserva.css">
</head>
<body>
    <header>
    <h1>Tarifa dreams</h1>
    <div class="name-banner">
        <form action="crearReservaLogica.php" method="post">
            <input type="number" name="personas" value="<?php echo $_POST['personas']; ?>" placeholder="Nº de personas">
            <input type="date" name="fecha-entrada" value="<?php echo $_POST['fecha-entrada']; ?>" >
            <input type="date" name="fecha-salida" value="<?php echo $_POST['fecha-salida']; ?>" >
            <input type="number" name="precio" value="<?php echo $_POST['precio']; ?>" placeholder="Precio">
        </form>
    </div>
    </header>
    <main>
        <div class="habitacion">
            
        </div>
        <div class="habitacion">

        </div>
        <div class="habitacion">

        </div>
    </main>
</body>
</html>