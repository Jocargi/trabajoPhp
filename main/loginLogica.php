<?php

session_start();

$email = isset($_POST["email"])? $_POST["email"]:null;
$password = isset($_POST["password"])? $_POST["password"]:null;
$enviar_pressed = isset($_POST["enviar"]);

if($enviar_pressed){

$sql = "SELECT correo, contrasena, rol, id_cliente FROM usuario WHERE correo LIKE :email AND contrasena LIKE :password";

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

if(($resultado['rol'])){
    $_SESSION['correo'] = $resultado['correo'];
    header("Location: vistaAdministradorCliente.php");
}

    $sql_cliente= "SELECT * FROM CLIENTE WHERE dni like :dni";

    $stmt = $pdo -> prepare($sql_cliente);
    $stmt -> execute(array(':dni'=> $resultado['id_cliente']));

    $stmt -> setFetchMode(PDO::FETCH_ASSOC);

    $resultado = $stmt ->fetch();

    $_SESSION['id'] = $resultado['dni'];
    $_SESSION['nombre'] = $resultado['nombre'];


    header("Location: menu_clientes.php"); 
}

?>
