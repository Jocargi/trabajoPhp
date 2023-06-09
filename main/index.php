<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarifa Dreams</title>
    <link rel="stylesheet" href="../css/stylesMain.css" type="text/css">
    <script src="../js/fechaAnterior.js"></script>
    <script src="../js/personasMinimas.js"></script>
</head>
<body>
    <header>
        <div class="parte-superior">
            <div class="parte-superior-izquierda">
                <a href="index.php">Tarifa Dreams</a>
            </div>
            <a href="login.php"><img src="images/si.png" alt="logo"></a>
            <div class="parte-superior-derecha">
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
    <a href="mostrar_reserbas.php">pincha aqui para ser el mejor</a>

    <main>
        <div class="main-form">
            <img src="images/16468231897426.jpg" alt="" id="img1">
            <div class="formulario">
                <span>HAZ TU RESERVA YA</span>
                <form action="crearReserva.php" method="get">
                    <label for="fecha-entrada">Fecha entrada</label>
                    <input type="date" name="fecha-entrada" id="fecha-entrada" required>
                    <label for="fecha_salida">Fecha salida</label>
                    <input type="date" name="fecha-salida" id="fecha-salida" required>
                    <label for="personas">Personas</label>
                   <select name="personas">
                        <option value="" selected>SELECCIONAR</option> 
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                    </select>
                    <input type="submit" name="buscar" id="buscar-habitaciones" value="BUSCA LAS MEJORES HABITACIONES">
                </form>
            </div>
        </div>

    

    <footer>
      <section id="f1">
        <h3>¿donde nos puedes encontrar? </h3>
        <div>España</div>
        <div>Alemania</div>
        <div>Portugal</div>
        <div>Andorra</div>
        <div>Argentina</div>
        <div>Bolivia </div>
      </section>
      <section id="f1">
        <h3>Sobre Nosotros</h3>
        <div>Avisos legales</div>
        <div>Privacidad y cookies</div>
        <div>terminos y condiciones</div>
      </section>
      <section id="f1">
        <h3>Redes Solaciales</h3>
        <div>Instagram</div>
        <div>Telegram</div>
        <div>Facebook</div>
        <div>Twitter</div>
      </section>
      <section id="f1">
        <h3>Dudas comunes</h3>
        <div>¿Como regitrarme?</div>
        <div>¿Como cancelar una reserva?</div>
        <div>¿Hay conexion a internet?</div>
        <div>¿Hay buffet libre ?</div>
      </section>
    
    </footer>

</body>
</html>