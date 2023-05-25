<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarifa Dreams</title>
    <link rel="stylesheet" href="stylesMain.css" type="text/css">
</head>
<body>
    <header>
        <div class="parte-superior">

            <div class="parte-superior-izquierda">
                <a href="index.php">Tarifa Dreams</a>
            </div>
            
            <div class="parte-superior-derecha">
              <a href="login.php"><img src="images/user-6769.svg" alt="logo"></a>
            </div>
        </div>

        <div class="parte-abajo">
            <ul>
                <li><a href="">Servicios</a></li>
                <li><a href="">Empresa</a></li>
                <li><a href="">Nosotros</a></li>
                <li><a href="">Contacto</a></li>
            </ul>
        </div>
    </header>
   
    <main>
        <div class="main-form">
            <img src="images/16468231897426.jpg" alt="">
            <div class="formulario">
                <span>HAZ TU RESERVA YA</span>
                <form action="index.php" method="post">
                    <label for="numero-personas">Personas</label>
                    <input type="number" name="numero-personas" id="numero-personas" required>
                    <label for="fecha-entrada">Fecha entrada</label>
                    <input type="date" name="fecha-entrada" id="fecha-entrada" required>
                    <label for="fecha_salida">Fecha salida</label>
                    <input type="date" name="fecha-salida" id="fecha-salida" required>
                    <input type="submit" name="buscar" id="buscar-habitaciones" value="BUSCA LAS MEJORES HABITACIONES">
                </form>
            </div>
        </div>
    </main>

</body>
</html>