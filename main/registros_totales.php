<?php 
    
    print_r($arrayValues_cliente);

    $sql_count = "SELECT COUNT(*) as total_registros FROM CLIENTE WHERE TRUE";
    $stmt = $pdo->prepare($sql_count);
    $stmt -> execute($arrayValues_cliente);
    
    $total_registros = $stmt->fetch(PDO::FETCH_ASSOC);
    $numero_paginas = ceil($total_registros['total_registros'] / $registrosPagina);

    $btn_ultima_pagina = $pagina < $numero_paginas ? "none" : "hidden"; 
    $btn_pagina_siguiente = $pagina < $numero_paginas ? "none" : "hidden";

    echo "Total registros: " . $total_registros['total_registros']." ";
    echo "Numero de paginas: " .$numero_paginas;



?>