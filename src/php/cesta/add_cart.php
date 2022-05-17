<?php
	session_start();

	//check if product is already in the cart
	if(!in_array($_GET['id'], $_SESSION['cart'])){
		array_push($_SESSION['cart'], $_GET['id']);
		$_SESSION['message'] = 'Producto añadido a la cesta';
	}
	else{
		$_SESSION['message'] = 'Producto ya añadido a la cesta';
	}

	header('location: inicio.php');
?>