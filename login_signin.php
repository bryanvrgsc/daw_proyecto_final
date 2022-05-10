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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="tienda.php">Tienda</a></li>
                            <li><a href="contacto.php">Contacto</a></li>
                            <li class="scroll-to-section"><a href="#contact" class="active">Registro/Inicio de Sesión</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
            <?php

            session_start();
            if (isset($_SESSION['nombre_usuario'])) {
                header("location: tienda_session.php");
            }

            // $user = "bryanvargas";
            // $password = "Rockito5515";
            // $host = "localhost";
            // $port = "5432";
            // $dbname = "cafe";
            // $strconn = "host=$host port=$port dbname=$dbname user=$user password=$password";
            // $conn = mysqli_connect($strconn);
            $con = mysqli_connect("localhost", "a00348428", "p0348428_Rockeilo", "cafe");
            // if (!$con) {
            //     echo "NO se conecto a la base\n";
            // }
            // if (mysqli_connect_errno()) {
            //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
            // }
            // if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //     if (!empty($_POST["nombre"]) || !empty($_POST["apellido"]) || !empty($_POST["email"])) {
            //         $nombre = $_POST["nombre"];
            //         $apellido = $_POST["apellido"];
            //         $email = $_POST["email"];
            //         $query = pg_query($conn, "INSERT  INTO usuarios(nombre, apellido, email) VALUES ('$nombre','$apellido','$email');");
            //         $query = pg_query($conn, "INSERT  INTO usuarios(nombre, apellido, email) VALUES ('nombretest','apellidotest','emailtest');");
            //         if ($query) {
            //             echo "
            //                 <div class='alert alert-success' role='alert'>
            //                 Se registro con éxito <br></div>
            //             ";
            //         }
            //     }
            // }

            function write_to_console($data)
            {
                $console = 'console.log(' . json_encode($data) . ');';
                $console = sprintf('<script>%s</script>', $console);
                echo $console;
            }

            $fecha = new DateTime();
            $string = date_timestamp_get($fecha);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if (isset($_POST['btnregistrar'])) {
                    $nombre = $_POST["nombre"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    if (empty($_POST["nombre"])) {
                        // $numErr = "Ingrese el nombre";
                    } else if (empty($_POST["email"])) {
                        // $numErr = "Ingrese el email";
                    } else if (empty($_POST["password"])) {
                        // $numErr = "Ingrese el password";
                    } else {
                        mysqli_query($con, "INSERT INTO usuario (id_usuario, nombre, email, password, fecha_nacimiento, datos_bancarios)
                        VALUES ('$string', '$nombre', '$email', '$password','2006-07-04','099878877123123');");
                        echo "
                         <div class='alert alert-success' role='alert'>
                         Se registro con éxito <br></div>
                        ";
                        mysqli_close($con);
                    }
                }

                if (isset($_POST['btnlogin'])) {
                    $logemail = $_POST["logemail"];
                    $logpassword = $_POST["logpassword"];

                    if (empty($_POST["logemail"])) {
                        // $numErr = "Ingrese el email";
                    } else if (empty($_POST["logpassword"])) {
                        // $numErr = "Ingrese el password";
                    } else {
                        $query = mysqli_query($con, "SELECT * FROM usuario WHERE email = '$logemail' AND password = '$logpassword'");
                        // $numErr = "DATOS GUARDADOS EXITOSAMENTE *";
                        $nr = mysqli_num_rows($query);

                        // if ($logemail == "bryanvrgsc@gmail.com") {
                        if ($nr == 1) {
                            $_SESSION['nombre_usuario'] = $logemail;

                            header("location: tienda_session.php");
                            mysqli_close($con);
                        } else {
                            echo "
                            <div class='alert alert-danger' role='alert'>
                            Error al iniciar sesión <br></div>
                            ";
                        }
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
                            <h2>Registro / Inicio de Sesión</h2>
                            <h6>Crea una cuenta para hacer pedidos</h6>
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

    <section class="contact-us" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Registrate</h2>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input name="nombre" type="text" id="nombre" placeholder="Nombre" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input name="password" type="password" id="password" placeholder="Password" required="">
                                </fieldset>
                            </div>

                            <div class="col-lg-7">
                                <fieldset>
                                    <button type="submit" class="btn btn-primary mb-2" name="btnregistrar">CREA TU CUENTA</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm">
                    <form id="contact" action="" method="post">
                        <div class=" row">
                            <div class="col-lg-12">
                                <h2>Inicia Sesión</h2>
                            </div>

                            <div class="col-lg-12">
                                <fieldset>
                                    <input name="logemail" type="text" id="logemail" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input name="logpassword" type="password" id="logpassword" placeholder="Password" required="">
                                </fieldset>
                            </div>

                            <div class="col-lg-7">
                                <fieldset>
                                    <button type="submit" class="btn btn-primary mb-2" name="btnlogin">INICIA SESIÓN</button>
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
    <script src="./vendor/jquery/jquery.min.js"></script>

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