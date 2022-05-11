<?php
session_start();
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
                            <li><a href="index.php">Home</a></li>
                            <li class="scroll-to-section"><a href="#top" class="active">Tienda</a></li>
                            <li><a href="contacto.php">Contacto</a></li>
                            <li><a href="cerrar_session.php">Cerrar Sesión</a></li>
                            <li><a href="">Carrito</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
            <?php

            if (isset($_POST['agregar'])) {
                $valor = $_POST['producto_id'];
                // echo "
                // <div class='alert alert-success' role='alert'>
                //  Valor $valor <br></div>
                // ";

                if (isset($_SESSION['cart'])) {
                    $item_array_id = array_column($_SESSION['cart'], "producto_id");


                    if (in_array($valor, $item_array_id)) {
                        echo "<script> alert('Product is already added in the cart..!') </script>";
                        echo "<script>window.location = 'tienda_session.php'</script>";
                    } else {
                        $count = count($_SESSION['cart']);
                        $item_array = array(
                            'producto_id' => $_POST['producto_id']
                        );

                        $_SESSION['cart'][$count] = $item_array;
                    }
                } else {
                    $item_array = array(
                        'producto_id' => $_POST['producto_id']
                    );
                    echo "
                    <div class='alert alert-success' role='alert'>
                     Imprime <br></div>
                    ";
                    //SE CREA LA SESIÓN
                    $_SESSION['cart'][0] = $item_array;
                    print_r($_SESSION['cart']);
                }
            }

            ?>
        </div>
    </header>

    <!-- ***** Main Banner Area Start ***** -->

    <section class="heading-page header-text" id="top">

        <div class="video-overlay2 header-text">
            <div class="container">
                <div class="row">
                    <span style="height: 155px; display: block;"></span>
                    <div class="col-lg-12">
                        <div class="caption">
                            <h2>Tienda</h2>
                            <div class="main-button-red">
                                <div class="scroll-to-section"><a href="#contact">Conoce nuestros productos</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="meetings-page" id="meetings">
        <div class="container">
            <div class="col-lg-12">
                <div class="row grid">

                    <?php
                    getdata()
                    ?>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="pagination">
                    <ul>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
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