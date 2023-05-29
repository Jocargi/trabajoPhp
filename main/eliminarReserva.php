<?php 

    require_once "dbaccess.php";
    require_once "auth_inc.php";

    $sql_delete = "DELETE FROM RESERVA WHERE id = :id_eliminarReserva";

    $arrayValues[':id_eliminarReserva'] = $_POST['id_eliminarReserva'];

    $stmt = $pdo->prepare($sql_delete);
    $resultado = $stmt->execute($arrayValues);

    if($resultado){
        header("Location: vistaAdministradorReserva.php");
    }

?>