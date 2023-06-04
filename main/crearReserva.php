<?php

require_once "dbaccess.php";

    $fecha_entrada = isset($_GET['reset']) ? "": $_GET['fecha-entrada'];
    $fecha_salida =  isset($_GET['reset']) ? "":$_GET['fecha-salida'];
    $personas = isset($_GET['reset']) ? "":(int) $_GET['personas'];

    $selected1 = (int)$personas  == 1 ? "selected" : "none";
    $selected2 = (int)$personas  == 2 ? "selected" : "none";
    $selected3 = (int)$personas  == 3 ? "selected" : "none";

    $sql = "SELECT * 
            FROM habitacion
            WHERE id NOT IN (
                SELECT r.id_habitacion
                FROM reserva r
                WHERE (r.fecha_entrada <= '$fecha_entrada' AND r.fecha_salida >= '$fecha_entrada')
                    OR (r.fecha_entrada <= '$fecha_salida' AND r.fecha_salida >= '$fecha_salida')
                    OR (r.fecha_entrada >= '$fecha_entrada' AND r.fecha_salida <= '$fecha_salida'))        
            AND max_personas = '$personas'";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $stmt -> setFetchMode(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Reserva</title>
    <link rel="stylesheet" href="../css/stylesCrearReserva.css">
    <script src="../js/fechaAnterior.js"></script>
    <script src="../js/personasMinimas.js"></script>
</head>  
<body>
    <header>
    <h1>Tarifa dreams</h1>
    <div class="name-banner">
        <form action="crearReserva.php" method="get">
            <input type="date" name="fecha-entrada" id="fecha-entrada" value="<?php echo $fecha_entrada; ?>" required >
            <input type="date" name="fecha-salida" id="fecha-salida" value="<?php echo $fecha_salida; ?>" required>
            <select name="personas">
                <option value="1" <?php echo $selected1; ?> >1</option>
                <option value="2" <?php echo $selected2; ?> >2</option>
                <option value="3" <?php echo $selected3; ?> >3</option>
            </select>
            <input type="submit" name ="enviar" value="Buscar">
            <input type="reset" name="reset" value="Limpiar">
        </form>
    </div>
    </header>
    <img src="" alt="">
    <main>
    <div class="container-habitacion">
        <?php
        if ($habitaciones = $stmt->fetch()){
            echo '<div class="habitacion">';
        ?>    
            <div class="content-habitacion">
            <div class="img-habitacion">
                <?php echo "<img src=". $habitaciones['ruta_imagen']. ">"; ?>
            </div>
            <div class="info-hab">
                <?php echo "<p>". $habitaciones['descripcion']."</p>" ?>
            </div>
            </div>
        <?php
            echo '</div>';   
        } 
        ?>
    </div>
    </main>
</body>
</html>