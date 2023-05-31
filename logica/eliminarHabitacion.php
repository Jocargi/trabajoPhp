<?php 

    require_once "dbaccess.php";
    require_once "auth_inc.php";

    $sql_delete = "DELETE FROM HABITACION WHERE id = :id";

    $arrayValues_habitacion[':id'] = $_POST['id'];

    $stmt = $pdo->prepare($sql_delete);
    $resultado = $stmt->execute($arrayValues_habitacion);

    if($resultado){
        header("Location: vistaMenuAdministradorHabitacion.php");
    }


?>