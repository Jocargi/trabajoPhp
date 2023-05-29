<?php

$campos = [
    'Id',
    'Id_cliente',
    'Id_habitacion',
    'Fecha Entrada',
    'Fecha_Salida',
];

    require_once "dbaccess.php";

    $pagina = (isset($_POST['pagina'])) ? (int) $_POST['pagina'] : 1;
    
    $registrosPagina = isset($_POST['registros_pagina']) ? (int) $_POST['registros_pagina'] : 4;

    $selected1 = (int)$registrosPagina  == 2 ? "selected" : "none";
    $selected2 = (int)$registrosPagina  == 4 ? "selected" : "none";
    $selected3 = (int)$registrosPagina  == 6 ? "selected" : "none";
    
    if(isset($_POST['siguiente'])){
            $pagina = (int) $_POST['pagina']+ 1;
    }

    if(isset($_POST['anterior'])){
        if($pagina != 1) $pagina = (int) $_POST['pagina']-1;
    }

    if (isset($_POST['primera_pagina'])) $pagina =1;
    $btn_primera_pagina = ($pagina == 1) ? "disabled":"";

    $arrayValues_reserva = [];
    
    $id = !empty($_POST['id']) ?? $_POST['id'];
    $id_cliente = !empty($_POST['id_cliente']) ?? $_POST['id_cliente'];
    $id_habitacion = !empty($_POST['id_habitacion']) ?? $_POST['id_habitacion'];
    $fecha_entrada = !empty($_POST['fecha_entrada']) ?? $_POST['fecha_entrada'];
    $fecha_salida = !empty($_POST['fecha_salida']) ?? $_POST['fecha_salida'];

    $sql_filtrado = "SELECT * FROM RESERVA WHERE TRUE";
    
    if(!empty($id)){
        $sql_filtrado .= " AND id like :id";
        $arrayValues_reserva[':id'] = "%".$_POST['id']."%";
    }
    
    if(!empty($id_cliente)){
        $sql_filtrado .= " AND id_cliente LIKE :id_cliente";
        $arrayValues_reserva[':id_cliente'] = "%".$_POST['id_cliente']."%";
    }
    
    if(!empty($id_habitacion)){
        $sql_filtrado .= " AND id_habitacion LIKE :id_habitacion";
        $arrayValues_reserva[':id_habitacion'] = "%".$_POST['id_habitacion']."%";
    }
    
    if(!empty($fecha_entrada)){
        $sql_filtrado .= " AND fecha_entrada LIKE :fecha_entrada";
        $arrayValues_reserva[':fecha_entrada'] = "%".$_POST['fecha_entrada']."%";
    }
    
    if(!empty($fecha_salida)){
        $sql_filtrado .= " AND fecha_salida LIKE :fecha_salida";
        $arrayValues_reserva[':fecha_salida'] = "%".$_POST['fecha_salida']."%";
    }

    $limit = isset($_POST['registros-pagina']) ? (int) $_POST['registros-pagina']:4;

    $empieza_desde = ($pagina-1)*$registrosPagina;

    $sql_filtrado .= " LIMIT $empieza_desde,$registrosPagina";  

    $stmt = $pdo->prepare($sql_filtrado);
    $resultado = $stmt -> execute($arrayValues_reserva);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

        echo "<thead>";
        echo "<tr>";
        foreach ($campos as $campo) {
            echo "<th>" . $campo. "</th>";
        }
        echo "</tr>";
        echo "</thead>";

    while($resultado = $stmt -> fetch()){

        $id = $resultado['id']; 

        echo "<tr>";
        echo "<td>".$resultado["id"]."</td>";
        echo "<td>".$resultado["id_cliente"]."</td>";
        echo "<td>".$resultado["id_habitacion"]."</td>";
        echo "<td>".$resultado["fecha_entrada"]."</td>";
        echo "<td>".$resultado["fecha_salida"]."</td>";
        echo "<td>"."<input type='submit' name='modificar' id='btn_modificar' value='MODIFICAR'>" . "</td>"; 
        echo "<td>"."<input type='button' name='$id' id='btn_eliminar' value='ELIMINAR' onclick= eliminarReserva('$id') >". "</td>";
        echo "</tr>";
    }
?>