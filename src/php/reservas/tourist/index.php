<?php

session_start();

include_once('../config.php');
$db = new Database();

?>
<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Centro de Reservas</title>
	<link rel="shortcut icon" href="../../../images/Logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/styleReservasIndex.css">

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
					<li style="background-color: skyblue; margin-right: 20px;">
						<a style="color: darkblue;" href="index.php">Clases</a>
					</li>
					<li>
						<a style="color: skyblue;" href="myreservation.php">Mis reservas</a>
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
	<div id="info"></div>
	<!-- begin content -->
	<div class="container-fluid">

		<div class="panel panel-info" style="width: 80%; margin-left: auto; margin-right: auto;">
			<div class="panel-heading" style="text-align: center;">Lista de clases disponibles</div>
			<div class="panel-body" style="text-align: center;">
				<?php
				$sql = 'SELECT * FROM boats ORDER by b_name';
				$res = $db->getRows($sql);
				//echo print_r($res);
				if ($res) {
					foreach ($res as $r) {
						$b_id = $r['b_id'];
						$bName = $r['b_name'];
						$bCap = $r['b_cpcty'];
						$bON = $r['b_on'];
						$bImage = $r['b_img'];
						$bPrice = $r['b_price'];

				?>
						<a style="margin-left: 15px; " href="#" data-toggle="modal" data-target="#myModal<?php echo $b_id; ?>">
							<img class="img-rounded" style="margin-bottom: 15px; " src="<?php echo $bImage; ?>" height="200" width="300">
						</a>
						
						<!-- Modal -->
						<div id="myModal<?php echo $b_id; ?>" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<img src="<?php echo $bImage; ?>" height="250" width="250">
											</div>
											<div class="col-md-6">
												<form>
													<strong>Clase: </strong><?php echo $bName; ?><br />
													<strong>Capacidad: </strong><?php echo $bCap; ?><br />
													<strong>Precio: </strong><?php echo number_format($bPrice, 2) . ' €'; ?><br />
													<strong>Instructor: </strong><?php echo $bON; ?> <br />
													<strong>Comentario: </strong> <br />
													<input type="text" id="dstntn<?php echo $b_id; ?>">
													<br />
													<strong>Fecha: </strong>&nbsp;
													<br />
													<input class="btn-default" id="rdate<?php echo $b_id; ?>" size="30" name="rdate" type="date" autocomplete="off">
													<br />
													<strong>Hora: </strong>
													<br />
													<select class="btn-default" id="hr">
														<?php
														$x = 12;
														for ($time = 1; $time <= $x; $time++) {
														?>
															<option value="<?php echo $time; ?>"><?php echo $time; ?></option>
														<?php
														} //end fpr
														?>
													</select>
													<select class="btn-default" id="ampm">
														<option value="AM">AM</option>
														<option value="PM">PM</option>
													</select>
												</form>

											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">
											Cerrar
											<span class="glyphicon glyphicon-remove-sign"></span>
										</button>
										<input type="submit" value="Reservar" onclick="bogkot('<?php echo $b_id; ?>')" class="btn btn-primary" data-dismiss="modal">
									</div>
								</div>

							</div>
						</div>

						<!-- modal END -->
				<?php
					} //end foreacyh of select all boats
				} //
				?>
			</div>
		</div>

	</div>
	<!-- end content -->
	<script type="text/javascript">
		function boat(str) {
			// alert(str);
		}
	</script>

	<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
	<script src="../bootstrap/js/dataTables.js"></script>
	<script src="../bootstrap/js/dataTables2.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>

</body>

</html>


<script type="text/javascript">
	function bogkot(str) {

		var dstntn = $('#dstntn' + str).val();

		var bid = str;
		var tid = '<?php echo $_SESSION['tourID']; ?>';
		var dstntn = $('#dstntn' + str).val();
		var rdate = $('#rdate' + str).val();
		var hr = $('#hr').val();
		var ampm = $('#ampm').val();


		var datas = "bid=" + bid + "&tid=" + tid + "&dstntn=" + dstntn + "&rdate=" + rdate + "&hr=" + hr + "&ampm=" + ampm;

		$.ajax({
			type: "POST",
			url: "reservedprocess.php",
			data: datas
		}).done(function(data) {
			$('#info').html(data);
		});

	}

	// alert("outside");
	// .
	// $('#bogkot').click(function(){
	// 		alert("ni gana");
	// });
</script>