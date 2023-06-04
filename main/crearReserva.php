<?php

require_once "dbaccess.php";

    $fecha_entrada = $_GET['fecha-entrada'];
    $fecha_salida =  $_GET['fecha-salida'];
    $personas = (int) $_GET['personas'];

    $selected1 = (int)$personas  == 1 ? "selected" : "none";
    $selected2 = (int)$personas  == 2 ? "selected" : "none";
    $selected3 = (int)$personas  == 3 ? "selected" : "none";
    $selected4 = $personas  ==  "Cualquiera" ? "selected" : "none";

    $arrayValues = [];

    $sql = "SELECT DISTINCT * 
            FROM habitacion
            WHERE id NOT IN (
                SELECT r.id_habitacion
                FROM reserva r
                WHERE (r.fecha_entrada <= '$fecha_entrada' AND r.fecha_salida >= '$fecha_entrada')
                    OR (r.fecha_entrada <= '$fecha_salida' AND r.fecha_salida >= '$fecha_salida')
                    OR (r.fecha_entrada >= '$fecha_entrada' AND r.fecha_salida <= '$fecha_salida'))";
    

    if($personas != 0){
        $sql .= " AND max_personas like :personas";       
        $arrayValues[':personas'] = $personas;
    }

    $sql.= " group by nombre";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrayValues);
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
    <script src="../js/parametroHabitacion.js"></script>
</head>  
<body>
    <header>
    <h1>Tarifa dreams</h1>
    <div class="name-banner">
        <form action="crearReserva.php" method="get">
            <input type="date" name="fecha-entrada" id="fecha-entrada" value="<?php echo $fecha_entrada; ?>" required>
            <input type="date" name="fecha-salida" id="fecha-salida" value="<?php echo $fecha_salida; ?>" required>
            <select name="personas">
                <option value="*" <?php echo $selected4; ?> >Cualquiera</option>
                <option value="1" <?php echo $selected1; ?> >1</option>
                <option value="2" <?php echo $selected2; ?> >2</option>
                <option value="3" <?php echo $selected3; ?> >3</option>
            </select>
            <input type="submit" name ="enviar" id="enviar" value="Buscar">
            <input type="reset" name="reset" id="reset" value="Limpiar">
        </form>
    </div>
    </header>
    <img src="" alt="">
    <main>
    <form action="finalizarReserva.php" method="get">
        <div class="container-habitacion">
            <?php
            while ($habitaciones = $stmt->fetch()){
                $id = $habitaciones['id'];
                echo '<div class="habitacion">';
            ?>    
                <div class="content-habitacion">
                    <div class="img-habitacion">
                        <?php echo "<img src=". $habitaciones['ruta_imagen']. ">"; ?>
                    </div>

                    <div class="info-hab">
                        <?php echo "<h2>". "Habitacion ". $habitaciones['nombre']."</h2>" ?>
                        <?php echo "<p>". $habitaciones['descripcion']."</p>" ?>
                        <div class="precio">
                            <select name="numero_habitaciones" onchange="guardarValor(this.value)">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <?php echo $habitaciones['precio'] . " €"; ?>
                            <input type="hidden" name="fecha_entrada" value="<?php echo $fecha_entrada; ?>" >
                            <input type="hidden" name="fecha_salida" value="<?php echo $fecha_salida; ?>" >
                            <input type="button" name="<?php echo $id; ?>" value="RESERVAR" onclick="parametroHabitacion('<?php echo $id ?>', '<?php echo $fecha_entrada ?>', '<?php echo $fecha_salida?>')">
                        </div>
                    </div>
                    
                </div>
            <?php 
                echo '</div>';   
            } 
            ?>
        </div>
    </form>
    </main>
</body>
</html>