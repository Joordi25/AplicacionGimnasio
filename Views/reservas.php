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
    <title></title>
    <link rel="stylesheet" href="../src/css/ReservasStyle.css">
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body onload="date()">
    <div class="container-fluid" style="margin-bottom: 5%;">
        <div class="row">
            <div class="col-md-1">
                <img id="logo" src="../images/logotransparente.png" width="170" height="170">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1 top">
                <a class="menu" href="index.php">INICIO</a>
            </div>
            <div class="col-md-1 top">
                <a class="menu selected" href="reservas.php">RESERVAS</a>
            </div>
            <div class="col-md-1 top">
                <a class="menu" href="../src/php/cesta/inicio.php">TIENDA</a>
            </div>
            <div class="col-md-1 top">
                <a class="menu" href="../src/php/cesta/view_cart.php">CESTA<span class="badge"><?php echo count($_SESSION['cart']); ?></a>
            </div>
            <div class="col-md-2 top">
                <a class="menu" href="\AplicacionGimnasio\Views\galeria.php">SOBRE NOSOTROS</a>
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
        <div class="row" id="top">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-0"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">
                <a href=""><img class="flecha" src="../src/images/reservas/flechaizquierda.png"></a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p id="diaactual">LUNES</p>
                <p id="fechaactual">30/05/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p id="dia1">MARTES</p>
                <p id="fechaactual1">31/05/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p id="dia2">MIÉRCOLES</p>
                <p id="fechaactual2">01/06/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p id="dia3">JUEVES</p>
                <p id="fechaactual3">02/06/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p id="dia4">VIERNES</p>
                <p id="fechaactual4">03/06/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p id="dia5">SÁBADO</p>
                <p id="fechaactual5">04/06/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p id="dia6">DOMINGO</p>
                <p id="fechaactual6">05/06/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
                <a href=""><img class="flecha" style="text-align: left;" src="../src/images/reservas/flechaderecha.png"></a>
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>08:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>08:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>08:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>08:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>08:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>08:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>08:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>09:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>09:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>09:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>09:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>09:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>09:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>09:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>10:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>10:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>10:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>10:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>10:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>10:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>10:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>11:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>11:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>11:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>11:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>11:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>11:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>11:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>12:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>12:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>12:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>12:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>12:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>12:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>12:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>13:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>13:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>13:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>13:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>13:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>13:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>13:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="../src/JavaScript/reservas.js"></script>
</html>