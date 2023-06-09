<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTRO</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
  <link href="../css/stylesRegistro.css" rel="stylesheet" type="text/css">
  <script src="mostrarPassword.js" type="text/javascript"></script>
</head>

<body>
  <main>
    <div class="registro-container">
      <div class="form">
        <div class="title">
          <h1>Estás un paso más cerca de conocer todas nuestras ofertas al detalle. <span>¡REGISTRATE Y ENTERATE DE TODO!</span></h1>
        </div>
        <form action="vistaformularioRegistro.php" method="POST">
          <input type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[A-Za-z ]{0,60}" required />
          <input type="text" name="primer-apellido" id="primer-apellido" placeholder="Primer apellido" pattern="[A-Za-z ]{0,60}" required />
          <input type="text" name="segundo-apellido" id="segundo-apellido" placeholder="Segundo apellido" pattern="[A-Za-z ]{0,60}" required />
          <input type="text" name="dni" id="dni" placeholder="DNI" pattern="[A-Z0-9]{0,60}" required />
          <input type="text" name="correo" id="correo" placeholder="Correo" required />
          <input type="text" name="direccion" id="direccion" placeholder="Direccion" required />
          <input type="text" name="localidad" id="localidad" placeholder="Localidad" pattern="[A-Za-z ]{0,60}" required />
          <input type="text" name="telefono" id="telefono" placeholder="Telefono" required />
          <div class="password">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="password" name="password" placeholder="Confirmar Contraseña">
          </div>
          <label><input type="checkbox" name="terms" required> Registr&aacute;ndote en la p&aacute;gina est&aacute;s aceptando nuestra
            pol&iacute;tica de condiciones <a href="http://www.globalacademyjobs.com/terms.aspx">t&eacute;rminos y condiciones.</a></label>
          
            <?php include "../logica/logicaFormularioRegistro.php" ?>
          
            <input type="submit" value="Registrarme" name="registrarme">

        </form>
      </div>
    </div>
  </main>
</body>

</html>