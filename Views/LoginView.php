<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.html");
    exit;
}

require_once "../src/php/config.php";

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

            header("location: index.php");
        } else {
            $password_err = "La contraseña que has ingresado no es válida.";
        }

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
    <title>Login Zeus</title>
</head>

<body>
    <img src="../images/logo.png">
    <div class="container" style="width: 500px;">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label for="user">Usuario</label><br>
            <span class="help-block"><?php echo $username_err; ?></span>
            <input class="form-control" type="text" id="username" name="username"><br><br>
        </div>

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="password">Contraseña</label><br>
            <span class="help-block"><?php echo $password_err; ?></span>
            <input class="form-control" type="password" name="password" id="password" required><br><br>
        </div>

            <button type="submit" class="btn btn-outline-warning" id="iniciar" href="index.php">Iniciar sesión</button><br><br><br>
            <label>No tienes cuenta?</label>
            <a style="color: yellow" href="RegisterView.php">Registrate</a><br><br>
            <label style="color: yellow">Restablecer contraseña</label><br><br>
        </form>
    </div>
</body>

</html>