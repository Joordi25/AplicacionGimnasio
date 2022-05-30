<?php
include_once('config.php');
include_once('database/Database.php'); //database
$db = new Database();
$password_err = "";

if (isset($_POST['login'])) {
	$un = $_POST['un'];
	$up = $_POST['up'];
	$up = hash("sha256", $up);

	//$up = md5($up);

	$sql = 'SELECT * FROM tourist WHERE tour_un = ? AND tour_up = ?';
	$result = $db->getRow($sql, [$un, $up]);
	//echo print_r($result);

	if ($result) {
		$r = $result['user_type'];

		if ($r == '1') {
			$_SESSION['logged'] = '1';
			header('location: admin/index.php');
		} else {
			$_SESSION['logged'] = '2';

			$_SESSION['tourID'] = $result['tour_id'];

			header('location: tourist/index.php');
		}
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
	<link rel="stylesheet" type="text/css" href="bootstrap/css/styleReservas.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.dataTables.css">

</head>

<style type="text/css">
	.navbar {
		margin-bottom: 0px !important;
	}

	.carousel-caption {
		margin-top: 0px !important
	}
</style>



<body class="background">
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 style="text-align: center;" class="panel-title">Confirma tu usuario para reservar una actividad</h3>
				</div>
				<div class="panel-body">
					<form action="" method="post">
						<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
							<label for="inputdefault">Usuario:</label>
							<input class="form-control" name="un" type="text" required autofocus value="<?php if (isset($_POST['un'])) {
																											echo $_POST['un'];
																										} ?>">
							<span class="help-block"><?php echo $password_err; ?></span>
						</div>

						<div class="form-group">
							<label for="inputdefault">Contraseña:</label>
							<input class="form-control" name="up" type="password" required>
						</div>

						<button class="btn btn-info" type="submit" name="login">
							Iniciar Sesión
							<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
						</button>
						<a class="btn btn-warning profile-button" href="../../../index.php">Cancelar</a>
					</form>
				</div>
			</div>
			<div style="text-align: center;">
				<label style="color: white;">No tienes cuenta?</label>
				<a style="color: skyblue" href="../../../Views/RegisterView.php">Registrate</a><br><br>
				<a style="color: skyblue" href="../../../Views/OlvidarView.php">Restablecer contraseña</a><br><br>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	<script src="bootstrap/js/jquery-1.11.1.min.js"></script>
	<script src="bootstrap/js/dataTables.js"></script>
	<script src="bootstrap/js/dataTables2.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>

</body>

</html>