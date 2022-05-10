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
	<link rel="icon" href="../images/favicon.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
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
					<a class="navbar-brand" href="../../../Views/index.php">INICIO</a>
					<?php if ((isset($_SESSION["loggedin"]))) : ?>
						<p class="navbar-brand"> Hola, <?php echo $user; ?></p>
					<?php endif ?>

					<?php if ((!isset($_SESSION["loggedin"]))) : ?>
						<p class="navbar-brand"> No puedes comprar sino estás registrado</p>
					<?php endif ?>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<!-- left nav here -->
					</ul>
					<?php if ((isset($_SESSION["loggedin"]))) : ?>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Carrito <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
						</ul>
					<?php endif ?>
				</div>
			</div>
		</nav>
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
			<div class="col-sm-3">
				<div class="panel panel-default hola">
					<div class="panel-body">
						<div class="row product_image">
							<img src="<?php echo $row['photo'] ?>" width="80%" height="auto"> <br> <br>
						</div>
						<div class="row product_name">
							<br> <br> <br>
							<h4><?php echo $row['name']; ?></h4>
						</div>
						<?php if ((isset($_SESSION["loggedin"]))) : ?>
							<div class="row product_footer">
								<br> <br>
								<p class="pull-left"><b><?php echo $row['price'] . "€"; ?></b></p>
								<span class="pull-right"><a href="add_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Añadir</a></span>
							</div>
						<?php endif ?>

					</div>
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