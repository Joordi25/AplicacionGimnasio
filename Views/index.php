<?php
session_start();


/*if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}*/

$user =  !empty($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'registrate';



?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gimnasio</title>    
    <link rel="stylesheet" href="../src/css/styles.css">
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
                    <a class="menu" href="#">TARIFAS</a>
                </div>
                <div class="col-md-1 top">
                    <a class="menu" href="#">MARKETPLACE</a>
                </div>
                <div class="col-md-1 top">
                    <a class="menu" href="contactoView.html">CONTACTO</a>
                </div>
                <div class="col-md-2 top">
                    <a class="menu" href="#">SOBRE NOSOTROS</a>
                </div>  

                <div class="col-md-1 top">
                    <?php if ((isset($_SESSION["loggedin"]))) : ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Hola, <?php echo $user; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="../src/php/perfil.php">Cuenta</a></li>
                                <li><a class="dropdown-item" href="">Cesta</a></li>
                                <li><a class="dropdown-item" href="../src/php/cerrar.php">Cerrar sesión</a></li>
                            </ul>
                        </div>
                    <?php endif ?>
                </div>
                <?php if ((!isset($_SESSION["loggedin"]))) : ?>
                    <div class="col-md-1 top">
                        <a class="menu amarillo" href="RegisterView.php">REGISTRARSE</a>
                    </div> 
                    <div class="col-md-2 top">
                        <a class="menu" href="LoginView.php">INICIAR SESIÓN</a>
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
                <div class="col-md-12 col-lg-2 col-sm-12 col-12">
                    <a id="boton2" href="">SOBRE NOSOTROS</a>
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
                <a href="" id="instalacionesa">Conoce nuestras tarifas</a>
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
            <div class="col-lg-4 col-md-12">
                <h1 id="tiendah1">Descubre nuestra tienda!</h1>
                <p id="tiendap" class="text-justify">Si! También contamos con una tienda física y online, dentro de nuestras instalaciones y página.
                Cabe decir que nuestra tienda que un material tanto deportivo como nutricional de alta calidad, ofreciendo una
                gama completa de las mejores y más reconocidas marcas por deportistas. Contamos con profesionales que podrán ayudarte
                y aconsejarte las mejores opciones y tips para tus entrenos. Tenemos una alta disponibilidad de stock de todos nuestros 
                productos, así que no te preocupes por nada!. ¡Si quieres descubrir más acerca de nuestra tienda pincha aquí!.
                </p>
                <a href="" id="tiendaa">Ir a la Tienda</a>
            </div>
            <div class="col-md-1"></div>                    
        </div>
        <div class="row precios bg-dark">

            <div class="col-md-3 col-sm-12 col-xs-12 col-12" id="precios1">
                <div class="preciosname">
                    <h1 id="preciosh1">BASIC</h1>
                    <div class="preciosprice">
                        <h2 id="preciosh2">50€<small id="preciossmall">/mes</small></h2>     
                        <div class="precioscontenido">
                            <p>Contendio1</p>
                            <p>Contendio2</p>
                            <p>Contendio3</p>
                            <p>Contendio4</p>
                            <p>Contendio5</p>
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
                        <h2 id="preciosh2">150€<small id="preciossmall">/mes</small></h2>     
                        <div class="precioscontenido">
                            <p>Contendio1</p>
                            <p>Contendio2</p>
                            <p>Contendio3</p>
                            <p>Contendio4</p>
                            <p>Contendio5</p>
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
                        <h2 id="preciosh2">100€<small id="preciossmall">/mes</small></h2>     
                        <div class="precioscontenido">
                            <p>Contendio1</p>
                            <p>Contendio2</p>
                            <p>Contendio3</p>
                            <p>Contendio4</p>
                            <p>Contendio5</p>
                        </div>               
                    </div>
                </div>                
                <div id="preciosbutton">
                    <a id="precioslink" href="">Contratar</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center text-white">
      <div class="container p-4">
        <section class="">
          <form action="">
            <div class="row d-flex justify-content-center">
              <div class="col-auto">
                <p class="pt-2">
                  <strong>Suscríbete a nuestro newsletter</strong>
              </p>
          </div>
          <div class="col-md-5 col-12">
            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example21" class="form-control" />
              <label class="form-label" for="form5Example21">Email</label>
          </div>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-outline-light mb-4">
          Enviar
      </button>
  </div>
</div>
</form>
</section>
<section class="">
  <div class="row">
    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
      <h5 class="text-uppercase">Links</h5>

      <ul class="list-unstyled mb-0">
        <li>
          <a href="#!" class="text-white">Link 1</a>
      </li>
      <li>
          <a href="#!" class="text-white">Link 2</a>
      </li>
      <li>
          <a href="#!" class="text-white">Link 3</a>
      </li>
  </ul>
</div>
<div class="col-lg-3 col-md-6 mb-4 mb-md-0">
  <h5 class="text-uppercase">Links</h5>

  <ul class="list-unstyled mb-0">
    <li>
      <a href="#!" class="text-white">Link 1</a>
  </li>
  <li>
      <a href="#!" class="text-white">Link 2</a>
  </li>
  <li>
      <a href="#!" class="text-white">Link 3</a>
  </li>
</ul>
</div>
<div class="col-lg-3 col-md-6 mb-4 mb-md-0">
  <h5 class="text-uppercase">Links</h5>

  <ul class="list-unstyled mb-0">
    <li>
      <a href="#!" class="text-white">Link 1</a>
  </li>
  <li>
      <a href="#!" class="text-white">Link 2</a>
  </li>
  <li>
      <a href="#!" class="text-white">Link 3</a>
  </li>
</ul>
</div>
<div class="col-lg-3 col-md-6 mb-4 mb-md-0">
  <h5 class="text-uppercase">Links</h5>

  <ul class="list-unstyled mb-0">
    <li>
      <a href="#!" class="text-white">Link 1</a>
  </li>
  <li>
      <a href="#!" class="text-white">Link 2</a>
  </li>
  <li>
      <a href="#!" class="text-white">Link 3</a>
  </li>
</ul>
</div>
</div>
</section>
</div>
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-white" href="#">GYMZEUS.com</a>
</div>
</footer>

</body>
<script type="text/javascript" src="../src/scripts/script.js"></script>
</html>