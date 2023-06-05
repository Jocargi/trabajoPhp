<?php

require_once "../main/auth_inc.php";
require_once "../main/dbaccess.php";


$campos = [
    'Id',
    'Id_cliente',
    'Id_habitacion',
    'Fecha Entrada',
    'Fecha_Salida',
];

$sql = "SELECT * FROM RESERVA WHERE id_cliente = :id";
$array_valuess[':id'] = $_SESSION['id'];

$stmt = $pdo->prepare($sql);
$stmt->execute($array_valuess);

$stmt->setFetchMode(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas</title>
    <link rel="stylesheet" href="../css/stylesMenuAdministrador.css" type="text/css">
    <script src="../js/eliminarReserva.js" type="text/javascript"></script>
</head>

<body>

    <h1> MIS RESERVAS</h1>

    <header>
        <div class="name-banner">
            <button name="logout" onclick="location.href='../main/cerrar_sesion.php'"><?php echo $_SESSION['correo'] ?> </button>
        </div>
        <nav>
            <ul>
                <a href="../vista/vistaReservasPersonal.php">
                    <li>MIS RESERVAS</li>
                </a>
                <a href="../main/modificar_cliente.php">
                    <li>MIS DATOS</li>
                </a>
            </ul>
        </nav>
    </header>

    <main>

        <div class="form-container">
            <form action="vistaReservasPersonal.php" method="Post">

                <div class="gr1">
                    <label for="id">ID RESERVA: </label>
                    <input type="text" name="id" placeholder="..." value="<?php if (isset($_POST['id'])) echo $_POST['id']; ?>">
                </div>
                <div class="gr2">
                    <label for="fecha_entrada">FECHA ENTRADA:</label>
                    <input type="date" name="fecha_entrada" placeholder="..." value="<?php if (isset($_POST['fecha_entrada'])) echo $_POST['fecha_entrada']; ?>">
                </div>
                <div class="gr3">
                    <label for="fecha_salida">FECHA SALIDA:</label>
                    <input type="date" name="fecha_salida" placeholder="..." value="<?php if (isset($_POST['fecha_salida'])) echo $_POST['fecha_salida']; ?>">
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
                    while ($resultado = $stmt->fetch()) {

                        $idReserva = $resultado['id'];

                        echo "<tr>";
                        echo "<td>" . $resultado["id"] . "</td>";
                        echo "<td>" . $resultado["id_cliente"] . "</td>";
                        echo "<td>" . $resultado["id_habitacion"] . "</td>";
                        echo "<td>" . $resultado["fecha_entrada"] . "</td>";
                        echo "<td>" . $resultado["fecha_salida"] . "</td>";
                        echo "<td>" . "<input type='submit' name='modificar' id='btn_modificar' value='MODIFICAR'>" . "</td>";
                        echo "<td>" . "<input type='button' name='$idReserva' id='btn_eliminar' value='ELIMINAR' onclick= eliminarReserva('$idReserva') >" . "</td>";
                        echo "</tr>";
                    }
                
                ?>
            </table>
        </div>

        <!-- <div class="paginador">
       
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

    </div> -->
        </form>

    </main>
</body>

</html>