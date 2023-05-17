<?php
require_once("/main/dbaccess.php");

$sql = "SELECT nombre, numero_camas, max_personas, descripcion from habitacion where true";

//En caso de que no se encuentren dichos parámetros, se mostrarán todas las habitaciones
if(isset($_POST["numero-personas"])){
    $numero_personas = $_POST["numero-personas"];
    $sql.=" and max_personas =< $numero_personas";
}

if(isset($_POST["fecha-entrada"])){
    $fecha_entrada = $_POST["fecha-entrada"];
}

if(isset($_POST["fecha-salida"])){
    $fecha_salida = $_POST["fecha-salida"];
}

try {
    $pdo= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Habitaciones disponibles</title>
</head>
<body>
    
</body>
</html>