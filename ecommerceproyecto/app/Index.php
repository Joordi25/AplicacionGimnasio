<?php
session_start();


if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

$user =  !empty($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'registrate';



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Padel Llagostera</title>
    <link href="Views/css/bootstrap.css" rel="stylesheet">
    <link href="Views/css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="icon" href="Views/images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- HEADER -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbar">
        <div class="container">
            <img src="Views/images/logopadel1.png" alt="Logo" class="image-logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#header">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#novedades">Novedades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#outlet">Outlet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Views/fotosViews.php">Galería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Views/cesta/inicio.php">Tienda</a>
                    </li>
                </ul>
                <?php if ((isset($_SESSION["loggedin"]))) : ?>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hola, <?php echo $user; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="Views/welcome.php">Panel de control</a>
                        <?php if ((isset($_SESSION["loggedin"])) && $user == "admin") : ?>
                        <a class="dropdown-item" href="Views/cesta/inicio_admin.php">Productos</a>
                        <?php endif ?>
                        <a class="dropdown-item" href="Views/cesta/view_cart.php">Cesta</a>
                        <a class="dropdown-item" href="Views/cerrar.php">Cerrar sesión</a>
                    </div>
                </div>
                <?php endif ?>

                <?php if ((!isset($_SESSION["loggedin"]))) : ?>

                    <div class="d-flex">


                        <a class="btn btn-warning" href="Views/RegisterView.php">Registrarse</a>
                        <a class="btn btn-success ms-3" href="Views/LoginView.php">Iniciar Sesión</a>

                    </div>
                <?php endif ?>

            </div>
        </div>
    </nav>

    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <div class="text-container">
                            <h1>Pádel Llagostera</h1>
                            <?php if ((!isset($_SESSION["loggedin"]))) : ?>
                            <p class="p-large">¿Aún no tienes tu cuenta? Registrate aquí abajo</p>
                            <a class="btn-solid-lg page-scroll" href="Views/RegisterView.php">Registrarse</a>
                            <?php endif ?>
                            <?php if ((isset($_SESSION["loggedin"]))) : ?>
                            <p class="p-large">¿Aún no eres socio? hazte socio aquí abajo</p>
                            <a class="btn-solid-lg page-scroll" href="Views/cuotasView.php">Cuotas</a>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-7">
                        <div class="image-container">
                            <div class="img-wrapper">
                                <img class="img-fluid" src="Views/images/clubs.png" alt="alternative">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--NOVEDADES -->

    <div id="novedades" class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">NOVEDADES</div>
                    <h2 class="h2-heading">Novedades de nuestra tienda</h2>
                    <p class="p-heading">Estos artículos son nuevos de esta temporada, más información abajo</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">


                    <ul class="nav nav-tabs" id="argoTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"><i class="fas fa-list"></i>ATAQUE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-list"></i>DEFENSA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false"><i class="fas fa-list"></i>EQUILIBRADO</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="argoTabsContent">


                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="Views/images/ataque1.png" alt="alternative">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>PALA BULLPADEL VERTEX</h3>
                                        <p>La nueva pala Vertex 03 colec. 2021 elegida por Maxi Sanchez , es una pala de máxima potencia y alto rendimiento que incorpora el nuevo sistema Air React Channel para una mayor salida de bola y precisión de golpe. Ademas de nuevo CustomWeight que permite al jugador modificar el balance de la pala en funcion de las necesidades.</p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Peso: 365-380 grs.</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Perfil: 38mm. </div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Jugador: Adulto experto.</div>
                                            </li>
                                        </ul>
                                        <a class="btn-solid-reg popup-with-move-anim" href="Views/cesta/inicio.php">VER MÁS</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="Views/images/defensa.png" alt="alternative">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>PALA BULLPADEL VERTEX DEFENSA</h3>
                                        <p>La nueva pala Vertex 03 defensa 2021. Elegida por Ivan Aranda, es una pala de máxima potencia y alto rendimiento que incorpora el nuevo sistema Air React Channel para una mayor salida de bola y precisión de golpe. Ademas de nuevo CustomWeight que permite al jugador modificar el balance de la pala en funcion de las necesidades.</p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Peso: 355-370 grs.</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Perfil: 38mm.</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Jugador: Adulto principiante.</div>
                                            </li>
                                        </ul>
                                        <a class="btn-solid-reg popup-with-move-anim" href="Views/cesta/inicio.php">VER MÁS</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="Views/images/equilibrado.png" alt="alternative">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>PALA BULLPADEL HACK</h3>
                                        <p>La nueva pala Hack 02 colec. 2021 , es una pala de máxima potencia y alto rendimiento. Es una pala diseñada para jugadores profesionales o avanzados con marco 100% fibra de carbono. Incorpora el nuevo sistema Adaptia y tambien el novedoso CustomWeigth. Esta es la pala 2021 elegida por Paquito Navarro para jugar durante todo este año.</p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Peso: 365-380 grs.</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Perfil: 38mm. </div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Jugador: Adulto intensivo.</div>
                                            </li>
                                        </ul>
                                        <a class="btn-solid-reg popup-with-move-anim" href="Views/cesta/inicio.php">VER MÁS</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- OUTLET -->

    <div id="outlet" class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">OUTLET</div>
                    <h2 class="h2-heading">Outlet de nuestra empresa</h2>
                    <p class="p-heading">Palas nuevas, de otros años muy rebajadas de precio</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">


                    <ul class="nav nav-tabs" id="argoTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="true"><i class="fas fa-list"></i>ATAQUE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-5" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false"><i class="fas fa-list"></i>DEFENSA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-6" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false"><i class="fas fa-list"></i>EQUILIBRADO</a>
                        </li>
                    </ul>



                    <div class="tab-content" id="argoTabsContent">


                        <div class="tab-pane fade show active" id="tab-4" role="tabpanel" aria-labelledby="tab-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="Views/images/outlet1.png" alt="alternative">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>PALA BULLPADEL AVANT</h3>
                                        <p>Pala de padel de alto rendimiento con un equilibrio perfecto entre potencia y control, diseñada para jugadores avanzados e intensivos con las ultimas tecnologías en su fabricación.</p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Peso: 365-380 grs.</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Perfil: 38mm. </div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Jugador: Adulto experto.</div>
                                            </li>
                                        </ul>
                                        <a class="btn-solid-reg popup-with-move-anim" href="Views/cesta/inicio.php">VER MÁS</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="tab-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="Views/images/outlet2.png" alt="alternative">
                                    </div>
                                    < </div>
                                        <div class="col-lg-6">
                                            <div class="text-container">
                                                <h3>PALA BULLPADEL KITTER DEFENSA</h3>
                                                <p>Descubre la nueva Bullpadel Kitter Naranja, un pala de pádel con la que podrás mejorar tu rendimiento en la pista gracias a sus estupendas prestaciones. Se trata de una pala de control con forma de lágrima en formato overside.</p>
                                                <ul class="list-unstyled li-space-lg">
                                                    <li class="media">
                                                        <i class="fas fa-square"></i>
                                                        <div class="media-body">Peso: 355-370 grs.</div>
                                                    </li>
                                                    <li class="media">
                                                        <i class="fas fa-square"></i>
                                                        <div class="media-body">Perfil: 38mm.</div>
                                                    </li>
                                                    <li class="media">
                                                        <i class="fas fa-square"></i>
                                                        <div class="media-body">Jugador: Adulto principiante.</div>
                                                    </li>
                                                </ul>
                                                <a class="btn-solid-reg popup-with-move-anim" href="Views/cesta/inicio.php">VER MÁS</a>
                                            </div>
                                        </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="tab-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="image-container">
                                            <img class="img-fluid" src="Views/images/outlet3.png" alt="alternative">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text-container">
                                            <h3>PALA BULLPADEL KITTER EQUILIBRADO</h3>
                                            <p>Conoce la nueva Bullpadel Kitter Azul, una pala de control diseñada con los mejores materiales para que puedas desplegar tu mejor juego en la pista, ¡decubre todas sus prestaciones! Esta pala con forma de lágrima y tamaño oversize.</p>
                                            <ul class="list-unstyled li-space-lg">
                                                <li class="media">
                                                    <i class="fas fa-square"></i>
                                                    <div class="media-body">Peso: 365-380 grs.</div>
                                                </li>
                                                <li class="media">
                                                    <i class="fas fa-square"></i>
                                                    <div class="media-body">Perfil: 38mm. </div>
                                                </li>
                                                <li class="media">
                                                    <i class="fas fa-square"></i>
                                                    <div class="media-body">Jugador: Adulto intensivo.</div>
                                                </li>
                                            </ul>
                                            <a class="btn-solid-reg popup-with-move-anim" href="Views/cesta/inicio.php">VER MÁS</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>


        <footer class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <p>680195669</p>
                    <p>Llagostera, Girona 17240</p>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                padelllagostera@gmail.com
            </div>
            <!-- Copyright -->
        </footer>


        <!-- Scripts -->
        <script src="Views/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
        <script src="Views/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
</body>

</html>