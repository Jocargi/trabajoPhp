<?php 

    require_once "conexion.php";
    require_once "auth_inc.php";

    echo $_POST['correo']."1";

    $sql_delete = "DELETE FROM CLIENTE WHERE correo = :correo";

    $arrayValues = [];
    $arrayValues['correo'] = $_POST['correo'];

    $stmt = $pdo->prepare($sql_delete);
    $resultado = $stmt->execute($arrayValues);

    if($resultado){
        header("Location: vistaMenuAdministrador.php");
    }


?>