<?php

include_once('../config.php'); //database
$db = new Database();
?>

<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Clase</title>
	<link rel="shortcut icon" href="../../../images/Logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/styleReservas.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/jquery.dataTables.css">

</head>

<style type="text/css">
	.navbar {
		margin-bottom: 0px !important;
	}

	.carousel-caption {
		margin-top: 0px !important
	}
</style>

<body>
	<br />
	<br />
	<br />

	<!-- begin whole content -->
	<nav class="background navbar-fixed-top" role="navigation">
		<div class="container-fluid" style="margin-bottom: 25px; margin-top: 25px;">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a href="../../../../index.php"><img src="../../../../images/logo.png" height="60" width="60"></a> &nbsp;
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li style="color: white; font-family: Times New Roman; font-size: 30px; margin-right: 20px;">Centro de Reservas </li>
				</ul>

				<ul class="nav navbar-nav" style="font-family: Times New Roman;">
					<li style="margin-right: 20px;">
						<a style="color: skyblue;" href="index.php">Clases</a>
					</li>
					<li>
						<a style="color: skyblue;" href="reservation.php">Reservas</a>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right" style="font-family: Times New Roman;">
					<li style="margin-right: 25px;">
						<?php include_once('../includes/logout.php'); ?>
					</li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<!-- end -->
	<br><br><br><br><br><br><br>
	<!-- main cntent -->
	<div class="container-fluid">

		<div class="col-md-3"></div>
		<div class="col-md-6">
			<a href="index.php" class="btn btn-danger">
				Atrás
				<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
			</a>
			<br />
			<br />



			<form action="" method="POST" enctype="multipart/form-data">
				<?php
				//vie3w boat
				if (isset($_GET['editid'])) {
					$editid = $_GET['editid'];

					$sql = "SELECT * FROM boats WHERE b_id = ?";
					$res = $db->getRow($sql, [$editid]);
					$bname =  $res['b_name'];
					$bon =  $res['b_on'];
					$bcpcty =  $res['b_cpcty'];
					$getoldbimg = $res['b_img'];
					$bPrice = $res['b_price'];
				}

				//update boat

				if (isset($_POST['updateboat'])) {
					$editid = $_POST['editid'];

					$bname = $_POST['bN'];
					$bon = $_POST['bON'];
					$bcpcty = $_POST['bC'];
					$oldbimg = $_POST['oldbimg'];
					$bPrice = $_POST['bprice'];


					//select old photo to delete in folder
					// echo print_r($bimg);


					$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
					// do some checks to make sure the file you have is an image and if you can trust it
					move_uploaded_file($_FILES["bimg"]["tmp_name"], "../class_image/" . $new_image_name);
					$new_image_name = '../class_image/' . $new_image_name;

					if (empty($_FILES["bimg"]["tmp_name"])) {
						$sql = "UPDATE boats SET b_name = ?, b_cpcty = ?, b_on = ?, b_price = ? WHERE b_id = ?";
						$res = $db->updateRow($sql, [$bname, $bcpcty, $bon, $bPrice, $editid]);
					} else {
						$sql = "UPDATE boats SET b_name = ?, b_cpcty = ?, b_on = ?, b_img = ?, b_price = ? WHERE b_id = ?";
						$res = $db->updateRow($sql, [$bname, $bcpcty, $bon, $new_image_name, $bPrice, $editid]);
						if ($oldbimg != '../class_image/fondo.jpg') {
							unlink($oldbimg);
						}
					}


					echo '
							 				<div class="alert alert-success">
											  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											  <strong>¡Hecho!</strong> Editado correctamente.
											</div>
							 			';
				} //end if isset updateboat
				?>

				<div class="form-group">
					<label for="inputdefault">Nombre de la clase:</label>
					<input class="form-control" id="inputdefault" name="editid" type="hidden" value="<?php echo $editid; ?>">
					<input class="form-control" id="inputdefault" name="bN" type="text" value="<?php echo $bname; ?>">
				</div>

				<div class="form-group">
					<label for="inputdefault">Nombre del instructor:</label>
					<input class="form-control" id="inputdefault" name="bON" type="text" value="<?php echo $bon; ?>">
				</div>

				<div class="form-group">
					<label for="inputdefault">Capacidad de la clase:</label><br />
					<select name="bC" class="btn-lg" style="width:250px;">
						<option <?php if ($bcpcty == '15 Persons') {
									echo 'selected';
								} ?> value="15 Persons">15 Persons</option>
						<option <?php if ($bcpcty == '25 Persons') {
									echo 'selected';
								} ?> value="25 Persons">25 Persons</option>
						<option <?php if ($bcpcty == '30 Persons') {
									echo 'selected';
								} ?> value="30 Persons">30 Persons</option>
					</select>
				</div>

				<div class="form-group">
					<label for="inputdefault">Precio por persona:</label>
					<input class="form-control" id="inputdefault" name="bprice" value="<?php echo $bPrice; ?>" type="number">
				</div>


				<input type="hidden" name="oldbimg" value="<?php echo $getoldbimg; ?>">

				<div class="form-group">
					<label for="inputdefault">Imagen:</label>
					<input class="form-control" id="inputdefault" name="bimg" type="file">
				</div>

				<button class="btn btn-success" name="updateboat">
					Guardar
					<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
				</button>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
	<!-- main cntent -->



	<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
	<script src="../bootstrap/js/dataTables.js"></script>
	<script src="../bootstrap/js/dataTables2.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>

</body>

</html>