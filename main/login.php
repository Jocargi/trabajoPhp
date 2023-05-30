<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesLogin.css">
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
                    <input type="email" class="input-login" id="email" name="email" placeholder="Nombre de usuario o correo electronico">
                    <input type="password" id="password" class="input-login" name="password" placeholder="Contraseña" />
                    <input type="submit" name="enviar" class="submit" value="INICIAR SESION">
                    <?php
                    include "dbaccess.php";
                    include "loginLogica.php";
                    ?>
                    <div class="no-registrado">
                        <a href="vistaformularioRegistro.php">¿Aun no te has registrado?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>