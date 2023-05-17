<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";

$email = isset($_POST["email"])? $_POST["email"]:null;
$password = isset($_POST["password"])? $_POST["password"]:null;
$enviar_pressed = isset($_POST["enviar"])? true:false;

//TODO Consulta a la BD que User and Pass es correcto.

$login_correcto = true;

//Redireccion a la pagina principal de la app
if ($login_correcto){
    session_start();
    $_SESSION["email"] = $email;
    header("Location: index.html");
}


if($enviar_pressed){
    echo "post";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>

    <h1>login</h1>
    <form action="login.php" method="post">
        <label for="email">Email: </label>
        <input tpye="email"name="email">
        <label for="password">Password</label>
        <input type="password" name="password">
        <input type="reset" value="cancelar">
        <input type="submit" value="Enviar" name="Enviar">
        <input type="submit" value="Cerrar Sesion" name= "cerrar-sesion">
        <input type="submit" value="Cerrar Sesion" name= "cerrar-sesion">
    </form>
    
</body>
</html>