<?php

session_start();
if ($_SESSION['admin'] == 1)
    header("location: admin.php");
if (!isset($_SESSION['nombre_usuario'])) {
    header("location: login_signin.php");
}
require_once('./item.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Café Nook - Tienda</title>

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
                            <li class="scroll-to-section"><a href="#top" class="active"">Home</a></li>
                            <li><a href=" tienda_session.php">Tienda</a></li>
                            <li><a href="cuenta.php">Cuenta</a></li>
                            <li><a href="cerrar_session.php">Cerrar Sesión</a></li>
                            <li>
                                <a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito
                                    <?php
                                    // ! CUENTA EL NUMERO DE ITEMS DE CARRITO
                                    if (isset($_SESSION['nombre_usuario'])) {

                                        $con = mysqli_connect("localhost", "a00348428", "p0348428_Rockeilo", "cafe");
                                        if (isset($_SESSION['nombre_usuario'])) {
                                            $usuario = $_SESSION['nombre_usuario'];
                                            $verifica = mysqli_query($con, "SELECT cantidad FROM carrito WHERE id_usuario= '$usuario'");
                                            $existe = mysqli_num_rows($verifica);
                                            $count = 0;
                                            while ($row = mysqli_fetch_array($verifica)) {
                                                $count = $count + (int)$row['cantidad'];
                                            }
                                            echo "<span class='badge bg-primary rounded-pill'>$count</span>";
                                        }
                                    }
                                    ?>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <?php

            if (isset($_POST['agregar'])) {
                $valor = $_POST['producto_id'];

                echo "
                    <div class='alert alert-success' role='alert'>
                    Se agrego el producto<br></div>
                    ";
                echo "<meta http-equiv='refresh' content='2'>";


                $con = mysqli_connect("localhost", "a00348428", "p0348428_Rockeilo", "cafe");
                if (isset($_SESSION['nombre_usuario'])) {
                    $usuario = $_SESSION['nombre_usuario'];
                    $verifica = mysqli_query($con, "SELECT * FROM carrito WHERE id_usuario = '$usuario' AND id_producto = '$valor' ");
                    $numberrows = mysqli_num_rows($verifica);
                    if ($numberrows != 0) {

                        while ($row = mysqli_fetch_array($verifica)) {
                            $avalor = $row['cantidad'];
                        }

                        $nvalor = $avalor + 1;
                        $agrega = mysqli_query($con, "UPDATE carrito SET cantidad = '$nvalor' WHERE id_usuario = '$usuario' AND id_producto = '$valor'");

                        while ($row = mysqli_fetch_array($verifica)) {
                            $count = $count + (int)$row['cantidad'];
                        }
                    } else {
                        $fecha = new DateTime();
                        $id_carrito = date_timestamp_get($fecha);
                        $inserta = mysqli_query($con, "INSERT INTO carrito (id_carrito, id_producto, id_usuario, cantidad) VALUES ('$id_carrito','$valor','$usuario','1')");
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
                            <h2>Con Café Nook prepara </h2>
                            <h2>el mejor café de una forma </h2>
                            <h2>rápida, fácil y práctica</h2>

                            <div class="main-button-red">
                                <div><a href="login_signin.php">Registrate para comprar</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Inicio de Section Our-Facts ***** -->
    <section class="our-facts">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>¿Sabias qué?</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="count-area-content minutos">
                                        <div class="count-digit">90</div>
                                        <div class="count-title">En disolver café soluble sin mezclar</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="count-area-content segundos">
                                        <div class="count-digit">90</div>
                                        <div class="count-title">En disolver café en bolsa filtradora sin mezclar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="count-area-content porcentaje">
                                        <div class="count-digit">74</div>
                                        <div class="count-title">de los consumidores beben el café preparado en su hogar.</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="count-area-content meses">
                                        <div class="count-digit">5</div>
                                        <div class="count-title">es la duración del café</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <!-- VIDEO -->
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/Xmpda1opH8Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Fin de Section ***** -->


    <section class="apply-now" id="apply">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="item">
                                <h3>Café en bolsa de filtro</h3>
                                <p>Café de grano molido premium en bolsas
                                    filtrantes biodegradables, que te ofrece una
                                    experiencia que conserva la calidad, la cultura
                                    y tradición del café, adaptándola a las
                                    costumbres actuales de la sociedad,
                                    facilitándole la rutina al consumidor al
                                    momento de la preparación del cafe.</p>
                            </div>
                        </div>
                        <!-- Debajo del recuadro -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="assets/images/producto.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

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

    <section class="upcoming-meetings" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Pasos a seguir</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="meeting-item">
                            <div class="thumb">
                                <a href="login_signin.php"><img src="assets/images/01-Registrate.png" alt="New Lecturer Meeting"></a>
                            </div>
                            <div class="down-content">
                                <a href="login_signin.php">
                                    <h4>Registrate</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="meeting-item">
                            <div class="thumb">
                                <a href="login_signin.php"><img src="assets/images/02-Sesion.png" alt="Online Teaching"></a>
                            </div>
                            <div class="down-content">
                                <a href="login_signin.php">
                                    <h4>Inicia Sesión</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="meeting-item">
                            <div class="thumb">
                                <a href="login_signin.php"><img src="assets/images/03-Productos.png" alt="Higher Education"></a>
                            </div>
                            <div class="down-content">
                                <a href="login_signin.php">
                                    <h4>Agrega tus productos</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="meeting-item">
                            <div class="thumb">
                                <a href="login_signin.php"><img src="assets/images/04-Checkout.png" alt="Student Training"></a>
                            </div>
                            <div class="down-content">
                                <a href="login_signin.php">
                                    <h4>Verifica tu compra</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="meeting-item">
                            <div class="thumb">
                                <a href="login_signin.php"><img src="assets/images/05-FormadePago.png" alt="Student Training"></a>
                            </div>
                            <div class="down-content">
                                <a href="login_signin.php">
                                    <h4>Agrega tu forma de pago</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="meeting-item">
                            <div class="thumb">
                                <a href="login_signin.php"><img src="assets/images/06-Localiza.png" alt="Student Training"></a>
                            </div>
                            <div class="down-content">
                                <a href="login_signin.php">
                                    <h4>Realiza seguimiento de tu pedido</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="meeting-item">
                            <div class="thumb">
                                <a href="login_signin.php"><img src="assets/images/07-Recibe.png" alt="Student Training"></a>
                            </div>
                            <div class="down-content">
                                <a href="login_signin.php">
                                    <h4>Recibe tu pedido</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="meeting-item">
                            <div class="thumb">
                                <a href="login_signin.php"><img src="assets/images/08-Disfruta.png" alt="Student Training"></a>
                            </div>
                            <div class="down-content">
                                <a href="login_signin.php">
                                    <h4>Disfruta</h4>
                                </a>
                            </div>
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
                    <div class="section-heading">
                        <h2>Formas de Venta</h2>
                    </div>
                </div>
                <div class="col-lg-25">
                    <div class="owl-courses-item owl-carousel">

                        <div class="item">
                            <img src="assets/images/venta-01.jpg" alt="Course One" height="193px">
                            <div class="down-content">
                                <h4>Venta individual</h4>
                                <h4>Caja de 20 unidades</h4>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/images/venta-02.jpg" alt="Course One">
                            <div class="down-content">
                                <h4>Venta por suscripción</h4>
                                <h4>3 Cajas de 20 unidades/mes</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us" id="contact">
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