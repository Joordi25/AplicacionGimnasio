<?php
session_start();


include "config.php";


$username = $_SESSION['username'];

$query = "DELETE FROM users WHERE username = '$username'";
$query2 = "DELETE FROM tourist WHERE tour_un = '$username'";

$ok = mysqli_query($link, $query);
$ok2 = mysqli_query($link, $query2);
if(!$ok)print("Delete: no OK<br>");
else print("Delete: OK<br>");
    header("location: cerrar.php");
?>