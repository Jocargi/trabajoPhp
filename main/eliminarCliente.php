<?php 

    require_once "dbaccess.php";
    require_once "auth_inc.php";

    $sql_delete = "DELETE FROM CLIENTE WHERE correo = :correo";

    $arrayValues_cliente[':correo'] = $_POST['correo'];

    $stmt = $pdo->prepare($sql_delete);
    $resultado = $stmt->execute($arrayValues_cliente);

    if($resultado){
        header("Location: vistaMenuAdministradorCliente.php");
    }

?>