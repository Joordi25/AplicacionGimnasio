<?php
session_start();


include "config.php";


$username = $_SESSION['username'];

$query = "DELETE FROM users WHERE username = '$username'";

$ok = mysqli_query($link, $query);
if(!$ok)print("Delete: no OK<br>");
else print("Delete: OK<br>");
    header("location: cerrar.php");
?>