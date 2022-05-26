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
	<title>Mis Reservas</title>
	<link rel="shortcut icon" href="../../../images/Logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/styleReservasIndex.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/jquery.dataTables.css">

	<!--pagination-->
	<link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css">
	<!--searh box positioning-->
	<script src="../bootstrap/	js/jquery.dataTables2.js"></script>


</head>

<style type="text/css">
	.navbar {
		margin-bottom: 0px !important;
	}

	.carousel-caption {
		margin-top: 0px !important
	}

	td.align-img {
		line-height: 3 !important;
	}
</style>

<body>

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
					<li style="background-color: skyblue;">
						<a style="color: darkblue;" href="myreservation.php">Mis reservas</a>
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

	<div class="container">

		<br />
		<br />

		<?php
		// delete reserved
		if (isset($_GET['delr_id'])) {
			$delrid = $_GET['delr_id'];
			$tid = $_SESSION['tourID'];

			$sql = "DELETE FROM reservation WHERE tour_id = ? AND r_id = ?";
			$res = $db->deleteRow($sql, [$tid, $delrid]);

			echo '
								<div class="alert alert-success">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong>Success!</strong> Cancel Reservation Successfully.
								</div>
							';
			// header('Location: myreservation.php');
		}
		?>

		<br />
		<table id="myTable" class="table table-striped">
			<thead>
				<th>
					<center>IMAGEN</center>
				</th>
				<th>NOMBRE</th>
				<th>INSTRUCTOR</th>
				<th>COMENTARIO</th>
				<th>FECHA</th>
				<th>HORA</th>
				<th>PRECIO</th>
				<th>
					<center>ACTION</center>
				</th>
			</thead>
			<tbody>
				<?php
				$tid = $_SESSION['tourID'];
				$sql = "SELECT * FROM reservation r INNER JOIN boats b ON b.b_id = r.b_id
			INNER JOIN tourist t ON t.tour_id = r.tour_id
			WHERE t.tour_id = ? ";
				$res = $db->getRows($sql, [$tid]);

				// echo print_r($res);

				foreach ($res as  $r) {

					$r_id = $r['r_id'];
					$img = $r['b_img'];
					$bn = $r['b_name'];
					$bon = $r['b_on'];
					$dstntn = $r['r_dstntn'];
					$bprice = $r['b_price'];
					$rdate = $r['r_date'];
					$rhr = $r['r_hr'];
					$rampm = $r['r_ampm'];

					$oras = $rhr . ' ' . $rampm;
				?>
					<tr>
						<td class="align-img">
							<center><img src="<?php echo $img; ?>" width="50" height="50"></center>
						</td>
						<td class="align-img"><?php echo $bn; ?></td>
						<td class="align-img"><?php echo $bon; ?></td>
						<td class="align-img"><?php echo $dstntn; ?></td>
						<td class="align-img"><?php echo $rdate; ?></td>
						<td class="align-img"><?php echo $oras; ?></td>
						<td class="align-img"><?php echo number_format($bprice, 2); ?></td>
						<td class="align-img">
							<a class="btn btn-danger  btn-xs" href="myreservation.php?delr_id=<?php echo $r_id; ?>">
								Cancelar
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
				<?php
				} //end foreach loop of display all resevdbation


				?>



			</tbody>
		</table>

	</div>

	<!-- main cntent -->

</body>
<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
<script src="../bootstrap/js/dataTables.js"></script>
<script src="../bootstrap/js/dataTables2.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<!--pagination-->
<link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css">
<!--searh box positioning-->
<script src="../bootstrap/js/jquery.dataTables2.js"></script>


<script>
	//script for pagination
	$(document).ready(function() {
		$('#myTable').dataTable();
	});
</script>



<!-- main cntent -->

</body>
<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
<script src="../bootstrap/js/dataTables.js"></script>
<script src="../bootstrap/js/dataTables2.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<!--pagination-->
<link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css">
<!--searh box positioning-->
<script src="../bootstrap/js/jquery.dataTables2.js"></script>






</html>



<?php
$db->Disconnect();
?>