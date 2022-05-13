<?php
	session_start();
	unset($_SESSION['cart']);
	$_SESSION['message'] = 'Carrido vaciado correctamente';
	header('location: inicio.php');
?>