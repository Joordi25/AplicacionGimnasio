<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../../Views/LoginView.php");
    exit;
}

require_once "config.php";

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 5) {
        $new_password_err = "La contraseña al menos debe tener 5 caracteres.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Por favor confirme la contraseña.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }




    if (empty($new_password_err) && empty($confirm_password_err)) {
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $sql2 = "UPDATE tourist SET password = ? WHERE id = ?";


        if ($stmt = mysqli_prepare($link, $sql)) {
            $param_password = hash("sha256", $new_password);
            $param_id = $_SESSION["id"];

            var_dump($_SESSION);
            var_dump($param_id);

            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);



            if (mysqli_stmt_execute($stmt)) {
                session_destroy();
                header("location: /AplicacionGimnasio/Views/LoginView.php");
                exit();
            } else {
                echo "Algo salió mal, por favor vuelva a intentarlo.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="shortcut icon" href="../../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <title>Perfil</title>
</head>

<body>

    <div class="container rounded mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 style="color: yellow;" class="text-right">Cambio de contraseña</h4>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div style="margin-bottom: 15px;" class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                            <label class="labels">Nueva contraseña</label>
                            <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                            <span class="help-block"><?php echo $new_password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label class="labels">Confirmar contraseña</label>
                            <input type="password" name="confirm_password" class="form-control">
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <br> <br>
                        <div class="mt-5 text-center"><input type="submit" class="btn btn-warning profile-button" value="Cambiar contraseña"></div>
                        <div class="mt-5 text-center"><a style="color: yellow;" href="perfil.php">Atrás</a></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

</html>