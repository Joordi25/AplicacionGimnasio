<?php
	session_start();
    require_once "../config.php";

	//check if product is already in the cart
	if(!in_array($_GET['id'], $_SESSION['cart'])){
		array_push($_SESSION['cart'], $_GET['id']);
		$id = !empty($_GET['id']) && isset($_GET['id']) ? $_GET['id'] : '';
        $query = "DELETE FROM products where id = ".$id;

        $ok = mysqli_query($link, $query);
        if(!$ok)print("detele no ok");
        else header("location: inicio_admin.php");;
	}
	
?>