<?php 
    
    print_r($arrayValues_cliente);

    $sql_count = "SELECT COUNT(DNI) as total_registros FROM CLIENTE WHERE TRUE";

   if(!empty($nombre)) $sql_count.= " AND nombre like :nombre";
   
   if(!empty($apellido1)) $sql_count.= " AND apellido_1 LIKE :apellido_1";
   
   if(!empty($apellido2)) $sql_count.= " AND apellido_2 LIKE :apellido_2";
   
   if(!empty($dni)) $sql_count.= " AND dni LIKE :dni";
   
   if(!empty($correo)) $sql_count.= " AND correo LIKE :correo";
      
   if(!empty($direccion)) $sql_count.= " AND direccion LIKE :direccion";
     
   if(!empty($localidad)) $sql_count.= " AND localidad LIKE :localidad";
    
   if(!empty($telefono)) $sql_count.= " AND telefono LIKE :telefono";

   $stmt = $pdo->prepare($sql_count);
   $stmt -> execute($arrayValues_cliente);
   
   $total_registros = $stmt->fetch(PDO::FETCH_ASSOC);
   $numero_paginas = ceil($total_registros['total_registros'] / $registrosPagina);

   $btn_ultima_pagina = $pagina < $numero_paginas ? "none" : "hidden"; 
   $btn_pagina_siguiente = $pagina < $numero_paginas ? "none" : "hidden";

   echo "Total registros: " . $total_registros['total_registros']." ";
   echo "Numero de paginas: " .$numero_paginas;
   
?>