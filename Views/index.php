<?php
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$user =  !empty($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'registrate';



?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gimnasio</title>    
    <link rel="stylesheet" href="../src/css/styles.css">
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid" id="top">
        <header>
            <div class="row">                
                <div class="col-md-1">
                    <img id="logo" src="../images/logotransparente.png" width="170" height="170">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1 top">
                    <a class="menu selected" href="#">INICIO</a>
                </div>
                <div class="col-md-1 top">
                    <a class="menu" href="../src/php/reservas/login.php">RESERVAS</a>
                </div>
                <div class="col-md-1 top">
                    <a class="menu" href="../src/php/cesta/inicio.php">TIENDA</a>
                </div>
                <div class="col-md-1 top cesta">
                <a class="menu" href="../src/php/cesta/view_cart.php">CESTA<span class="badge"><?php echo count($_SESSION['cart']); ?></span></a>
                </div>
                <div class="col-md-2 top">
                    <a class="menu" href="\AplicacionGimnasio\Views\galeria.php">SOBRE NOSOTROS</a>
                </div>

                <div class="col-md-1 top">
                    <?php if ((isset($_SESSION["loggedin"]))) : ?>
                        <div class="dropdown">
                            <button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Hola, <?php echo $user; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="../src/php/perfil.php">Cuenta</a></li>
                                <?php if ((isset($_SESSION["loggedin"])) && $user == "admin") : ?>
                                <a class="dropdown-item" href="../src/php/cesta/inicio_admin.php">Productos</a>
                                <?php endif ?>
                                <li><a class="dropdown-item" href="../src/php/cesta/view_cart.php">Cesta</a></li>
                                <li><a class="dropdown-item" href="../src/php/cerrar.php">Cerrar sesión</a></li>
                            </ul>
                        </div>
                    <?php endif ?>
                </div>
                <?php if ((!isset($_SESSION["loggedin"]))) : ?>
                    <div class="col-md-1 top">
                        <a class="menu" href="RegisterView.php">REGISTRARSE</a>
                    </div> 
                    <div class="col-md-2 top">
                        <a class="menu amarillo" href="LoginView.php">INICIAR SESIÓN</a>
                    </div>
                <?php endif ?>

            </div>

            <div class="row">
                <div class="col-md-12 col-sm-6">
                    <h1 id="titulo1">GYM ZEUS</h1>
                </div>
                <div class="col-md-12">
                </div>
                <div class="col-md-12">
                    <h2 id="titulo2">Build for Athletes</h2>
                </div>
            </div>
            <div class="row top">
                <div class="col-md-5"></div>
                <div class="col-md-12 col-lg-1 col-sm-12 col-12">
                    <a id="boton1" href="#instalaciones">EMPEZAR</a>
                </div>
                <div class="col-md-12 col-lg-4 col-sm-12 col-12">
                    <a id="boton2" href="#price">Consulta nuestras Tarifas</a>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#instalaciones" title=""><img id="scroll" src="../images/main/scroll.png"></a>                
                </div>
                <div class="col-md-12">
                    <a href="#top"><img id="up" src="../images/main/up.png"></a>
                </div>
            </div>
        </header>

        <div class="row" id="instalaciones">
            <div class="col-md-1"></div>
            <div class="col-lg-4 col-md-12">
                <h1 id="instalacionesh1">Descubre nuestras instalaciones!</h1>
                <p id="instalacionesp" class="text-justify">Actualmente, contamos con unas instalaciones modernas y eficientes, contando con todo el material
                    para poder llevar a cabo entrenos y sesiones programadas y privadas. Disponemos de varias salas de entreno para que nuestros
                    clientes puedan desarrollar sus ejercicios con gran capacidad y de fácil accesibilidad. También cabe añadir que tanto zonas de máquinas y
                    salas de sesiones grupales, constan de material de alta calidad, con el que podamos satisfacer todas las necesidades de nuestros clientes.
                    Si quieres visitar nuestro centro no dudes en contactarnos.
                </p>
                <a href="\AplicacionGimnasio\Views\galeria.php" id="instalacionesa">Sobre nosotros</a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-12 col-lg-6">
                <img id="instalacionesimg" src="../images/main/gym1.jpg">
            </div>        
        </div>
        <div class="row tienda">
            <div class="col-md-1"></div>
            <div class="col-md-12 col-lg-6">
                <img id="tiendaimg" src="../images/main/tienda.jpg">
            </div>
            <div class="col-lg-4 col-md-12" id= "sobrenosotros">
                <h1 id="tiendah1">Descubre nuestra tienda!</h1>
                <p id="tiendap" class="text-justify">Si! También contamos con una tienda física y online, dentro de nuestras instalaciones y página.
                Cabe decir que nuestra tienda que un material tanto deportivo como nutricional de alta calidad, ofreciendo una
                gama completa de las mejores y más reconocidas marcas por deportistas. Contamos con profesionales que podrán ayudarte
                y aconsejarte las mejores opciones y tips para tus entrenos. Tenemos una alta disponibilidad de stock de todos nuestros 
                productos, así que no te preocupes por nada!. ¡Si quieres descubrir más acerca de nuestra tienda pincha aquí!.
                </p>
                <a href="../src/php/cesta/inicio.php" id="tiendaa">Ir a la Tienda</a>
            </div>
            <div class="col-md-1"></div>                    
        </div>
        <div id="price" class="row precios bg-dark">

            <div class="col-md-3 col-sm-12 col-xs-12 col-12" id="precios1">
                <div class="preciosname">
                    <h1 id="preciosh1">ESTUDIANTES</h1>
                    <div class="preciosprice">
                        <h2 id="preciosh2">35€<small id="preciossmall">/mes</small></h2>     
                        <div class="precioscontenido">
                            <p>ACCESO A TODO EL GIMNASIO</p>
                            <p>DOS INVITACIONES PARA DOS AMIGOS</p>
                            <p>ACCESO A TODAS LAS SALAS</p>
                            <p>ACCESO A LA PISCINA</p>
                            <p>MATERIAL DE REGALO</p>
                        </div>               
                    </div>
                </div>                
                <div id="preciosbutton">
                    <a id="precioslink" href="">Contratar</a>
                </div>
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12 col-12">
                <div class="preciosname2">
                    <h1 id="preciosh1">PRO</h1>
                    <div class="preciosprice">
                        <h2 id="preciosh2">55€<small id="preciossmall">/mes</small></h2>     
                        <div class="precioscontenido">
                            <p>ACCESO A TODO EL GIMNASIO</p>
                            <p>ENTRENAMIENTOS PERSONALIZADOS</p>
                            <p>ENTRENADOR PERSONAL</p>
                            <p>EQUIPO COMPLETO</p>
                            <p>FISIO Y SALAS DE ESPA</p>
                        </div>               
                    </div>
                </div>                
                <div id="preciosbutton">
                    <a id="precioslink2" href="">Contratar</a>
                </div>
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12 col-12">
                <div class="preciosname">
                    <h1 id="preciosh1">FAMILIAR</h1>
                    <div class="preciosprice">
                        <h2 id="preciosh2">50€<small id="preciossmall">/mes</small></h2>     
                        <div class="precioscontenido">
                            <p>ACCESO A TODO EL GIMNASIO </p>
                            <p>PUEDES TRAER HASTA 5 AMIGOS O FAMILIARES</p>
                            <p>CLASES EN FAMILIA</p>
                            <p>CASAL PARA LOS HIJOS</p>
                            <p>MATRICULA GRATIS</p>
                        </div>               
                    </div>
                </div>                
                <div id="preciosbutton">
                    <a id="precioslink" href="">Contratar</a>
                </div>
            </div>
        </div>
    </div>
     <!-- Site footer -->
     <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
              <p class="footer-links" >UBICACION</p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2992.353206727546!2d2.214321015671053!3d41.40985080256472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a35081f71b9b%3A0xcf8bb581de6135b1!2sDiagonal%20Mar%20Centro%20Comercial!5e0!3m2!1ses!2ses!4v1652452895902!5m2!1ses!2ses" width="500" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Contact</h6>
            <ul class="footer-links">
              <li><a href="">Telf: +34 93311350</a></li>
              <li><a href="">Mail: zeussupport@gmail.com</a></li>
              <li><a href="galeria.php">Fotos</a></li>
              <li><a href="#instalaciones">Instalaciones</a></li>
              <li><a href="">Inicio</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="#sobrenosotros">Sobre nosotros</a></li>
              <li><a href="../src/php/cesta/inicio.php">Shop link</a></li>
              <li><a href="">Privacy Policy</a></li>
              
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by 
         <a href="#">ZEUSPAGE</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>

</body>
<script type="text/javascript" src="../src/scripts/script.js"></script>
</html>