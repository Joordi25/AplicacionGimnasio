<?php
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$user =  !empty($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'registrate';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Galería</title>    
    <link rel="stylesheet" href="../src/css/galeriastyles.css">
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>    
    <div class="container-fluid">
        <header>
            <div class="row">                
                <div class="col-md-1">
                    <img id="logo" src="../images/logotransparente.png" width="170" height="170">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1 top">
                    <a class="menu " href="index.php">INICIO</a>
                </div>
                <div class="col-md-1 top">
                    <a class="menu" href="reservas.php">RESERVAS</a>
                </div>
                <div class="col-md-1 top">
                    <a class="menu" href="../src/php/cesta/inicio.php">TIENDA</a>
                </div>
                <div class="col-md-1 top cesta">
                    <a class="menu" href="../src/php/cesta/view_cart.php">CESTA<span class="badge"><?php echo count($_SESSION['cart']); ?></span></a>
                </div>
                <div class="col-md-2 top">
                    <a class="menu selected" href="galeria.php">SOBRE NOSOTROS</a>
                </div>

                <div class="col-md-1 top">
                    <?php if ((isset($_SESSION["loggedin"]))) : ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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

        </header>
        <div class="row" id="oculto">
            <div class="col-12" onclick="volver()">
                <img id="ampliado" src="../src/images/galeria/alexander-redl-qo1pyCD02t4-unsplash.jpg">
            </div>
        </div>
        <div id="galeria">
            <div class="row">
                <div class="col-12 titulo">
                    <h1>GALERÍA</h1>
                </div>
            </div>
            <div class="row" style="margin-bottom: 5%;">
                <div class="col-2"></div>
                <div class="col-3">
                    <img class="images" onclick="ampliar1()" id="img1" src="../src/images/galeria/alexander-redl-qo1pyCD02t4-unsplash.jpg">
                </div>
                <div class="col-3">
                    <img class="images" onclick="ampliar2()" id="img2" src="../src/images/galeria/atenea.jpg">
                </div>
                <div class="col-3">
                    <img class="images" onclick="ampliar3()" id="img3" src="../src/images/galeria/bruce-mars-gJtDg6WfMlQ-unsplash.jpg">
                </div>
                <div class="col-1"></div>
            </div>

            <div class="row" style="margin-bottom: 5%;">
                <div class="col-2"></div>
                <div class="col-3">
                    <img class="images" onclick="ampliar4()" id="img4" src="../src/images/galeria/cathy-pham-3jAN9InapQI-unsplash.jpg">
                </div>
                <div class="col-3">
                    <img class="images" onclick="ampliar5()" id="img5" src="../src/images/galeria/MicrosoftTeams-image.png">
                </div>
                <div class="col-3">
                    <img class="images" onclick="ampliar6()" id="img6" src="../src/images/galeria/graham-mansfield-y7ywDXWJ-JU-unsplash.jpg">
                </div>            
                <div class="col-1"></div>
            </div>

            <div class="row" style="margin-bottom: 5%;">
                <div class="col-2"></div>
                <div class="col-3">
                    <img class="images" onclick="ampliar7()" id="img7" src="../src/images/galeria/afrodita.jpg">
                </div>
                <div class="col-3">
                    <img class="images" onclick="ampliar8()" id="img8" src="../src/images/galeria/sven-mieke-jO6vBWX9h9Y-unsplash.jpg">
                </div>
                <div class="col-3">
                    <img class="images" onclick="ampliar9()" id="img9" src="../src/images/galeria/victor-freitas-WvDYdXDzkhs-unsplash.jpg">
                </div>            
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="../src/JavaScript/galeria.js"></script>
</html>