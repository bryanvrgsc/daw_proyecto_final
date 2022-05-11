<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header("location: login_signin.php");
}

require_once("./item.php");

if (isset($_GET['remove'])) {
    print_r($_GET['id']);
    // if ($_GET['action'] = 'remove') {
    //     foreach ($_SESSION['cart'] as $key => $value) {
    //         if ($value['product_id'] == $_GET['id']) {
    //             unset($_SESSION['cart'][$key]);
    //             echo "<script>alert('El producto ha sido eliminado')</script>;";
    //             echo "<script>window.location='cart.php'</script>";
    //         }
    //     }
    // }
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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="tienda_session.php">Tienda</a></li>
                            <li><a href="cuenta.php">Cuenta</a></li>
                            <li><a href="cerrar_session.php">Cerrar Sesión</a></li>
                            <li>
                                <a href="carrito.php" class="active"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito
                                    <!-- <span id="cart_count" class="text-warning bg-light">0</span> -->
                                    <?php
                                    // if (isset($_SESSION['cart'])) {
                                    //     $count = count($_SESSION['cart']);
                                    //     echo "<span class='badge bg-primary rounded-pill'>$count</span>";
                                    // } else {
                                    //     echo "<span class='badge bg-primary rounded-pill'>0</span>";
                                    // }
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
                            <h2>Carrito</h2>
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
                        // ! SESSIONS
                        // $con = mysqli_connect("localhost", "a00348428", "p0348428_Rockeilo", "cafe");
                        // $sql = "SELECT * FROM producto;";

                        // $result = mysqli_query($con, $sql);

                        // $total = 0;
                        // if (isset($_SESSION['cart'])) {
                        //     $product_id = array_column($_SESSION['cart'], 'producto_id');


                        //     while ($row = mysqli_fetch_assoc($result)) {
                        //         foreach ($product_id as $id) {
                        //             if ($row['id_producto'] == $id) {
                        //                 carrito($row['nombre'], $row['precio'], $row['imagen_principal'], $row['id_producto']);
                        //                 $total = $total + (int)$row['precio'];
                        //             }
                        //         }
                        //     }
                        // } else {
                        //     echo "<h5> El carrito está vacío</h5>";
                        // }
                        // ! MUESTRA LOS PRODUCTOS AGREGADOS AL CARRITO
                        if (isset($_SESSION['nombre_usuario'])) {
                            $con = mysqli_connect("localhost", "a00348428", "p0348428_Rockeilo", "cafe");
                            $usuario = $_SESSION['nombre_usuario'];
                            $verifica = mysqli_query($con, "SELECT producto.nombre, producto.precio, producto.imagen_principal, producto.precio, producto.id_producto, carrito.cantidad FROM carrito INNER JOIN producto ON carrito.id_producto = producto.id_producto WHERE id_usuario= '$usuario'");
                            $existe = mysqli_num_rows($verifica);
                            $total = 0;
                            while ($row = mysqli_fetch_assoc($verifica)) {
                                carrito($row['nombre'], $row['precio'], $row['imagen_principal'], $row['id_producto'], $row['cantidad']);
                                $total = $total + ((int)$row['cantidad'] * (int)$row['precio']);
                            }
                            if ($total == 0) {
                                echo "<h6>No hay productos en el carrito </h6>";
                            }
                        }
                        ?>

                    </div>

                </div>
                <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                    <div class="pt-4">
                        <h6>DETALLES DE COMPRA</h6>
                        <hr>
                        <div class="col-md-6">
                            <?php
                            // ! SESSION 
                            // if (isset($_SESSION['cart'])) {
                            //     count($_SESSION['cart']);
                            //     echo "<h6> Price ($count items)</h6> <br>";
                            // } else {
                            //     echo "<h6> Price (0 items)</h6> <br>";
                            // }

                            // ! CUENTA EL NUMERO DE ITEMS DE CARRITO
                            if (isset($_SESSION['nombre_usuario'])) {
                                // $count = count($_SESSION['cart']);

                                $con = mysqli_connect("localhost", "a00348428", "p0348428_Rockeilo", "cafe");

                                $usuario = $_SESSION['nombre_usuario'];
                                $verifica = mysqli_query($con, "SELECT cantidad FROM carrito WHERE id_usuario= '$usuario'");
                                $existe = mysqli_num_rows($verifica);
                                $count = 0;
                                while ($row = mysqli_fetch_array($verifica)) {
                                    $count = $count + (int)$row['cantidad'];
                                }
                                echo "<h6> Número de items ($count total)</h6> <br>";
                            }
                            ?>
                            <h6>Monto a Pagar</h6>
                            <div class="col-md-6">
                                <h6>$
                                    <?php
                                    // ! SESSIONS
                                    echo $total;
                                    ?>
                                </h6>
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