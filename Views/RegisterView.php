<?php
session_start();
require_once "../src/php/config.php";

$username = $password = $confirm_password = $Correo = $fecha = $nombre = $num_tlf = $apellidos = "";
$username_err = $password_err = $confirm_password_err = $Correo_err = $nombre_err = $fecha_err = $num_tlf_err = $apellidos_err = "";
$direccion = "direccion";
$pais = "España";
$imagen = "../images/perfil/perfil_defecto.jpg";
$str = "";
/*
function is_valid_email($str)
{
    return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
}
*/
function is_valid_email($str)
{
    return $error = (!filter_var($str, FILTER_VALIDATE_EMAIL)) ? true : false;
}

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

    if (empty(trim($_POST["nombre"]))) {
        $nombre_err = "Por favor ingrese un nombre.";
    } else {
        $sql = "SELECT id FROM users WHERE nombre = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_nombre);

            $param_nombre = trim($_POST["nombre"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                $nombre = trim($_POST["nombre"]);
            } else {
                echo "Al parecer algo salió mal.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    if (empty(trim($_POST["apellidos"]))) {
        $apellidos_err = "Por favor ingrese los apellidos.";
    } else {
        $sql = "SELECT id FROM users WHERE apellidos = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_apellidos);

            $param_apellidos = trim($_POST["apellidos"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                $apellidos = trim($_POST["apellidos"]);
            } else {
                echo "Al parecer algo salió mal.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    if (empty(trim($_POST["fecha"]))) {

       
        $fecha_err = "Por favor ingrese su fecha de nacimiento.";
       
        
    } else {

        $date1 = new DateTime($_POST["fecha"]);
        $date2 = new DateTime("now");
        $diff = $date1->diff($date2);
        
        if($diff->y > 15){
            $fecha_err = "";
            $sql = "SELECT id FROM users WHERE fecha = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_fecha);

            $param_fecha = trim($_POST["fecha"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                $fecha = trim($_POST["fecha"]);
            } else {
                echo "Al parecer algo salió mal.";
            }
        }

        mysqli_stmt_close($stmt);
        }else{
            $fecha_err = "Tienes que ser mayor de 15";
        }
        
    }

    if (empty(trim($_POST["num_tlf"]))) {
        $num_tlf_err = "Por favor ingrese un numero de teléfono.";
    } else {

        $param_tlf = trim($_POST["num_tlf"]);
        if($param_tlf>=600000000 && $param_tlf<=799999999){
            $sql = "SELECT id FROM users WHERE num_tlf = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_tlf);

            $param_tlf = trim($_POST["num_tlf"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $num_tlf_err = "Este numero de teléfono ya está registrado.";
                } else {
                    $num_tlf = trim($_POST["num_tlf"]);
                }
            } else {
                echo "Al parecer algo salió mal.";
            }
        }

        mysqli_stmt_close($stmt);
        }else{
            $num_tlf_err = "Por favor ingrese un numero de teléfono válido";
        }
        
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

    if (empty($username_err) && empty($password_err) && empty($fecha_err) && empty($num_tlf_err) && empty($confirm_password_err && empty($Correo_err)) && empty($password_err)){



        $codigo_email = sha1(time() + rand(0, 9999));
        //$hashed_password = password_hash("$password", PASSWORD_DEFAULT);
        $hashed_password = hash("sha256", $password);
        $sql = "INSERT INTO users (username, password, Correo, direccion, nombre, apellidos, num_tlf, pais, fecha, foto)
                VALUES ('$username', '$hashed_password', '$Correo', '$direccion', '$nombre', '$apellidos', '$num_tlf', '$pais', '$fecha', '$imagen')";


        $sql2 = "INSERT INTO tourist (tour_fN, tour_mN, tour_lN, tour_address, tour_contact, tour_un, tour_up, Correo, fecha, user_type)
                 VALUES ('$nombre', '$apellidos', '$apellidos', '$direccion', '$num_tlf', '$username', '$hashed_password', '$Correo', '$fecha', 2)";



        if (mysqli_query($link, $sql2)) {

            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;



            header("location: index.php");
        } else {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($link);
        }


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
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../src/css/LoginStyle.css" rel="stylesheet">
    <!--<script src="../src/JavaScript/Rergister.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>  or use local jquery
    <script src="../src/libs/jqBootstrapValidation.js"></script>
    <script src="../src/libs/validate.min.js"></script>-->
    <script src="../src/JavaScript/register.js"></script>
    <title>Register Zeus</title>
</head>

<body>
    <img src="../images/logo.png">
    <div class="container" style="width: 800px;">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="row">

                <div class="col-12 col-md-6">
                    <label for="nombre control-label">Nombre</label><br>
                    <span class="help-block"></span>
                    <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
                </div>

                <div class="col-12 col-md-6">
                    <label for="apellidos">Apellidos</label><br>
                    <input class="form-control" type="text" id="apellidos" value="<?php echo $apellidos; ?>" name="apellidos" required><br><br>
                </div>

                <div class="col-12 col-md-6 form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label for="username">Usuario</label><br>
                    <span class="help-block"><?php echo $username_err; ?></span>
                    <input class="form-control" type="text" id="username" name="username" value="<?php echo $username; ?>" required><br><br>
                </div>

                <div class="col-12 col-md-6 form-group <?php echo (!empty($Correo_err)) ? 'has-error' : ''; ?>">
                    <label for="Correo">Mail</label><br>
                    <span class="help-block"><?php echo $Correo_err; ?></span>
                    <input class="form-control" type="email" id="Correo" name="Correo" value="<?php echo $Correo; ?>" required><br><br>
                </div>

                <div class="col-12 col-md-6 form-group <?php echo (!empty($num_tlf_err)) ? 'has-error' : ''; ?>">
                    <label for="num_tlf">Teléfono</label><br>
                    <span class="help-block" id="tel_error"><?php echo $num_tlf_err; ?></span>
                    <input onkeyup="validateTel()" class="form-control" type="number" id="num_tlf" name="num_tlf" value="<?php echo $num_tlf; ?>" required><br><br>
                </div>

                <div class="col-12 col-md-6 <?php echo (!empty($fecha_err)) ? 'has-error' : ''; ?>">
                    <label for="fecha">Fecha de nacimiento</label><br>
                    <span class="help-block" id="data_error"><?= $fecha_err ?></span>
                    <input onkeyup="validateData()" class="form-control" type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>" required><br><br>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label for="confirm_password">Contraseña</label><br>
                        <span class="help-block" id="password_error1"></span>
                        <input onkeyup="validatePassword()" class="form-control" type="password" name="confirm_password" id="pass" value="<?php echo $confirm_password; ?>" required><br><br>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label for="password">Repetir Contraseña</label><br>
                        <span class="help-block" id="password_error2"></span>
                        <input required onkeyup="validatePassword()" class="form-control" type="password" name="password" id="confirm_pass" value="<?php echo $password; ?>"><br><br>
                    </div>
                </div>
            </div>
            <button type="submit" value="Registrarse" class="btn btn-outline-warning" href="LoginView.php">Registrarme</button><br><br><br>
            <label>Ya tienes una cuenta?</label>
            <a style="color: yellow" href="LoginView.php"> Inicia sesión</a><br><br>
            <a style="color: yellow" href="index.php">Inicio</a><br><br>
        </form>
    </div>
</body>

<script>
    /*//(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
    require(["validate.js"], function(validate) {
        // ...
    });
    var validate = require("validate.js");*/
</script>

</html>