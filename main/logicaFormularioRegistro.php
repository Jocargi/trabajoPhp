<?php

require_once "conexion.php";

$registrarme_pressed = isset($_POST['registrarme']);
if($registrarme_pressed){

$nombre = $_POST['nombre'];
$primer_apellido = $_POST['primer-apellido'];
$segundo_apellido = $_POST['segundo-apellido'];
$dni = $_POST['dni'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$localidad = $_POST['localidad'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];
$nombreUsuario = strtolower($nombre.substr($primer_apellido, 0, 1));



$sql_cliente = "INSERT INTO CLIENTE VALUES (:DNI, :NOMBRE, :PRIMER_APELLIDO, :SEGUNDO_APELLIDO, :CORREO, :DIRECCION, :LOCALIDAD, :TELEFONO)";

$sql_usuario = "INSERT INTO USUARIO VALUES (:NOMBRE, :CORREO, :PASS, :ROL, :ID_CLIENTE)";

$arrayValues_cliente[':DNI'] = $dni;
$arrayValues_cliente[':NOMBRE'] = $nombre;
$arrayValues_cliente[':PRIMER_APELLIDO'] = $primer_apellido;
$arrayValues_cliente[':SEGUNDO_APELLIDO'] = $segundo_apellido;
$arrayValues_cliente[':CORREO'] = $correo;
$arrayValues_cliente[':DIRECCION'] = $direccion;
$arrayValues_cliente[':LOCALIDAD'] = $localidad;
$arrayValues_cliente[':TELEFONO'] = $telefono;

$stmt = $pdo->prepare($sql_cliente);
$resultado = $stmt->execute($arrayValues_cliente);

if(!$resultado){

}

$arrayValues_usuario[':NOMBRE'] = $nombreUsuario;
$arrayValues_usuario[':CORREO'] = $correo;
$arrayValues_usuario['PASS'] = $password;
$arrayValues_usuario['ROL'] = 0;
$arrayValues_usuario[':ID_CLIENTE'] = $dni;

$stmt = $pdo->prepare($sql_usuario);
$resultado = $stmt->execute($arrayValues_usuario);

if($resultado){
    print("El cliente se he registrado con exito");
    sleep(2);
    header("Location: index.php");
} else{
    echo "Cliente no pudo ser añadido";
}
}
?>