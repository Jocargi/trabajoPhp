<?php
if(isset($_POST) and !empty(!$POST['fecha_entrada']) and !empty($_POST['fecha_salida'])){
    require_once('dbaccess.php');
    $fecha_entrada = $_POST['fecha-entrada'];
    $fecha_salida = $_POST['fecha-salida'];

$sql = "SELECT h.* 
            FROM habitacion h
            WHERE h.id NOT IN (
                SELECT r.id_habitacion
                FROM reserva r
                WHERE (r.fecha_entrada <= '$fecha_entrada' AND r.fecha_salida >= '$fecha_entrada')
                    OR (r.fecha_entrada <= '$fecha_salida' AND r.fecha_salida >= '$fecha_salida')
                    OR (r.fecha_entrada >= '$fecha_entrada' AND r.fecha_salida <= '$fecha_salida')
            )";

    $stmt = $pdo->prepare($sql);
    $habitaciones = $stmt->execute();
}

?>