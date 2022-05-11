<?php
session_start();

require "config.php";

$user =  !empty($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'registrate';

$usuarios = "SELECT * FROM users WHERE username = '$user' ";
$result = mysqli_query($link, $usuarios);
$row = mysqli_fetch_assoc($result);
$imagen = "../images/perfil/perfil_defecto.jpg";


$sql = "UPDATE users SET foto = '$imagen' WHERE username = '$user'";




$result = mysqli_query($link, $sql);



if ($result){
    header("location: perfil.php");
}else{
    echo ("no ok");

}


?>