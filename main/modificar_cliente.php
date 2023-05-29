<?php
require_once('dbaccess.php');
$_GET['id'] = 123456789;
$dni = $_GET['id'];
$usuarioActualizado=false;
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_cliente = 123456789;
    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE dni=:id");
    $stmt->execute(array(':id'=>$id_cliente));
    $cliente = $stmt->fetch();
}
else{
    header('Location: index.html');
}

//Comprueba si se ha enviado la petición de modificar el cliente
if(isset($_POST) && !empty($_POST)){
    $usuarioActualizado = true;
    $sql = "UPDATE cliente SET nombre=:nombre, apellido1=:apellido_1, apellido2=:apellido_2,email=:email, direccion=:direccion, localidad=:localidad, telefono=:telefono WHERE dni=:id";
    $stmt -> prepare($sql);
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $stmt->execute(array(':dni'=>$dni, ':nombre'=>$id_cliente, ':apellido1'=>$apellido1, ':apellido2'=>$apellido2, ':email'=>$email, ':direccion'=>$direccion, ':localidad'=>$localidad));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Cliente</title>
    <link rel="stylesheet" href="stylesRegistro.css">
    <link rel="stylesheet" href="styles_Menu_clientes.css">
    <script src=""></script>p
</head>
<body>
    <header>
        <h1>Modificar cliente: <?php echo $cliente['nombre']; ?></h1>
    </header>
    <main id="main_modificar_cliente">
        <form action="modificar_cliente.php" method="post">
            <div>
                <label for="dni">
                    DNI:
                </label>
            <input type="text" name="dni" value=<?php echo "".$cliente['dni']."";?> readonly>
            </div>
            <div>
                <label for="nombre">
                    Nombre:
                </label>
            <input type="text" name="nombre" value=<?php echo "".$cliente['nombre']."";?>>
            </div>
            <div>
                <label for="apellido1">
                    Primer apellido:
                </label>
            <input type="text" name="apellido1" value=<?php echo "".$cliente['apellido_1']."";?>>
            </div>
            <div>
                <label for="apellido2">
                    Segundo apellido:
                </label>
            <input type="text" name="apellido2" value=<?php echo "".$cliente['apellido_2']."";?>>
            </div>
            <div>
                <label for="email">
                    Email:
                </label>
            <input type="text" name="email" value=<?php echo "".$cliente['correo']."";?>>
            </div>
            <div>
                <label for="direccion">
                    Direccion:
                </label>
                <input type="text" name="direccion" value=<?php echo "".$cliente['direccion']."";?>>
            </div>
            <div>
                <label for="localidad">
                    Localidad:
                </label>
                <input type="text" name="localidad" value=<?php echo "".$cliente['localidad']."";?>>
            </div>
            <div>
                <label for="telefono">
                    Telefono:
                </label>
                <input type="text" name="telefono" value=<?php echo "".$cliente['telefono']."";?>>
            </div>
            <input type="submit" value="Modificar">
        </form>
        <div style="<?php echo $usuarioActualizado ? "" : "display=none".";" ?>" id="mensajeClienteModificado"><h3>¡Cliente modificado!</h3></div>
    </main>
</body>
</html>