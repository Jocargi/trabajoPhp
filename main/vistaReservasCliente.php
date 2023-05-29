<?php
require_once('auth_inc.php');
require_once('dbaccess.php');

if(empty($_SESSION['correo'])){
    header("index.php");
    exit(1);
}

$correo = $_SESSION['correo'];
$sql = "SELECT r.* FROM reserva r JOIN cliente c on c.dni = r.id_cliente 
                                JOIN habitacion h on h.id_reserva=r.id
        where c.correo='$correo'";
$stmt = pdo->execute($sql);
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
        <h1>Mis reservas</h1>
    </header>
    <main>
        <table>
            <thead>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Num. Personas</th>
            </thead>
        <?php
        while($reserva = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo '<tr>';
            echo '<td>'.$reserva['fecha_entrada'].'</td>';
            echo '<td>'.$reserva['fecha_salida'].'</td>';
            echo '<td>'.$reserva['num_personas'].'</td>';
            echo '</tr>';
        }        
        ?>
        </table>
    </main>
</body>
</html>