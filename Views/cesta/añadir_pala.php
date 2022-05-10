<?php
session_start();

require_once "../config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Añadir Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/css.css">
    <link rel="icon" href="../images/favicon.png">
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form action="insertar.php" method="post" class="login-form" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre de la pala</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Precio</label>
                    <input type="number" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label>Imagen</label>
                    <input type="file" name="img" accept="image/png, image/jpeg">
                </div>
                
                <div class="form-group">
                    <input type="submit" href="..\Index.php" value="Añadir" id="iniciar">
                </div>
                <p><a href="inicio_admin.php" class="btn btn-primary">Volver atrás</a></p>
            </form>
        </div>
    </div>
</body>

</html>