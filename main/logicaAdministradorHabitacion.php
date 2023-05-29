<?php

$campos = [
    'Id',
    'Nombre',
    'Numero Camas',
    'Numero personas',
    'Precio',
    'Descripcion'
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

    $arrayValues_habitacion = [];
    
    $id = !empty($_POST['id']) ?? $_POST['id'];
    $nombre = !empty($_POST['nombre']) ?? $_POST['nombre'];
    $numero_camas = !empty($_POST['numero_camas']) ?? $_POST['numero_camas'];
    $max_personas = !empty($_POST['max_personas']) ?? $_POST['max_personas'];
    $precio = !empty($_POST['precio']) ?? $_POST['precio'];
    $descripcion = !empty($_POST['descripcion']) ?? $_POST['descripcion'];
    

    $sql_filtrado = "SELECT * FROM HABITACION WHERE TRUE";
    
    if(!empty($id)){
        $sql_filtrado .= " AND id like :id";
        $arrayValues_habitacion[':id'] = "%".$_POST['id']."%";
    }
    
    if(!empty($nombre)){
        $sql_filtrado .= " AND nombre LIKE :nombre";
        $arrayValues_habitacion[':nombre'] = "%".$_POST['nombre']."%";
    }
    
    if(!empty($numero_camas)){
        $sql_filtrado .= " AND numero_camas LIKE :numero_camas";
        $arrayValues_habitacion[':numero_camas'] = "%".$_POST['numero_camas']."%";
    }
    
    if(!empty($max_personas)){
        $sql_filtrado .= " AND max_personas LIKE :max_personas";
        $arrayValues_habitacion[':max_personas'] = "%".$_POST['max_personas']."%";
    }
    
    if(!empty($precio)){
        $sql_filtrado .= " AND precio LIKE :precio";
        $arrayValues_habitacion[':precio'] = "%".$_POST['precio']."%";
    }

    if(!empty($descripcion)){
        $sql_filtrado .= " AND descripcion LIKE :descripcion";
        $arrayValues_habitacion[':descripcion'] = "%".$_POST['descripcion']."%";
    }

    $limit = isset($_POST['registros-pagina']) ? (int) $_POST['registros-pagina']:2;

    $empieza_desde = ($pagina-1)*$registrosPagina;

    $sql_filtrado .= " LIMIT $empieza_desde,$registrosPagina";  

    $stmt = $pdo->prepare($sql_filtrado);
    $resultado = $stmt -> execute($arrayValues_habitacion);

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
        echo "<td>".$resultado["nombre"]."</td>";
        echo "<td>".$resultado["numero_camas"]."</td>";
        echo "<td>".$resultado["max_personas"]."</td>";
        echo "<td>".$resultado["precio"]."</td>";
        echo "<td>".$resultado["descripcion"]."</td>";
        echo "<td>"."<input type='submit' name='modificar' id='btn_modificar' value='MODIFICAR'>" . "</td>"; 
        echo "<td>"."<input type='button' name='$id' id='btn_eliminar' value='ELIMINAR' onclick= eliminarHabitacion('$id') >". "</td>";
        echo "</tr>";
    }
?>