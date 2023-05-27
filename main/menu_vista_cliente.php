<!DOCTYPE html>
<html lang=”es”>
<head>
	<meta charset=”UTF-8”>
	<title>Datos del cliente</title>
    <link rel="stylesheet" href="menu_vista_cliente.css">
</head>
<body>
<?php
$_GET['dni'] = "1";
    if(isset($_GET['dni']) && !empty($_GET['dni'])) {
        require_once("dbaccess.php");
        $sql= "select * from cliente where true ";
        $id_cliente = $_GET['dni'];
        $stmt = $pdo->prepare("SELECT * FROM cliente WHERE dni=:id");
        $stmt->execute(array(':id'=>$id_cliente));
        $row = $stmt->fetch();
        echo '<h1>Datos de '.$row['nombre'].'</h1>';
        echo "<table border='1px solid'>";
        echo '<thead>';
        echo '<th>DNI</th>';
        echo '<th>Correo</th>';
        echo '<th>Nombre</th>';
        echo '<th>Primer apellido</th>';
        echo '<th>Segundo apellido</th>';
        echo '<th>Direccion</th>';
        echo '<th>Localidad</th>';
        echo '<th>Teléfono</th>';
        echo '<th>Código de acceso</th>';
        echo '</thead>';
        echo"<tr>";
        echo "<td>".$row['dni']."</td>";
        echo "<td>".$row['correo']."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['apellido_1']."</td>";
        echo "<td>".$row['apellido_2']."</td>";
        echo "<td>".$row['direccion']."</td>";
        echo "<td>".$row['localidad']."</td>";
        echo "<td>".$row['telefono']."</td>";
        echo "<td>".$row['codigo_acceso']."</td>";
        echo"</tr>";
        echo "</table>";
    }
    ?>
        <a class="enlace"  href="index.php">
            <div>
                <h3>Volver</h3>
            </div>
        </a>
</body>
</html>


