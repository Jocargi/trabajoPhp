<?php
if(isset($_POST) and !empty(!$POST['fecha_entrada']) and !empty($_POST['fecha_salida'])){
    require_once('dbaccess.php');
    $fecha_entrada = $_POST['fecha-entrada'];
    $fecha_salida = $_POST['fecha-salida'];

$sql = "SELECT * 
            FROM habitacion
            WHERE id NOT IN (
                SELECT r.id_habitacion
                FROM reserva r
                WHERE (r.fecha_entrada <= '$fecha_entrada' AND r.fecha_salida >= '$fecha_entrada')
                    OR (r.fecha_entrada <= '$fecha_salida' AND r.fecha_salida >= '$fecha_salida')
                    OR (r.fecha_entrada >= '$fecha_entrada' AND r.fecha_salida <= '$fecha_salida')
            )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while($habitaciones = $stmt->fetch()){
        /*
        nombre ENUM("Individual", "Doble", "Triple") NOT NULL,
        numero_camas TINYINT UNSIGNED NOT NULL,
        max_personas TINYINT UNSIGNED NOT NULL,
        precio TINYINT UNSIGNED NOT NULL,
        descripcion TEXT NULL,
        */
        echo '<h2>Habitacion'.$habitaciones['nombre'].'</h2>';
        echo '<h3>Número de camas: '.$habitaciones['numero_camas'].'</h3>';
        echo '<h3>Máximo n. Personas: '.$habitaciones['max_personas'].'</h3>';
        echo '<h3>'.$habitaciones['precio'].'</h3>';
        echo '<h4>'.$habitaciones['descripcion'].'</h3>';
    }
}
?>