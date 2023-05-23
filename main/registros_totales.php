<?php 

    $sql_count = "SELECT COUNT(DNI) as total_registros FROM CLIENTE WHERE TRUE";
    $stmt = $pdo->prepare($sql_count);
    $total_registros = $stmt -> execute($arrayValues_cliente);
    
    $total_registros = $stmt->fetch(PDO::FETCH_ASSOC);
    $numero_paginas = ceil($total_registros['total_registros'] / $registrosPagina);

    echo "Total registros: " . $total_registros['total_registros']." ";
    echo "Numero de paginas: " .$numero_paginas;

?>