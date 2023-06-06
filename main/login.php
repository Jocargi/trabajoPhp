<?php

require_once "dbaccess.php";

session_start();

$email = isset($_POST["email"]) ? $_POST["email"] : null;
$password = isset($_POST["password"]) ? $_POST["password"] : null;
$enviarPresed = isset($_POST['enviar']);

if ($enviarPresed) {

    $mensaje = false;
    
    $sql = "SELECT correo, contrasena, rol, id_cliente FROM usuario WHERE correo LIKE :email AND contrasena LIKE :password";

    $array_values = [];

    $array_values[":email"] = $email;
    $array_values[":password"] = $password;

    $stmt = $pdo->prepare($sql);
    $stmt->execute($array_values);

    $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $resultado = $stmt->fetch();

    if ($resultado) $mensaje = true;

    if (!empty($resultado)) {
        $_SESSION['rol'] = $resultado['rol'];

        if (($resultado['rol'])) {
            $_SESSION['correo'] = $resultado['correo'];
            header("Location: ../vista/vistaAdministradorCliente.php");
        } else {

            $sql_cliente = "SELECT * FROM CLIENTE WHERE dni like :dni";

            $stmt = $pdo->prepare($sql_cliente);
            $stmt->execute(array(':dni' => $resultado['id_cliente']));

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $resultado = $stmt->fetch();

            $_SESSION['id'] = $resultado['dni'];
            $_SESSION['correo'] = $resultado['correo'];

            header("Location: ../vista/vistaReservasPersonal.php");
        }
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/stylesLogin.css">
</head>

<body>
    <h1>TARIFA DREAMS</h1>
    <div class="main-container">
        <div class="form-container">
            <div class="form">
                <div class="img-login">
                    <img src="images/user-6769.svg" alt="">
                </div>
                <form action="login.php" method="POST">
                    <div class="mensajeError" style="<?php echo $mensaje ?? "display:none;"; ?>">
                        <h3>Correo o contraseña incorrectos</h3>
                    </div>
                    <input type="email" class="input-login" id="email" name="email" value="<?php echo isset($_POST['email']) ? $email : ""; ?>" placeholder="Nombre de usuario o correo electronico">
                    <input type="password" id="password" class="input-login" name="password" placeholder="Contraseña" />
                    <input type="submit" name="enviar" class="submit" value="INICIAR SESION">
                    <div class="no-registrado">
                        <a href="../vista/vistaformularioRegistro.php">¿Aun no te has registrado?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>