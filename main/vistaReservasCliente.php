<?php

require "auth_inc.php";
require "dbaccess.php";

$correo = $_SESSION['correo'];
echo $_SESSION['correo'];

$sql = "SELECT r.* FROM reserva r JOIN cliente c on c.dni = r.id_cliente 
                                JOIN habitacion h on h.id=r.id_habitacion
        where c.correo like :correo";

$arrayValues = [];

$arrayValues['correo'] = $correo;

$stmt = $pdo->prepare($sql);
$stmt -> execute($arrayValues);

$stmt ->setFetchMode(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis reservas</title>
    <link rel="stylesheet" href="vistaReservasCliente.css">
</head>
<body>
    <header>
        <h1>MIS RESERVAS</h1>
    </header>
    <main>
        <table>
            <thead>
                <tbody>
                    <th>Id</th>
                    <th>id_cliente</th>
                    <th>id_habitacion</th>
                    <th>Entrada</th>
                    <th>Salida</th>
            </thead>
            <tbody>
        <?php
        while($reserva = $stmt->fetch()){
            echo "11";
            echo '<tr>';
            echo '<td>'.$reserva['id'].'</td>';
            echo '<td>'.$reserva['id_cliente'].'</td>';
            echo '<td>'.$reserva['id_habitacion'].'</td>';
            echo '<td>'.$reserva['fecha_entrada'].'</td>';
            echo '<td>'.$reserva['fecha_salida'].'</td>';
            echo '</tr>';
        }

        ?>
        </tbody>
        </table>
    </main>
</body>
</html>