<?php
	session_start();

	$user =  !empty($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'registrate';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Carrito</title>
	<link rel="icon" href="../images/favicon.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
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
			if(isset($_SESSION['message'])){
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
						if(!empty($_SESSION['cart'])){
						//connection
						$conn = new mysqli('localhost', 'root', '', 'demo');
						//create array of initail qty which is 1
 						$index = 0;
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
						$sql = "SELECT * FROM products WHERE id IN (".implode(',',$_SESSION['cart']).")";
						$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								?>
								<tr>
									<td>
										<a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
									</td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo number_format($row['price'], 2); ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><?php echo $_SESSION['qty_array'][$index]; ?></td>
									<td><?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?></td>
									<?php $total += $_SESSION['qty_array'][$index]*$row['price']; ?>
								</tr>
								<?php
								$index ++;
							}
						}
						else{
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
			<a href="../../Index.php" class="btn btn-success"> Inicio</a>
			<a href="clear_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Limpiar carrito</a>
			<a href="compra/pagar.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Comprar</a>
			</form>
		</div>
	</div>
</div>
</body>
</html>