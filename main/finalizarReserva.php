<?php

require_once "dbaccess.php";

$id = (int)$_GET['id'];
$arrayValues = [];

$sql = "SELECT * FROM HABITACION WHERE id = :id";
$arrayValues_habitacion[':id'] = $id;

$stmt = $pdo->prepare($sql);
$stmt->execute($arrayValues_habitacion);
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$habitacion = $stmt->fetch();

$reservar_pressed = isset($_POST['reservar']);

if($reservar_pressed){

    $sql_insert_reserva = "INSERT INTO RESERVA (id_cliente, id_habitacion, fecha_entrada, fecha_salida) VALUES (:id_cliente, :id_habitacion, :fecha_entrada, :fecha_salida);";
    $stmt = $pdo->prepare($sql_insert_reserva);

    $arrayValues_reserva[':id_cliente'] = $_POST['dni'];
    $arrayValues_reserva['id_habitacion'] = $_GET['id'];
    $arrayValues_reserva[':fecha_entrada'] = $_GET['fecha_entrada'];
    $arrayValues_reserva[':fecha_salida'] = $_GET['fecha_salida'];
    
    if ($stmt ->execute($arrayValues_reserva)) header("Location: ../main/index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Reserva</title>
    <link rel="stylesheet" href="../css/stylesFinalizarReserva.css">

</head>
<header>
    <h1>Tarifa dreams</h1>
</header>
<body>
    <div class="container-datos-reserva">
    <div class="container-habitacion">
            <?php
                echo '<div class="habitacion">';
            ?>    
                <div class="img-habitacion">
                    <?php echo "<img src=". $habitacion['ruta_imagen']. ">"; ?>
                </div>

                <div class="info-hab">
                    <?php echo "<h2>". "Habitacion ". $habitacion['nombre']."</h2>" ?>
                    <?php echo "<p>". $habitacion['descripcion']."</p>" ?>
                    <div class="precio">
                        <?php
                        echo "Numero de habitaciones: " . (int) $_GET['numero_habitaciones']. " x ". $habitacion['precio']. ": " . ((int) $_GET['numero_habitaciones']*(int)$habitacion['precio']) . " €"; ?>
                    </div>
                </div>
            <?php   
                echo '</div>'; 
            ?>
        </div>
    </div>

    <div class="form-container">
        <form action="" method="POST">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[A-Za-z ]{0,60}" required />
            <input type="text" name="primer-apellido" id="primer-apellido" placeholder="Primer apellido" pattern="[A-Za-z ]{0,60}" required />
            <input type="text" name="segundo-apellido" id="segundo-apellido" placeholder="Segundo apellido" pattern="[A-Za-z ]{0,60}" required />
            <input type="text" name="dni" id="dni" placeholder="DNI" pattern="[A-Z0-9]{0,60}" required />
            <input type="text" name="correo" id="correo" placeholder="Correo" required />
            <input type="text" name="direccion" id="direccion" placeholder="Direccion" required />
            <input type="text" name="localidad" id="localidad" placeholder="Localidad" pattern="[A-Za-z ]{0,60}" required />
            <input type="text" name="telefono" id="telefono" placeholder="Telefono" required />
            <input type="submit" value="RESERVAR" name="reservar"> 
        </form>
    </div>
</body>
</html>