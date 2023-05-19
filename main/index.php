<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarifa Dreams</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <header>
        <div class="parte-superior">
            <div class="parte-superior-izquierda">
                <a href="index.php">Tarifa Dreams</a>
            </div>
            <a href="login.php"><img src="images/user-676.svg" alt="logo"></a>
            <div class="parte-superior-derecha">
            </div>
        </div>
        <div class="parte-abajo">
            <ul>
                <li><a href="">Servicios</a></li>
                <li><a href="">Empresa</a></li>
                <li><a href="">Nosotros</a></li>
                <li><a href="">Contacto</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="main-form">
            <img src="images/16468231897426.jpg" alt="">
            <div class="formulario">
                <span>HAZ TU RESERVA YA</span>
                <form action="index.html" method="post">
                    <label for="numero-personas">Personas</label>
                    <input type="number" name="numero-personas" id="numero-personas" required>
                    <label for="fecha-entrada">Fecha entrada</label>
                    <input type="date" name="fecha-entrada" id="fecha-entrada" required>
                    <label for="fecha_salida">Fecha salida</label>
                    <input type="date" name="fecha-salida" id="fecha-salida" required>
                    <input type="submit" name="buscar" id="buscar-habitaciones" value="BUSCA LAS MEJORES HABITACIONES">
                </form>
            </div>
        </div>


        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
              <img src="images/img_snow_wide.jpg">
            </div>
          
            <div class="mySlides fade">
              <img src="images/img_nature_wide.jpg">
            </div>
          
            <div class="mySlides fade">
              <img src="images/img_mountains_wide.jpg">
            </div>
          
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>
          <br>
          
          <!-- The dots/circles -->
          <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
          </div>

          <script>
            let slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
            </script>

    </main>

</body>
</html>