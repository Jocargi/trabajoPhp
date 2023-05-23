<?php

    require_once "conexion.php";

   /*  $submit = isset($_POST['filtrar']);

    if(!$submit) return; */

    
    $pagina = (isset($_POST['pagina'])) ? (int) $_POST['pagina'] : 1;
    
    $registrosPagina = isset($_POST['registros_pagina']) ? (int) $_POST['registros_pagina'] : 2;

    if(isset($_POST['siguiente'])){
        $pagina = (int) $_POST['pagina']+ 1;
    }

    if(isset($_POST['anterior'])){
        if($pagina != 1) $pagina = (int) $_POST['pagina']-1;
    }

    if (isset($_POST['primera_pagina'])) $pagina =1;
    $btn_primera_pagina = ($pagina == 1) ? "disabled":"";

    $arrayValues_cliente = [];

    $sql_filtrado = "SELECT * FROM CLIENTE WHERE TRUE";

    $nombre = !empty($_POST['nombre']) ?? $_POST['nombre'];
    $apellido1 = !empty($_POST['apellido1']) ?? $_POST['apellido1'];
    $apellido2 = !empty($_POST['apellido2']) ?? $_POST['apellido2'];
    $dni = !empty($_POST['dni']) ?? $_POST['dni'];
    $correo = !empty($_POST['correo']) ?? $_POST['correo'];
    $direccion = !empty($_POST['direccion']) ?? $_POST['direccion'];
    $localidad = !empty($_POST['localidad']) ?? $_POST['localidad'];
    $telefono = !empty($_POST['telefono']) ?? $_POST['telefono'];

    $campos = [
        'Nombre',
        'Apellido1',
        'Apellido2',
        'Dni',
        'Correo',
        'Direccion',
        'Localidad',
        'Telefono'
    ];
    
    if(!empty($nombre)){
        $sql_filtrado .= " AND nombre like :nombre";
        $arrayValues_cliente[':nombre'] = "%".$_POST['nombre']."%";
    }
    
    if(!empty($apellido1)){
        $sql_filtrado .= " AND apellido1 LIKE :apellido1";
        $arrayValues_cliente[':apellido1'] = "%".$_POST['apellido1']."%";
    }
    
    if(!empty($apellido2)){
        $sql_filtrado .= " AND apellido2 LIKE :apellido2";
        $arrayValues_cliente[':apellido2'] = "%".$_POST['apellido2']."%";
    }
    
    if(!empty($dni)){
        $sql_filtrado .= " AND dni LIKE :dni";
        $arrayValues_cliente[':dni'] = "%".$_POST['dni']."%";
    }
    
    if(!empty($correo)){
        $sql_filtrado .= " AND correo LIKE :correo";
        $arrayValues_cliente[':correo'] = "%".$_POST['correo']."%";
    }
    
    if(!empty($direccion)){
        $sql_filtrado .= " AND direccion LIKE :direccion";
        $arrayValues_cliente[':direccion'] = "%".$_POST['direccion']."%";
    }
    
    if(!empty($localidad)){
        $sql_filtrado .= " AND localidad LIKE :localidad";
        $arrayValues_cliente[':localidad'] = "%".$_POST['localidad']."%";
    }
    
    if(!empty($telefono)){
        $sql_filtrado .= " AND telefono LIKE :telefono";
        $arrayValues_cliente[':telefono'] = "%".$_POST['telefono']."%";
    }

    $limit = isset($_POST['registros-pagina']) ? (int) $_POST['registros-pagina']:2;

    $empieza_desde = ($pagina-1)*$registrosPagina;

    $sql_filtrado .= " LIMIT $empieza_desde,$registrosPagina";  

    $stmt = $pdo->prepare($sql_filtrado);
    $resultado = $stmt -> execute($arrayValues_cliente);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

        echo "<thead>";
        echo "<tr>";
        foreach ($campos as $campo) {
            echo "<th>" . $campo. "</th>";
        }
        echo "</tr>";
        echo "</thead>";
    
    while($resultado = $stmt -> fetch()){
        echo "<tr>";
        echo "<td>".$resultado["nombre"]."</td>";
        echo "<td>".$resultado["apellido_1"]."</td>";
        echo "<td>".$resultado["apellido_2"]."</td>";
        echo "<td>".$resultado["dni"]."</td>";
        echo "<td>".$resultado["correo"]."</td>";
        echo "<td>".$resultado["direccion"]."</td>";
        echo "<td>".$resultado["localidad"]."</td>";
        echo "<td>".$resultado["telefono"]."</td>";
        echo "<td>"."<input type='submit' name='modificar' id='btn_modificar' value='MODIFICAR'>"."</td>"; 
        echo "<td>"."<input type='submit' name='eliminar' id='btn_eliminar' value='ELIMINAR'>"."</td>"; 
        echo "</tr>";
    }


?>