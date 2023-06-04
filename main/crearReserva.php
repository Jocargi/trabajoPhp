<?php

require_once "dbaccess.php";

if(isset($_POST) && !empty($_POST['fecha-entrada']) && !empty($_POST['fecha-salida']) && !empty($_POST['personas'])){

    print_r($_POST);

    $fecha_entrada = $_POST['fecha-entrada'];
    $fecha_salida = $_POST['fecha-salida'];
    $numPersonas = $_POST['personas'];


    $sql = "SELECT * 
            FROM habitacion
            WHERE id NOT IN (
                SELECT r.id_habitacion
                FROM reserva r
                WHERE (r.fecha_entrada <= '$fecha_entrada' AND r.fecha_salida >= '$fecha_entrada')
                    OR (r.fecha_entrada <= '$fecha_salida' AND r.fecha_salida >= '$fecha_salida')
                    OR (r.fecha_entrada >= '$fecha_entrada' AND r.fecha_salida <= '$fecha_salida')
            ) AND max_personas = $numPersonas";
} 

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
    <link rel="stylesheet" href="stylesCrearReserva.css">
</head>  
<body>
    <header>
    <h1>Tarifa dreams</h1>
    <div class="name-banner">
        <form action="crearReserva.php" method="post">
            <input type="number" name="max_personas" value="<?php echo $_POST['personas']; ?>" placeholder="Nº de personas">
            <input type="date" name="fecha-entrada" value="<?php echo $_POST['fecha-entrada']; ?>" >
            <input type="date" name="fecha-salida" value="<?php echo $_POST['fecha-salida']; ?>" >
            <input type="submit" value="Buscar">
        </form>
    </div>
    </header>
    <main>
        <?php

        while($habitaciones = $stmt->fetch()){
            echo '<div class="habitacion">';
            echo 'habitacion';
            echo '</div>';
        }    
        ?>
    </main>
</body>
</html>