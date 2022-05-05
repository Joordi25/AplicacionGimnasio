<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: /Index.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingrese su usuario.";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingrese su contraseña.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($username_err) && empty($password_err)) {
        //$sql = "SELECT id, username, password FROM users WHERE username = ?";
        $consulta = $link2->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $consulta->bind_param('s', $username);
        $consulta->execute();
        $fila = $consulta->get_result()->fetch_assoc();
        $link2->close();
        $consulta->close();
        if (password_verify($password, $fila['password'])) {
            session_start();

            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $fila['id'];
            $_SESSION["username"] = $username;

            header("location: ../Index.php");
        } else {
            $password_err = "La contraseña que has ingresado no es válida.";
        }

   }

   mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/css.css">
    <link rel="icon" href="images/favicon.png">
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Usuario</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" href="..\Index.php" value="Iniciar Sesión" id="iniciar">
                </div>
                <p>¿No tienes una cuenta? <a href="RegisterView.php">Regístrate ahora</a>.</p> <br>
                <p><a href="..\Index.php" class="btn btn-primary">Volver al inicio</a></p>
            </form>
        </div>
    </div>
</body>

</html>