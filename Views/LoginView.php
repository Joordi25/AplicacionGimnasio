<?php
include_once('../src/php/reservas/config.php'); //database
$db = new Database();

$password_err = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = hash("sha256", $password);

    //$up = md5($up);

    $sql = 'SELECT * FROM users WHERE username = ? AND password = ?';
    $result = $db->getRow($sql, [$username, $password]);
    //echo print_r($result);

    if ($result) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $result['id'];
        $_SESSION['username'] = $username;
        header('location: index.php');
    } else{
        $password_err = "Has introducido los datos inocrrectamente";
    }

} //end if isset log in
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmar Usuario</title>
    <link rel="shortcut icon" href="\AplicacionGimnasio\images\icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../src/css/LoginStyle.css" rel="stylesheet">
    <!--<script src="../src/JavaScript/Rergister.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>  or use local jquery
    <script src="../src/libs/jqBootstrapValidation.js"></script>
    <script src="../src/libs/validate.min.js"></script>-->
</head>

<body>
    <img src="../images/logo.png">
    <div class="container" style="width: 400px;">


        <form action="" method="post">
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label for="inputdefault">Usuario</label>
                <input class="form-control" name="username" id="username" type="text" required autofocus value="<?php if (isset($_POST['username'])) {
                                                                                                        echo $_POST['username'];
                                                                                                    } ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div> <br> 
            <div class="form-group">
                <label for="inputdefault">Contraseña:</label>
                <input class="form-control" name="password" id="password" type="password" required>
            </div> <br>  <br>

            <button class="btn btn-outline-warning" id="iniciar" type="submit" name="login">
                Iniciar Sesión
                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
            </button> <br>
        </form> <br> <br>


        <label style="color: white;">No tienes cuenta?</label>
        <a style="color: yellow" href="RegisterView.php">Registrate</a><br><br>
        <a style="color: yellow" href="OlvidarView.php">Recuperar contraseña</a><br><br>
        <a style="color: yellow" href="index.php">Inicio</a><br><br>

    </div>
    <script src="bootstrap/js/jquery-1.11.1.min.js"></script>
    <script src="bootstrap/js/dataTables.js"></script>
    <script src="bootstrap/js/dataTables2.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>

</body>

</html>