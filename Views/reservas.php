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

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
                <img id="logo" src="../images/logotransparente.png" width="170" height="170">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1 top">
                <a class="menu" href="index.php">INICIO</a>
            </div>
            <div class="col-md-1 top">
                <a class="menu selected" href="reservas.html">RESERVAS</a>
            </div>
            <div class="col-md-1 top">
                <a class="menu" href="../src/php/cesta/inicio.php">MARKETPLACE</a>
            </div>
            <div class="col-md-1 top">
                <a class="menu" href="../src/php/cesta/view_cart.php">CESTA</a>
            </div>
            <div class="col-md-2 top">
                <a class="menu" href="index.php">SOBRE NOSOTROS</a>
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
        <div class="row">
            <div class="col-12">
                <h1 style="color: white;">Selecciona dia y hora para hacer la reserva</h1>
            </div>
        </div>
        <div class="row" id="top">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">
                <a href=""><img class="flecha" src="../src/images/reservas/flechaizquierda.png"></a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p>LUNES</p>
                <p>30/05/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p>MARTES</p>
                <p>31/05/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p>MIÉRCOLES</p>
                <p>01/06/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p>JUEVES</p>
                <p>02/06/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p>VIERNES</p>
                <p>03/06/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p>SÁBADO</p>
                <p>04/06/22</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 fecha">
                <p>DOMINGO</p>
                <p>05/06/22</p>
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

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>13:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>13:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>13:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>13:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>13:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>13:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>13:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>14:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>14:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>14:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>14:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>14:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>14:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>14:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>14:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>14:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>14:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>14:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>14:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>14:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>14:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>15:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>15:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>15:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>15:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>15:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>15:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>15:00</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1" style="text-align: right;">

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>15:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>15:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>15:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>15:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>15:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaslibres">
                <p>15:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 horaspilladas">
                <p>15:30</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1">
            </div>
        </div>
    </div>
</body>

</html>