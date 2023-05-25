<?php
require_once('../dbaccess.php');
$_GET['id'] = 1;
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_cliente = 1;
    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE dni=:id");
    $stmt->execute(array(':id'=>$id_cliente));

    $cliente = $stmt->fetch();
}
else{
    header('Location: ../index.html');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Cliente</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body id="body_modificar_cliente">
    <!--TODO terminar el estilo CSS para la página-->
    <header id="header_modificar_cliente">
        <h1>Modificar cliente: <?php echo $cliente['nombre']; ?></h1>
    </header>
    <main id="main_modificar_cliente">
        <form action="modificar_cliente.php" method="post">
            <div>
                <label for="nombre">
                    Nombre:
                </label>
            <input class="inputModificarCliente" type="text" name="nombre" value=<?php echo "".$cliente['nombre']."";?>>
            </div>
            <div>
                <label for="apellido1">
                    Primer apellido:
                </label>
            <input class="inputModificarCliente" type="text" name="apellido1" value=<?php echo "".$cliente['apellido_1']."";?>>
            </div>
            <div>
                <label for="apellido2">
                    Segundo apellido:
                </label>
            <input class="inputModificarCliente" type="text" name="apellido2" value=<?php echo "".$cliente['apellido_2']."";?>>
            </div>
            <div>
                <label for="email">
                    Email:
                </label>
            <input class="inputModificarCliente" type="text" name="email" value=<?php echo "".$cliente['correo']."";?>>
            </div>
            <div>
                <label for="direccion">
                    Direccion:
                </label>
                <input class="inputModificarCliente" type="text" name="direccion" value=<?php echo "".$cliente['direccion']."";?>>
            </div>
            <div>
                <label for="localidad">
                    Localidad:
                </label>
                <input class="inputModificarCliente" type="text" name="localidad" value=<?php echo "".$cliente['localidad']."";?>>
            </div>
            <div>
                <label for="telefono">
                    Telefono:
                </label>
                <input class="inputModificarCliente" type="text" name="telefono" value=<?php echo "".$cliente['telefono']."";?>>
            </div>
        </form>
    </main>
</body>
</html>