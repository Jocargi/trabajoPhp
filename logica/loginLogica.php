<?php

session_start();

$email = isset($_POST["email"])? $_POST["email"]:null;
$password = isset($_POST["password"])? $_POST["password"]:null;
$enviar_pressed = isset($_POST["enviar"]);

if($enviar_pressed){

$sql = "SELECT u.correo, u.contrasena, u.rol FROM usuario u 
JOIN usuario_cliente uc ON uc.id_usuario = u.nombre
JOIN cliente c ON uc.id_cliente = c.dni
WHERE u.correo LIKE :email AND u.contrasena LIKE :password";

$array_values=[
    ':email' => $email,
    ':password' => $password
];

$resultado=[];

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
} else {

    $sql_cliente= "SELECT * FROM CLIENTE WHERE dni like :dni";

    $stmt = $pdo -> prepare($sql_cliente);
    $stmt -> execute(array(':dni'=> $resultado['id_cliente']));

    $stmt -> setFetchMode(PDO::FETCH_ASSOC);

    print_r($resultado);
    $resultado = $stmt ->fetch();

    $_SESSION['id'] = $resultado['dni'];
    $_SESSION['nombre'] = $resultado['nombre'];

    header("Location: ../vista/vistaReservasPersonal.php");
    }
}catch(PDOException $e){
    echo $e->get_message();
}


?>
