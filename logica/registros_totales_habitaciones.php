<?php 
    
    print_r($arrayValues_habitacion);

    $sql_count = "SELECT COUNT(id) as total_registros FROM HABITACION WHERE TRUE";

   if(!empty($_POST['id'])) $sql_count.= " AND id like :id";
   
   if(!empty($nombre)) $sql_count.= " AND nombre LIKE :nombre";
   
   if(!empty($numero_camas)) $sql_count.= " AND numero_camas LIKE :numero_camas";
   
   if(!empty($numero_personas)) $sql_count.= " AND numero_personas LIKE :numero_personas";
   
   if(!empty($precio)) $sql_count.= " AND precio LIKE :precio";
      
   if(!empty($descripcion)) $sql_count.= " AND descripcion LIKE :descripcion";

   $stmt = $pdo->prepare($sql_count);
   $stmt -> execute($arrayValues_habitacion);
   
   $total_registros = $stmt->fetch(PDO::FETCH_ASSOC);
   $numero_paginas = ceil($total_registros['total_registros'] / $registrosPagina);

   $btn_ultima_pagina = $pagina < $numero_paginas ? "none" : "hidden"; 
   $btn_pagina_siguiente = $pagina < $numero_paginas ? "none" : "hidden";

   echo "Total registros: " . $total_registros['total_registros']." ";
   echo "Numero de paginas: " .$numero_paginas;
   
?>