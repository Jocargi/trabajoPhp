<?php 

require_once "../main/auth_inc.php";
require_once "../main/auth_inc_admin.php";

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

    require_once "../main/dbaccess.php";

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

    $arrayValues_cliente = [];
    
    $nombre = !empty($_POST['nombre']) ?? $_POST['nombre'];
    $apellido1 = !empty($_POST['apellido_1']) ?? $_POST['apellido_1'];
    $apellido2 = !empty($_POST['apellido_2']) ?? $_POST['apellido_2'];
    $dni = !empty($_POST['dni']) ?? $_POST['dni'];
    $correo = !empty($_POST['correo']) ?? $_POST['correo'];
    $direccion = !empty($_POST['direccion']) ?? $_POST['direccion'];
    $localidad = !empty($_POST['localidad']) ?? $_POST['localidad'];
    $telefono = !empty($_POST['telefono']) ?? $_POST['telefono'];


    $sql_filtrado = "SELECT * FROM CLIENTE WHERE TRUE";

    
    if(!empty($nombre)){
        $sql_filtrado .= " AND nombre like :nombre";
        $arrayValues_cliente[':nombre'] = "%".$_POST['nombre']."%";
    }
    
    if(!empty($apellido1)){
        $sql_filtrado .= " AND apellido_1 LIKE :apellido_1";
        $arrayValues_cliente[':apellido_1'] = "%".$_POST['apellido_1']."%";
    }
    
    if(!empty($apellido2)){
        $sql_filtrado .= " AND apellido_2 LIKE :apellido_2";
        $arrayValues_cliente[':apellido_2'] = "%".$_POST['apellido_2']."%";
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

    if(isset($_POST['modificarRegistro'])){
        header("Location: ../main/index.php");
        /* $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $stmt->fetch(); */
    }

    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Administrador</title>
    <link rel="stylesheet" href="../css/stylesMenuAdministrador.css" type="text/css">
    <script src="../js/eliminarCliente.js" type="text/javascript"></script>
    <script src="../js/modificarCliente.js" type="text/javascript"></script>
</head>
<body>
<h1>ADMINISTRACION CLIENTES</h1>
    <header>
        <div class="name-banner">
            <button name="logout" onclick="location.href='../main/cerrar_sesion.php'"><?php
            echo $_SESSION['correo'] ?>
            </button>
        </div>
        <nav>
            <ul>
                <a href="vistaAdministradorCliente.php"><li>CLIENTE</li></a>
                <a href="vistaAdministradorReserva.php"><li>RESERVA</li></a>
                <a href="vistaAdministradorHabitacion.php"><li>HABITACION</li></a>
            </ul>
        </nav>
    </header>

<main>

    <div class="form-container">
        <form action="../vista/vistaAdministradorCliente.php" method="Post">

            <div class="gr1">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" placeholder="..." value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre']; ?>">
                <label for="apellido_1">P. Apellido:</label>
                <input type="text" name="apellido_1" placeholder="..." value="<?php if (isset($_POST['apellido_1'])) echo $_POST['apellido_1']; ?>">
                <label for="apellido_2">S. Apellido: </label>
                <input type="text" name="apellido_2" placeholder="..." value="<?php if (isset($_POST['apellido_2'])) echo $_POST['apellido_2']; ?>">
            </div>
            
            <div class="gr2">

                <label for="dni">DNI:</label>
                <input type="text" name="dni" placeholder="..." value="<?php if (isset($_POST['dni'])) echo $_POST['dni']; ?>">
                <label for="correo">Correo:</label>
                <input type="text" name="correo" placeholder="..." value="<?php if (isset($_POST['correo'])) echo $_POST['correo']; ?>">
                <label for="direccion">Direccion:</label>
                <input type="text" name="direccion" placeholder="..." value="<?php if (isset($_POST['direccion'])) echo $_POST['direccion']; ?>">
            </div>

            <div class="gr3"> 
            
                <label for="localidad">Localidad:</label>
                <input type="text" name="localidad" placeholder="..." value="<?php if (isset($_POST['localidad'])) echo $_POST['localidad']; ?>">
                
                <label for="telefono">Telefono:</label>
                <input type="text" name="telefono" placeholder="..." value="<?php if (isset($_POST['telefono'])) echo $_POST['telefono']; ?>">

            </div>
            
            <input type="submit" name="filtrar" value="FILTRAR">
            <input type="reset" name="limpiar" value="LIMPIAR">

    </div>
    <div class="tabla-container">
            <table class="table">
                <?php
            echo "<thead>";
        echo "<tr>";
        foreach ($campos as $campo) {
            echo "<th>" . $campo. "</th>";
        }
        echo "</tr>";
        echo "</thead>";

    while($resultado = $stmt -> fetch()){

        $correoEliminacion = $resultado['correo'];
        $idEliminacion = $resultado['dni'];

        echo "<tr>";
        echo "<td>".$resultado["nombre"]."</td>";
        echo "<td>".$resultado["apellido_1"]."</td>";
        echo "<td>".$resultado["apellido_2"]."</td>";
        echo "<td>".$resultado["dni"]."</td>";
        echo "<td>".$resultado["correo"]."</td>";
        echo "<td>".$resultado["direccion"]."</td>";
        echo "<td>".$resultado["localidad"]."</td>";
        echo "<td>".$resultado["telefono"]."</td>";
        echo "<td>"."<input type='button' name='$idEliminacion' id='btn_modificar' value='MODIFICAR' onclick= modificarCliente('$idEliminacion') >" . "</td>"; 
        echo "<td>"."<input type='button' name='$correoEliminacion' id='btn_eliminar' value='ELIMINAR' onclick= eliminarCliente('$correoEliminacion') >". "</td>";
        echo "</tr>";
    }
    ?>
            </table>
    </div>

    <div class="paginador">
        <?php include "../logica/registros_totales_cliente.php"; ?>
        <input type="submit" name="primera_pagina" value="&lt;&lt;" <?php echo $btn_primera_pagina; ?> >
        <input type="submit" name="anterior" value="&lt;">
        <input type="number" name="pagina" value="<?php echo $pagina; ?>">
        <input type="submit" name="siguiente" value="&gt;" <?php echo $btn_ultima_pagina; ?>>
        <input type="submit" name="ultima_pagina" value="&gt;&gt;" <?php echo $btn_ultima_pagina; ?>>
        <select name="registros_pagina">
            <option value="2" <?php echo $selected1; ?>>2</option>
            <option value="4" <?php echo $selected2; ?>>4</option>
            <option value="6" <?php echo $selected3; ?>>6</option>
        </select>

    </div>
</form>

</main>
</body>
</html>