<?php
session_start();
require_once "../src/php/config.php";

$username = $password = $confirm_password = $Correo = "";
$username_err = $password_err = $confirm_password_err = $Correo_err = "";
$direccion = "direccion";
$pais = "España";
$imagen = "../src/images/perfil/perfil_defecto.jpg";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingrese un usuario.";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Este usuario ya está registrado.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Al parecer algo salió mal.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    if (empty(trim($_POST["Correo"]))) {
        $Correo_err = "Por favor ingrese un correo.";
    } else {
        $sql = "SELECT id FROM users WHERE Correo = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_correo);

            $param_correo = trim($_POST["Correo"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $Correo_err = "Este correo ya está registrado.";
                } else {
                    $Correo = trim($_POST["Correo"]);
                }
            } else {
                echo "Al parecer algo salió mal.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingresa una contraseña.";
    } elseif (strlen(trim($_POST["password"])) < 5) {
        $password_err = "La contraseña al menos debe tener 5 caracteres.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Confirma tu contraseña.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "No coincide la contraseña.";
        }
    }

    if (empty($username_err) && empty($password_err) && empty($confirm_password_err && empty($Correo_err)) && empty($password_err)) {



        $codigo_email = sha1(time() + rand(0, 9999));
        $hashed_password = password_hash("$password", PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, Correo, direccion, nombre, apellidos, num_tlf, pais, fecha, foto)
                VALUES ('$username', '$hashed_password', '$Correo', '$direccion', '$nombre', '$apellidos', '$num_tlf', '$pais', '$fecha', '$imagen')";



        if (mysqli_query($link, $sql)) {

            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;


            header("location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

        mysqli_close($link);


        echo "<br>jiwjei<br>";
        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../src/css/LoginStyle.css" rel="stylesheet">
    <!--<script src="../src/JavaScript/Rergister.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>  or use local jquery
    <script src="../src/libs/jqBootstrapValidation.js"></script>-->
    <script src="../src/libs/validate.min.js"></script>
    <title>Register Zeus</title>
</head>

<body>
    <img src="../images/logo.png">
    <div class="container" style="width: 800px;">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="row">

                <div class="col-12 col-md-6">
                    <label for="username">Usuario</label><br>
                    <input class="form-control" type="text" id="username" name="username" value="<?php echo $username; ?>" required><br><br>
                </div>

                <div class="col-12 col-md-6">
                    <label for="Correo">Mail</label><br>
                    <input class="form-control" type="text" id="Correo" name="Correo" value="<?php echo $Correo; ?>" required><br><br>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label for="confirm_password">Nueva Contraseña</label><br>
                        <span class="help-block"><?php echo $password_err; ?></span>
                        <input class="form-control" type="password" name="confirm_password" id="confirm_password" value="<?php echo $confirm_password; ?>" required><br><br>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label for="password">Repetir Nueva Contraseña</label><br>
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        <input class="form-control" type="password" name="password" id="password" value="<?php echo $confirm_password; ?>" required><br><br>
                    </div>
                </div>
            </div>
            <button type="submit" value="Registrarse" class="btn btn-outline-warning">Cambiar contraseña</button><br><br><br>
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