<?php
session_start();
require_once "../src/php/config.php";

$username = $Correo = "";
$imagen = "../src/images/perfil/perfil_defecto.jpg";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="\AplicacionGimnasio\images\icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../src/css/LoginStyle.css" rel="stylesheet">
    <!--<script src="../src/JavaScript/Rergister.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>  or use local jquery
    <script src="../src/libs/jqBootstrapValidation.js"></script>
    <script src="../src/libs/validate.min.js"></script>-->
    <title>Register Zeus</title>
</head>

<body>
    <img src="../images/logo.png">
    <div class="container" style="width: 400px;">
        <form action="../src/php/recuperar.php" method="post">
            <div class="row">

                <div class="col-12">
                    <label for="Correo">Mail</label><br>
                    <input class="form-control" type="email" id="Correo" name="txtcorreo" value="<?php echo $Correo; ?>" required><br><br>
                </div>
              
            </div>
            <button type="submit" value="Recuperar" class="btn btn-outline-warning" onClick="javascript: return confirm('¿Deseas enviar tu contraseña a tu correo?');">Recuperar contraseña</button><br><br><br>
            <label>No tienes cuenta?</label>
            <a style="color: yellow" href="RegisterView.php">Registrate</a><br><br>
            <label>Ya tienes una cuenta?</label>
            <a style="color: yellow" href="LoginView.php"> Inicia sesión</a><br><br>
            <a style="color: yellow" href="index.php">Inicio</a><br><br>
        </form>
    </div> 
</body>

<script>
    /*(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
    require(["validate.js"], function(validate) {
        // ...
    });
    //var validate = require("validate.js");*/
</script>

</html>