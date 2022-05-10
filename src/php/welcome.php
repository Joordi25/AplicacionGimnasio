<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../Index.php");
    exit;
}

$user =  !empty($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'registrate';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenid@ a nuestra página web.</h1>
    </div>
    <p>
        <a href="perfil.php" class="btn btn-primary">Ver datos del perfil</a>
        <a href="eliminar.php" class="btn btn-danger">Eliminar Cuenta</a>
        <a href="../../Views/index.php" class="btn btn-success">Volver al inicio</a>
        <?php if ((isset($_SESSION["loggedin"])) && $user == "admin") : ?>
        <a href="usuarios.php" class="btn btn-warning">Gestionar usuarios</a>
        <?php endif ?>
    </p>


</body>

</html>