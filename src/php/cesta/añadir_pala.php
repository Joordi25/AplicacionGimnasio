<?php
session_start();

require_once "../config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../../css/LoginStyle.css" rel="stylesheet">
    <!--<script src="../src/JavaScript/Rergister.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>  or use local jquery
    <script src="../src/libs/jqBootstrapValidation.js"></script>
    <script src="../src/libs/validate.min.js"></script>-->
    <title>Añadir Producto</title>
    <link rel="icon" href="../../../images/icon.png">
</head>

<body>
    <img src="../../images/Logo.png">
    <div class="container" style="width: 400px;">
    <form action="insertar.php" method="post" class="login-form" enctype="multipart/form-data">

            <label for="name">Nombre del producto</label><br>
            <input class="form-control" type="text" id="name" name="name" required><br><br>

            <label for="price">Precio</label><br>
            <input class="form-control" type="number" name="price" id="price" required><br><br>

            <label for="img">Imagen</label><br>
            <input type="file" name="img" accept="image/png, image/jpeg"> <br> <br>

            <button type="submit" class="btn btn-outline-warning" id="iniciar"  href="..\Index.php">Añadir Producto</button><br><br><br>
            
            
            <a style="color: yellow" href="inicio_admin.php">Atrás</a><br><br>
        </form>
    </div>





</body>

</html>