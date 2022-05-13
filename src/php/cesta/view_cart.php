<?php
session_start();

$user =  !empty($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'registrate';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Carrito</title>
    <link rel="stylesheet" href="../../../src/css/StyleProductos.css">
	<link rel="icon" href="\AplicacionGimnasio\images\icon.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
	<div class="row">
		<div class="col-md-1">
			<img id="logo" src="/AplicacionGimnasio/images/logo.png" width="170" height="170">
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-1 top">
			<a class="menu" href="/AplicacionGimnasio/Views/index.php#">INICIO</a>
		</div>
		<div class="col-md-1 top">
			<a class="menu" href="/AplicacionGimnasio/Views/reservas.php">RESERVAS</a>
		</div>
		<div class="col-md-1 top">
			<a class="menu" href="inicio.php">MARKETPLACE</a>
		</div>
		<div class="col-md-1 top">
			<a class="menu selected" href="view_cart.php">CESTA</a>
		</div>
		<div class="col-md-2 top">
			<a class="menu" href="/AplicacionGimnasio/Views/index.php#">SOBRE NOSOTROS</a>
		</div>

		<div class="col-md-1 top">
			<?php if ((isset($_SESSION["loggedin"]))) : ?>
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						Hola, <?php echo $user; ?>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						<li><a class="dropdown-item" href="../src/php/perfil.php">Cuenta</a></li>
						<?php if ((isset($_SESSION["loggedin"])) && $user == "admin") : ?>
							<a class="dropdown-item" href="../src/php/cesta/inicio_admin.php">Productos</a>
						<?php endif ?>
						<li><a class="dropdown-item" href="../src/php/cesta/view_cart.php">Cesta</a></li>
						<li><a class="dropdown-item" href="../src/php/cerrar.php">Cerrar sesión</a></li>
					</ul>
				</div>
			<?php endif ?>
		</div>
		<?php if ((!isset($_SESSION["loggedin"]))) : ?>
			<div class="col-md-1 top">
				<a class="menu" href="RegisterView.php">REGISTRARSE</a>
			</div>
			<div class="col-md-2 top">
				<a class="menu amarillo" href="LoginView.php">INICIAR SESIÓN</a>
			</div>
		<?php endif ?>

	</div>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<p class="navbar-brand"> Esta es lo que tienes en la cesta, <?php echo $user; ?></p>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<!-- left nav here -->
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Carrito <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<h1 class="page-header text-center">Detalles de la cesta</h1>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<?php
				if (isset($_SESSION['message'])) {
				?>
					<div class="alert alert-info text-center">
						<?php echo $_SESSION['message']; ?>
					</div>
				<?php
					unset($_SESSION['message']);
				}

				?>
				<form method="POST" action="save_cart.php">
					<table class="table table-bordered table-striped">
						<thead>
							<th></th>
							<th>Nombre</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Total</th>
						</thead>
						<tbody>
							<?php
							//initialize total
							$total = 0;
							if (!empty($_SESSION['cart'])) {
								//connection
								$conn = new mysqli('localhost', 'root', '', 'zeus');
								//create array of initail qty which is 1
								$index = 0;
								if (!isset($_SESSION['qty_array'])) {
									$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
								}
								$sql = "SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";
								$query = $conn->query($sql);
								while ($row = $query->fetch_assoc()) {
							?>
									<tr>
										<td>
											<a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
										</td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo number_format($row['price'], 2); ?></td>
										<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
										<td><?php echo $_SESSION['qty_array'][$index]; ?></td>
										<td><?php echo number_format($_SESSION['qty_array'][$index] * $row['price'], 2); ?></td>
										<?php $total += $_SESSION['qty_array'][$index] * $row['price']; ?>
									</tr>
								<?php
									$index++;
								}
							} else {
								?>
								<tr>
									<td colspan="4" class="text-center">No hay nada en el carrito</td>
								</tr>
							<?php
							}

							?>
							<tr>
								<td colspan="4" align="right"><b>Total</b></td>
								<td><b><?php echo number_format($total, 2); ?></b></td>
							</tr>
						</tbody>
					</table>
					<a href="inicio.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atrás</a>
					<a href="../../../Views/index.php" class="btn btn-success"> Inicio</a>
					<a href="clear_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Limpiar carrito</a>
					<a href="compra/pagar.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Comprar</a>
				</form>
			</div>
		</div>
	</div>
</body>

</html>