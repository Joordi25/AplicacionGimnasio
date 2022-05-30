<?php
include('config.php');

$Correo = $_POST['txtcorreo'];

$queryusuario = mysqli_query($link,"SELECT * FROM users WHERE Correo = '$Correo'");
$nr = mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$mostrar = mysqli_fetch_array($queryusuario); 
$enviarpass = $mostrar['password'];

$paracorreo = $Correo;
$titulo = "Recuperar contraseña";
$mensaje = $enviarpass;
$tucorreo = "sergicastillom7@hotmail.com";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
	echo "<script> alert('Contraseña enviado');window.location= '../../Views/LoginView.php' </script>";
}else
{
	echo "<script> alert('Error');window.location= '../../Views/OlvidarView.php' </script>";
}
}
else
{
	echo "<script> alert('Este correo no existe');window.location= '../../Views/OlvidarView.php' </script>";
}
/*VaidrollTeam*/
?>