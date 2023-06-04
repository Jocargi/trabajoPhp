<?php
    require_once "auth_inc_cliente.php";
    require_once('dbaccess.php');

    $dni = $_SESSION['id'];
    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE dni=:id");
    $stmt->execute(array(':id' => $dni));
    $cliente = $stmt->fetch();

    $usuarioActualizado = false;

//Comprueba si se ha enviado la petición de modificar el cliente
if(isset($_POST) && !empty($_POST)){
    $usuarioActualizado = true;
    $sql = "UPDATE cliente SET nombre=:nombre, apellido_1=:apellido_1, apellido_2=:apellido_2,correo=:correo, direccion=:direccion, localidad=:localidad, telefono=:telefono WHERE dni=:id";
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $telefono = $_POST['telefono'];

    $stmt = $pdo -> prepare($sql);
    $stmt->execute(array(':id'=>$dni, ':nombre'=>$nombre, ':apellido_1'=>$apellido1, ':apellido_2'=>$apellido2, ':correo'=>$correo, ':direccion'=>$direccion, ':localidad'=>$localidad, ':telefono'=>$telefono));
    $stmt -> setFetchMode(PDO::FETCH_ASSOC);

    $_SESSION['nombre'] = $nombre;

    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE dni=:id");
    $stmt->execute(array(':id' => $dni));
    $cliente = $stmt->fetch();

}
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Cliente</title>
    <link rel="stylesheet" href="../css/stylesModificarDatos.css">
</head>
</head>
<body>
    <header>
        <h1>Modificar datos</h1>
        <div class="parte-abajo">
            <a href="../vista/vistaReservasPersonal.php">Volver</a>
        </div>
    </header>
    <main id="main_modificar_cliente">
        <form action="modificar_cliente.php" method="post">
            <div>
                <label for="dni">
                    DNI:
                </label>
            <input type="text" name="dni" value="<?php echo "".$cliente['dni']."";?>" readonly>
            </div>
            <div>
                <label for="nombre">
                    Nombre:
                </label>
            <input type="text" name="nombre" value="<?php echo "".$cliente['nombre']."";?>">
            </div>
            <div>
                <label for="apellido1">
                    Primer apellido:
                </label>
            <input type="text" name="apellido1" value="<?php echo "".$cliente['apellido_1']."";?>">
            </div>
            <div>
                <label for="apellido2">
                    Segundo apellido:
                </label>
            <input type="text" name="apellido2" value="<?php echo "".$cliente['apellido_2']."";?>">
            </div>
            <div>
                <label for="email">
                    Email:
                </label>
            <input type="text" name="correo" value="<?php echo "".$cliente['correo']."";?>">
            </div>
            <div>
                <label for="direccion">
                    Direccion:
                </label>
                <input type="text" name="direccion" value="<?php echo "".$cliente['direccion']."";?>">
            </div>
            <div>
                <label for="localidad">
                    Localidad:
                </label>
                <input type="text" name="localidad" value="<?php echo "".$cliente['localidad']."";?>">
            </div>
            <div>
                <label for="telefono">
                    Telefono:
                </label>
                <input type="text" name="telefono" value="<?php echo "".$cliente['telefono']."";?>">
            </div>
            <div class="btn-modificar">
                <input type="submit" value="Modificar">
            </div>
            <div style="<?php echo $usuarioActualizado ? "" : "display:none;"; ?>" id="mensajeClienteModificado"><h3>¡Cliente modificado!</h3></div>
        </form>
        
    </main>
</body>
</html>