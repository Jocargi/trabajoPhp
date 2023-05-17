<?php

require_once "conexion.php";

echo "<pre>";
print_r($_POST);
echo "</pre>";

$email = isset($_POST["email"])? $_POST["email"]:null;
$password = isset($_POST["password"])? $_POST["password"]:null;
//$enviar_pressed = isset($_POST["enviar"]);

$sql = "Select correo, contrasena from usuario where correo like :email and contrasena like :password";

$array_values =[];
$resultado=[];

$array_values[":email"] = $email;
$array_values[":password"] = $password;

$stmt = $pdo->prepare($sql);
$resultado = $stmt->execute($array_values);

$stmt->setFetchMode(PDO::FETCH_ASSOC);

$resultado = $stmt->fetch();

print_r($resultado);

if(empty($resultado)){
    header("Location: login.php");
}

echo "<pre>";
print_r($resultado);
echo "</pre>";

    
    /*     session_start();
        $_SESSION["email"] = $email;
        header("Location: login.php"); */


//TODO Consulta a la BD que User and Pass es correcto.

//Redireccion a la pagina principal de la app

   // echo "post";


?>
