<?php

session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header("location: login_signin.php");
}
require_once("./item.php");

if (isset($_GET['remove'])) {
    print_r($_GET['id']);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Café Nook - Carrito</title>

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
                            <li><a href="index_session.php">Home</a></li>
                            <li><a href="tienda_session.php">Tienda</a></li>
                            <li><a href="cuenta.php">Cuenta</a></li>
                            <li><a href="cerrar_session.php">Cerrar Sesión</a></li>
                            <li>
                                <a href="carrito.php" class="active"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito

                                    <?php

                                    // ! CUENTA EL NUMERO DE ITEMS DE CARRITO
                                    if (isset($_SESSION['nombre_usuario'])) {
                                        // $count = count($_SESSION['cart']);

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
        </div>
    </header>

    <!-- ***** Main Banner Area Start ***** -->

    <section class="heading-page header-text" id="top">

        <div class="video-overlay3 header-text">
            <div class="container">
                <div class="row">
                    <span style="height: 155px; display: block;"></span>
                    <div class="col-lg-12">
                        <div class="caption">
                            <h2>Finalización</h2>
                            <div class="main-button-red">
                                <div class="scroll-to-section"><a href="#meetings-page"></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="meetings-page" id="meetings">
        <div class="container">
            <div class="row grid">
                <div class="col-lg-7">
                    <div class="shoppin-cart">

                        <?php

                        // ! MUESTRA LOS PRODUCTOS AGREGADOS AL CARRITO
                        if (isset($_SESSION['nombre_usuario'])) {
                            $con = mysqli_connect("localhost", "a00348428", "p0348428_Rockeilo", "cafe");
                            $usuario = $_SESSION['nombre_usuario'];
                            $verifica = mysqli_query($con, "SELECT producto.nombre, producto.precio, producto.imagen_principal, producto.precio, producto.id_producto, carrito.cantidad FROM carrito INNER JOIN producto ON carrito.id_producto = producto.id_producto WHERE id_usuario= '$usuario'");
                            $existe = mysqli_num_rows($verifica);
                            $total = 0;

                            if ($total != 0) {
                                header("location: carrito.php");
                            } else {
                                $compra = new DateTime();

                                echo "                            
                                    <div class='pt-2'>
                                    <h1 style='color:white;'>Finalizo compra</h1>
                                    </div>                                                                        
                                ";
                                $con = mysqli_connect("localhost", "a00348428", "p0348428_Rockeilo", "cafe");

                                $usuario = $_SESSION['nombre_usuario'];

                                // $fechacompra = date_timestamp_get($compra);

                                mysqli_query($con, "INSERT INTO ordenes (id_compra, id_producto, id_usuario, fecha_compra, cantidad)
                                    SELECT carrito.id_carrito, producto.id_producto, '$usuario', NOW(), carrito.cantidad
                                    FROM carrito
                                    INNER JOIN producto ON carrito.id_producto = producto.id_producto WHERE id_usuario= '$usuario'");


                                $actualizar = mysqli_query($con, "DELETE FROM carrito WHERE id_usuario = '$usuario'");
                            }
                            
                        }

                        ?>
                    </div>
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