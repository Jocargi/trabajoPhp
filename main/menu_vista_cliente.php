<!DOCTYPE html>
<html lang=”es”>
<head>
	<meta charset=”UTF-8”>
	<title>Datos del cliente</title>
    <link rel="stylesheet" href="menu_vista_cliente.css">
</head>
<body>
	<h1>Datos del cliente</h1>
<?php
   require_once("dbaccess.php");
   $sql= "select * from cliente where true ";
   $id_cliente = "10";
   $stmt = $pdo->prepare("SELECT * FROM cliente WHERE dni=:id");
   $stmt->execute(array(':id'=>$id_cliente));
   $row = $stmt->fetch();
        echo "<table border='1px solid'>";
        echo"<tr>";
        echo "<td>".$row['dni']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['apellido_1']."</td>";
        echo "<td>".$row['apellido_2']."</td>";
        echo "<td>".$row['direccion']."</td>";
        echo "<td>".$row['localidad']."</td>";
        echo "<td>".$row['telefono']."</td>";
        echo "<td>".$row['codigo_acceso']."</td>";
        echo"</tr>";
        echo "</table>";
?>


	</form>
</body>
</html>


