<?php

session_start();

$email = isset($_POST["email"])? $_POST["email"]:null;
$password = isset($_POST["password"])? $_POST["password"]:null;
$enviar_pressed = isset($_POST["enviar"]);

if($enviar_pressed){

$sql = "SELECT correo, contrasena, rol FROM usuario WHERE correo LIKE :email AND contrasena LIKE :password";

$array_values=[];
$resultado=[];

$array_values[":email"] = $email;
$array_values[":password"] = $password;

$stmt = $pdo->prepare($sql);
$resultado = $stmt->execute($array_values);

$stmt->setFetchMode(PDO::FETCH_ASSOC);

$resultado = $stmt->fetch();

if(!empty($resultado)){
    header("Location: login.php");
}

$_SESSION['correo'] = $email;

if(($resultado['rol'])){
    header("Location: vistaMenuAdministrador.php");
} else{
    header("Location: menu_clientes.html"); 
}

}

?>
