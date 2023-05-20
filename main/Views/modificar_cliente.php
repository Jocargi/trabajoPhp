<?php
require_once('/main/dbaccess.php');

if(isset($_GET['id'])){
    $id_cliente = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE id=:id");
    $stmt->execute(array(':id'=>$id_cliente));
}

$cliente = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Cliente</title>
</head>
<body>
    <header>
        <h1>Modificar cliente: <?php //echo $cliente['nombre']; ?></h1>
    </header>
    <main>
        <!--TODO Realizar el formulario-->
    </main>
</body>
</html>