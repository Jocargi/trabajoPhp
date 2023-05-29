<?php 

    require_once "dbaccess.php";
    require_once "auth_inc.php";

    $sql_delete = "DELETE FROM RESERVA WHERE id = :id";

    $arrayValues_reserva[':id'] = $_POST['id'];

    $stmt = $pdo->prepare($sql_delete);
    $resultado = $stmt->execute($arrayValues_reserva);

    if($resultado){
        header("Location: vistaAdministradorReserva.php");
    }

?>