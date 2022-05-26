<?php 

	include_once('../config.php');//database
	$db = new Database();

?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Clases</title>
		<link rel="shortcut icon" href="../../../images/Logo.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/styleReservasIndex.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/jquery.dataTables.css">

		 <!--pagination-->
	    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
	    <script src="../bootstrap/	js/jquery.dataTables2.js"></script>
	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }

		td.align-img {
			line-height: 3 !important;
		}
	</style>

	<body style="background-color: skyblue;">

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
		<?php 
				//para delete
				if(isset($_GET['delid']))
					{
						$bid = $_GET['delid'];
						$sql = "DELETE FROM boats WHERE b_id = ? ";
						$res = $db->deleteRow($sql,[$bid]);

						$bimg = $_GET['bimg'];
						if($bimg != '../class_image/'.'default.png'){
							unlink($bimg);
						}
						//header('Location: index.php'$bimg.'.jpg'
					}
			?>


		 <div class="container">
			<a href="newclass.php" class="btn btn-success">
				Añadir
				<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
			</a>
			<br />
			<br />

		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th>CLASE</th>
					<th>CAPACIDAD</th>
					<th>INSTRUCTOR</th>
					<th><center>IMAGEN</center></th>
					<th>PRECIO</th>
					<th><center>ACCIÓN</center></th>
				</thead>
				<tbody>
					<?php 

						$sql = "SELECT * FROM boats ORDER BY b_name";
						$res = $db->getRows($sql);
						foreach ($res as $row) {
							$bid = $row['b_id'];
							$bn = $row['b_name'];
							$bcpcty = $row['b_cpcty'];
							$bon = $row['b_on'];
							$bimg = $row['b_img'];
							$bPrice = $row['b_price'];
						

					?>
					<tr>
						<td class="align-img"><?php echo $bn; ?></td>
						<td class="align-img"><?php echo $bcpcty; ?></td>
						<td class="align-img"><?php echo $bon; ?></td>
						<td class="align-img"><center><img src="<?php echo $bimg; ?>" width="50" height="50"></center></td>
						<td class="align-img"><?php echo number_format($bPrice, 2) . ' €'; ?></td>
						<td class="align-img">
							<a class = "btn btn-primary btn-xs" href="boatsupdate.php?editid=<?php echo $bid; ?>">
								Editar
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a class = "btn btn-danger  btn-xs" href="index.php?delid=<?php echo $bid; ?>&bimg=<?php echo $bimg; ?>">
								Eliminar
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
					<?php } ?>

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
    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>


    <script>
//script for pagination
$(document).ready(function(){
    $('#myTable').dataTable();
});
    </script>


</html>



<?php 
$db->Disconnect();
?>