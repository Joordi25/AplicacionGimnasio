<?php
session_start();
//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);


$user =  !empty($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'registrate';

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Productos</title>
    <link rel="shortcut icon" href="\AplicacionGimnasio\images\icon.png" type="image/x-icon">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="../../css/StyleProductos.css" rel="stylesheet">
	<style>
		.product_image {
			height: 200px;
		}

		.product_name {
			height: 80px;
			padding-left: 20px;
			padding-right: 20px;
		}

		.product_footer {
			padding-left: 20px;
			padding-right: 20px;
		}

		.hola {
			padding-bottom: 15%;
		}
	</style>
</head>

<body>
	<div class="row">
		<div class="col-md-1">
			<img id="logo" src="../../../images/logotransparente.png" width="170" height="170" style="margin-left: 10px;">
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-1 top">
			<a class="menu" href="../../../Views/index.php#">INICIO</a>
		</div>
		<div class="col-md-1 top">
			<a class="menu" href="../../../Views/reservas.php">RESERVAS</a>
		</div>
		<div class="col-md-1 top">
			<a class="menu" href="../../../src/php/cesta/inicio.php">TIENDA</a>
		</div>
		<div class="col-md-1 top">
			<a class="menu" href="../../../src/php/cesta/view_cart.php">CESTA<span class="badge"><?php echo count($_SESSION['cart']); ?></a>
		</div>
		<div class="col-md-2 top">
			<a class="menu" href="\AplicacionGimnasio\Views\galeria.php">SOBRE NOSOTROS</a>
		</div>

		<div class="col-md-1 top">
			<?php if ((isset($_SESSION["loggedin"]))) : ?>
				<div class="dropdown">
					<button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						Hola, <?php echo $user; ?>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						<li><a class="dropdown-item" href="../../../src/php/perfil.php">Cuenta</a></li>
						<?php if ((isset($_SESSION["loggedin"])) && $user == "admin") : ?>
							<a class="dropdown-item" href="../../../src/php/cesta/inicio_admin.php">Productos</a>
						<?php endif ?>
						<li><a class="dropdown-item" href="../../../src/php/cesta/view_cart.php">Cesta</a></li>
						<li><a class="dropdown-item" href="../../../src/php/cerrar.php">Cerrar sesión</a></li>
					</ul>
				</div>
			<?php endif ?>

			<nav class="">
				<?php if ((isset($_SESSION["loggedin"]))) : ?>
					<?php if ((isset($_SESSION["loggedin"])) && $user == "admin") : ?>
						<br><span class=""><a href="añadir_pala.php" style="color: yellow;"><span></span> Añadir producto</a></span>
					<?php endif ?>
				<?php endif ?>
				<?php if ((!isset($_SESSION["loggedin"]))) : ?>
					<p style="color: red;"> No puedes comprar sino estás registrado</p>
				<?php endif ?>
			</nav>
		</div>
		<?php if ((!isset($_SESSION["loggedin"]))) : ?>
			<div class="col-md-1 top">
				<a class="menu " href="../../../Views/RegisterView.php">REGISTRARSE</a>
			</div>
			<div class="col-md-2 top">
				<a class="menu amarillo" href="../../../Views/LoginView.php">INICIAR SESIÓN</a>
			</div>
		<?php endif ?>

	</div>
	<div class="container">
		<?php
		//info message
		if (isset($_SESSION['message'])) {
		?>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6">
					<div class="alert alert-info text-center">
						<?php echo $_SESSION['message']; ?>
					</div>
				</div>
			</div>
		<?php
			unset($_SESSION['message']);
		}
		//end info message
		//fetch our products	
		//connection
		$conn = new mysqli('localhost', 'root', '', 'zeus');

		$sql = "SELECT * FROM products";
		$query = $conn->query($sql);
		$inc = 4;
		while ($row = $query->fetch_assoc()) {
			$inc = ($inc == 4) ? 1 : $inc + 1;
			if ($inc == 1) echo "<div class='row text-center'>";
		?>
			<div class="col-sm-3" style="margin-bottom: 15px;">
				<div class="productos">
					<div class="row">
						<br>
						<img src="<?php echo $row['photo'] ?>" height="260px">
					</div>
					<br>
					<div class="row">
						<br>
						<h4 class="nombreProducto"><?php echo $row['name']; ?><br> <br>
							<p><b><?php echo $row['price'] . "€"; ?></b></p>
						</h4>
					</div>

					<?php if ((isset($_SESSION["loggedin"])) && $user == "admin") : ?>
						<br>
						<div class="row product_footer"><span>
							<a href="delete_pala.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></span>
						</div>
						<br>
					<?php endif ?>
				</div>
			</div>
		<?php
		}
		if ($inc == 1) echo "<div></div><div></div><div></div></div>";
		if ($inc == 2) echo "<div></div><div></div></div>";
		if ($inc == 3) echo "<div></div></div>";

		?>
	</div>
</body>

</html>