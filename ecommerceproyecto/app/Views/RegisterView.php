<?php
session_start();
require_once "config.php";

$username = $password = $confirm_password = $Correo = "";
$username_err = $password_err = $confirm_password_err = $Correo_err = "";
$direccion = "direccion";
$nombre = "nombre";
$apellidos = "apellidos";
$num_tlf = "999999999";
$pais = "España";
$cod_postal = "12345";
$imagen = "images/perfil/perfil_defecto.jpg";


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
                    $username_err = "Este usuario ya fue tomado.";
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
                    $Correo_err = "Este correo ya fue tomado.";
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

    if (empty($username_err) && empty($password_err) && empty($confirm_password_err && empty($Correo_err))) {



        $codigo_email = sha1(time() + rand(0, 9999));
        $hashed_password = password_hash("$password", PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, Correo, direccion, nombre, apellidos, num_tlf, pais, cod_postal, foto)
                VALUES ('$username', '$hashed_password', '$Correo', '$direccion', '$nombre', '$apellidos', '$num_tlf', '$pais', '$cod_postal', '$imagen')";



        if (mysqli_query($link, $sql)) {

            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;


            header("location: ../Index.php");
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/css.css">
    <link rel="icon" href="images/favicon.png">

<body>
    <div class="login-page">
        <div class="form">
            <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($Correo_err)) ? 'has-error' : ''; ?>">
                    <label>Correo</label>
                    <input type="text" name="Correo" class="form-control" value="<?php echo $Correo; ?>">
                    <span class="help-block"><?php echo $Correo_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Usuario</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirmar Contraseña</label>
                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" id="iniciar" value="Registrarse">
                </div>
                <p>¿Ya tienes una cuenta? <a href="LoginView.php">Inicia sesión aquí</a>.</p> <br> <br> <br>
                <p><a href="../Index.php" class="btn btn-primary">Volver al inicio</a></p>
            </form>
        </div>
    </div>
</body>

</html>