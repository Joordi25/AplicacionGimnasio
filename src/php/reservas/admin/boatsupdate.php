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
		<title>Boat Reservation</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/jquery.dataTables.css">

	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>

	<body>

		<br />
		<br />
		<br />
		
	
			

		<!-- begin whole content -->
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<img src="../img/boatlogo.png" height="50" width="50"> &nbsp;
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#" style="font-family: Times New Roman; font-size: 30px;">Boat Reservation</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family: Times New Roman;">
							<li class="active">
								<a href="index.php">Boats</a>
							</li>
							<li>
								<a href="reservation.php">Reservation</a>
							</li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right" style="font-family: Times New Roman;">
							<li>
								<?php include_once('../includes/logout.php'); ?>
							</li>
						
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		<!-- end -->

		<br />

		
		<!-- main cntent -->
		<div class="container-fluid">

			<div class="col-md-3"></div>
			<div class="col-md-6">
				<a href="index.php" class="btn btn-success">
					Back
					<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
				</a>
			<br />
			<br />

			

				<form action = "" method = "POST" enctype="multipart/form-data">
						<?php 
							//vie3w boat
							if(isset($_GET['editid']))
								{
									$editid = $_GET['editid'];

									$sql = "SELECT * FROM boats WHERE b_id = ?";
									$res = $db->getRow($sql, [$editid]);
									$bname =  $res['b_name'];
									$bon =  $res['b_on'];
									$bcpcty =  $res['b_cpcty'];
									$getoldbimg = $res['b_img'];
								
								 }

								 //update boat

								 if(isset($_POST['updateboat']))
								 	{
								 		$editid = $_POST['editid'];

								 		$bname = $_POST['bN'];
								 		$bon = $_POST['bON'];
								 		$bcpcty = $_POST['bC'];
								 		$oldbimg = $_POST['oldbimg'];

								 		
										$bPrice = null;
										if($bcpcty == '15 Persons'){
											$bPrice = 3000;
										}else if($bcpcty == '25 Persons'){
											$bPrice = 3500;
										}else{
											$bPrice = 4000;
										}//end if else of bc price


								 		//select old photo to delete in folder
								 		// echo print_r($bimg);


										$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
										// do some checks to make sure the file you have is an image and if you can trust it
										move_uploaded_file($_FILES["bimg"]["tmp_name"], "../boat_image/".$new_image_name);
										$new_image_name = '../boat_image/'.$new_image_name;

										if(empty($_FILES["bimg"]["tmp_name"])){
											$sql = "UPDATE boats SET b_name = ?, b_cpcty = ?, b_on = ?, b_price = ? WHERE b_id = ?";
								 			$res = $db->updateRow($sql, [$bname, $bcpcty,$bon, $bPrice, $editid]);
										}else{
								 			$sql = "UPDATE boats SET b_name = ?, b_cpcty = ?, b_on = ?, b_img = ?, b_price = ? WHERE b_id = ?";
								 			$res = $db->updateRow($sql, [$bname, $bcpcty,$bon,$new_image_name, $bPrice, $editid]);
								 			if($oldbimg != '../boat_image/default.png'){
								 				unlink($oldbimg);
								 			}
										}


							 			echo '
							 				<div class="alert alert-success">
											  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											  <strong>Success!</strong> Edit Successfully.
											</div>
							 			';
								 	}//end if isset updateboat
						?>

					   <div class="form-group">
					    <label for="inputdefault">Boat Name:</label>
					    <input class="form-control" id="inputdefault"  name="editid" type="hidden" value ="<?php echo $editid; ?>">
					    <input class="form-control" id="inputdefault"  name="bN" type="text" value ="<?php echo $bname; ?>">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Boat Operator Name:</label>
					    <input class="form-control" id="inputdefault" name="bON" type="text" value ="<?php echo $bon; ?>">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Boat Capacity:</label><br />
					    <select name = "bC" class = "btn-lg" style = "width:250px;">
					    	<option <?php if($bcpcty == '15 Persons'){echo 'selected';} ?> value = "15 Persons">15 Persons</option>
					    	<option <?php if($bcpcty == '25 Persons'){echo 'selected';} ?> value = "25 Persons">25 Persons</option>
					    	<option <?php if($bcpcty == '30 Persons'){echo 'selected';} ?> value = "30 Persons">30 Persons</option>
					    </select>
					  </div>

					  <input type="hidden" name="oldbimg" value="<?php echo $getoldbimg; ?>">

					   <div class="form-group">
				    	  <label for="inputdefault">Boat Picture:</label>
					      <input class="form-control" id="inputdefault" name="bimg" type="file">
					    </div>

					  <button class="btn btn-info" name = "updateboat">
					  		Save
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