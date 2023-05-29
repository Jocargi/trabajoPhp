<?php 
    
    print_r($arrayValues_reserva);

    $sql_countR = "SELECT COUNT(*) as total_registros FROM RESERVA WHERE TRUE";

   if(!empty($_POST['id'])) $sql_countR.= " AND id like :id";
   
   if(!empty($id_cliente)) $sql_countR.= " AND id_cliente LIKE :id_cliente";
   
   if(!empty($id_habitacion)) $sql_countR.= " AND id_habitacion LIKE :id_habitacion";
   
   if(!empty($fecha_entrada)) $sql_countR.= " AND fecha_entrada LIKE :fecha_entrada";
   
   if(!empty($fecha_salida)) $sql_countR.= " AND fecha_salida LIKE :fecha_salida";

   $stmt = $pdo->prepare($sql_countR);
   $stmt -> execute($arrayValues_reserva);
   
   $total_registros = $stmt->fetch(PDO::FETCH_ASSOC);
   $numero_paginas = ceil($total_registros['total_registros'] / $registrosPagina);

   $btn_ultima_pagina = $pagina < $numero_paginas ? "none" : "hidden"; 
   $btn_pagina_siguiente = $pagina < $numero_paginas ? "none" : "hidden";

   echo "Total registros: " . $total_registros['total_registros']." ";
   echo "Numero de paginas: " .$numero_paginas;
   
?>