<?php
require_once "../main/auth_inc.php";
require_once "../main/dbaccess.php";

$correo = $_SESSION['correo'];

$sql = "SELECT r.num_personas, r.fecha_entrada, r.fecha_salida
        FROM reserva r JOIN cliente c ON c.dni=r.id_cliente
        WHERE c.correo LIKE :correo";

$stmt = $pdo->prepare($sql);

$arrCorreo = [
    ':correo' => $correo
];

$stmt->execute($arrCorreo);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis reservas</title>
    <link rel="stylesheet" href="../css/stylesMenuAdministrador.css">
    <link rel="stylesheet" href="../css/stylesMostrarReservas.css">
</head>
<body>
    <header>
        <h1>Mis reservas</h1>
        <button><?php echo $correo ?></button>
    </header>
    <main>
        <table>
            <thead>
                <th>Número de personas</th>
                <th>Fecha entrada</th>
                <th>Fecha salida</th>
            </thead>
            <?php
            while($resultado = $stmt->fetch()){
                echo '<tr>';
                echo '<td>'. $resultado['num_personas']. '</td>';
                echo '<td>'. $resultado['fecha_entrada']. '</td>';
                echo '<td>'. $resultado['fecha_salida']. '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </main>
</body>
</html>