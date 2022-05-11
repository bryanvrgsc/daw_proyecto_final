<!DOCTYPE html>
<html lang="es">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="TemplateMo">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <title>Café Nook</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
              Café Nook
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li><a href="tienda.php">Tienda</a></li>
              <li class="scroll-to-section"><a href="#contact">Contacto</a></li>
              <li><a href="login_signin.php">Registro/Inicio de Sesión</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
      <?php
      $user = "bryanvargas";
      $password = "Rockito5515";
      $host = "localhost";
      $port = "5432";
      $dbname = "cafe";
      $strconn = "host=$host port=$port dbname=$dbname user=$user password=$password";
      $conn = pg_Connect($strconn);
      if (!$conn) {
        echo "NO se conecto a la base\n";
      }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["nombre"]) || !empty($_POST["apellido"]) || !empty($_POST["email"])) {
          $nombre = $_POST["nombre"];
          $apellido = $_POST["apellido"];
          $email = $_POST["email"];
          $query = pg_query($conn, "INSERT  INTO usuarios(nombre, apellido, email) VALUES ('$nombre','$apellido','$email');");
          // $query = pg_query($conn, "INSERT  INTO usuarios(nombre, apellido, email) VALUES ('nombretest','apellidotest','emailtest');");
          if ($query) {
            echo "
            <div class='alert alert-success' role='alert'>
            Se registro con éxito <br></div>
            ";
          }
        }
      }
      ?>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
      <source src="assets/images/video.mp4" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="caption">
              <h2>Próximamente</h2>
              <h6>Estamos trabajando duro en el desarrollo de este sitio web. Suscribete para recibir actualizaciones y
                notificaciones sobre el lanzamiento.</h6>
              <div class="main-button-red">
                <div class="scroll-to-section"><a href="#contact">Notificamé</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">

            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-01.png" alt="">
              </div>
              <div class="down-content">
                <h4>Pricing</h4>
                <p>Nos destacamos por un gran precio competitivo.</p>
              </div>
            </div>

            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-02.png" alt="">
              </div>
              <div class="down-content">
                <h4>Empaquetado</h4>
                <p>El empaque está diseñado para que el producto conserve sus propiedades sensoriales (aroma, y sabor).
                </p>
              </div>
            </div>

            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-03.png" alt="">
              </div>
              <div class="down-content">
                <h4>Eco Friendly</h4>
                <p>El empaque es completamente biodegradable, desde el filtro, el hilo, la etiqueta, recubrimiento
                  externo y caja.
                </p>
              </div>
            </div>

            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-04.png" alt="">
              </div>
              <div class="down-content">
                <h4>Premium</h4>
                <p>Sabor y aroma de un café recién molido de la mejor calidad.</p>
              </div>
            </div>

            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-05.png" alt="">
              </div>
              <div class="down-content">
                <h4>On the Go</h4>
                <p>Prepáralo cuando quieras y donde quieras.
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our-courses" id="courses">

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <br><br><br><br><br><br><br><br>
          <div class="section-heading">
            <h2>Formas de Venta</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-courses-item owl-carousel">
            <div class="item">
              <img src="assets/images/venta-01.jpg" alt="Course One">
              <div class="down-content">
                <h4>Venta individual</h4>
              </div>
            </div>

            <div class="item">
              <img src="assets/images/venta-02.jpg" alt="Course One">
              <div class="down-content">
                <h4>Venta por suscripción</h4>
              </div>
            </div>

            <div class="item">
              <img src="assets/images/venta-03.jpg" alt="Course One">
              <div class="down-content">
                <h4>Venta a mayoreo</h4>
              </div>
            </div>

            <div class="item">
              <img src="assets/images/venta-04.png" alt="Course One">
              <div class="down-content">
                <h4>Grandes descuentos</h4>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Registrate</h2>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input name="nombre" type="text" id="nombre" placeholder="Nombre" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input name="apellido" type="text" id="apellido" placeholder="Apellido" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                    </fieldset>
                  </div>

                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" class="btn btn-primary mb-2">REGISTRATE PARA NOTIFICARTE</button> <br> <br>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="footer">
          <p>Copyright © 2022
            <br>
            Diseñado por: <a href="https://github.com/bryanvrgsc" target="_parent" title="GitHub">Bryan
              Vargas</a>
            <br>
            Distribuido por: <a href="https://www.anahuac.mx  " target="_blank" title="Universidad Anáhuac">Universidad
              Anáhuac</a>
          </p>
        </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/lightbox.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/video.js"></script>
  <script src="assets/js/slick-slider.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
    //according to loftblog tut
    $('.nav li:first').addClass('active');

    var showSection = function showSection(section, isAnimate) {
      var
        direction = section.replace(/#/, ''),
        reqSection = $('.section').filter('[data-section="' + direction + '"]'),
        reqSectionPos = reqSection.offset().top - 0;

      if (isAnimate) {
        $('body, html').animate({
            scrollTop: reqSectionPos
          },
          800);
      } else {
        $('body, html').scrollTop(reqSectionPos);
      }

    };

    var checkSection = function checkSection() {
      $('.section').each(function() {
        var
          $this = $(this),
          topEdge = $this.offset().top - 80,
          bottomEdge = topEdge + $this.height(),
          wScroll = $(window).scrollTop();
        if (topEdge < wScroll && bottomEdge > wScroll) {
          var
            currentId = $this.data('section'),
            reqLink = $('a').filter('[href*=\\#' + currentId + ']');
          reqLink.closest('li').addClass('active').
          siblings().removeClass('active');
        }
      });
    };

    $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
      e.preventDefault();
      showSection($(this).attr('href'), true);
    });

    $(window).scroll(function() {
      checkSection();
    });
  </script>
  </script>

</body>

</body>

</html>