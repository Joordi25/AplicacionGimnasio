<?php
include_once('config.php'); //database
$db = new Database();

if (isset($_POST['login'])) {
	$un = $_POST['un'];
	$up = $_POST['up'];

	$up = md5($up);

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
	} //if true

} //end if isset log in
?>

<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../../../images/logo.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="../../css/LoginStyle.css" rel="stylesheet">
	<!--<script src="../src/JavaScript/Rergister.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>  or use local jquery
    <script src="../src/libs/jqBootstrapValidation.js"></script>
    <script src="../src/libs/validate.min.js"></script>-->
	<title>Login Zeus</title>
</head>

<body>
	<img src="../../images/Logo.png">
	<div class="container" style="width: 400px;">
		<form action="" method="post">
			<div class="form-group">
				<label for="inputdefault">Username:</label> <br>
				<input class="form-control" name="un" type="text" required autofocus value="<?php if (isset($_POST['un'])) {echo $_POST['un'];} ?>"> <br>
			</div>

			<div class="form-group">
				<label for="inputdefault">Password:</label>
				<input class="form-control" name="up" type="password" required> <br> <br>
			</div>

			<button class="btn btn-info" value="Login" type="submit" name="login">
				Login
				<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
			</button>
		</form>
	</div>


	<script src="bootstrap/js/jquery-1.11.1.min.js"></script>
	<script src="bootstrap/js/dataTables.js"></script>
	<script src="bootstrap/js/dataTables2.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>

</body>

</html>