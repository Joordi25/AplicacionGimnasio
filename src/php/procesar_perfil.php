<?php
session_start();

require "config.php";

$user =  !empty($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'registrate';



$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$num_tlf = $_POST['num_tlf'];
$direccion = $_POST['direccion'];
$pais = $_POST['pais'];

$nombre_temporal = $_FILES['img']['tmp_name'];
$nombre_original = $_FILES['img']['name'];
$carpeta = '../images/perfil';



//Cogemos la extensión del archivo para guardarlo con la misma extensión
$info_foto = pathinfo($nombre_original);
//Creamos un md5 para el nombre del archivo y comprobamos que no existe ya
$nombre_archivo = md5(time() + rand(0, 9999));

while (file_exists("$carpeta/$nombre_archivo.$info_foto[extension]")) {
    $nombre_archivo = md5(time() + rand(0, 9999));
}

$nombre_archivo_con_ext = "$nombre_archivo.$info_foto[extension]";
move_uploaded_file($nombre_temporal, "$carpeta/$nombre_archivo_con_ext");

$sql = "UPDATE users SET nombre = '$nombre', apellidos = '$apellidos', direccion = '$direccion', num_tlf = '$num_tlf', pais = '$pais', foto = '$carpeta/$nombre_archivo_con_ext' WHERE username = '$user'";



$result = mysqli_query($link, $sql);




if ($result){
    header("location: perfil.php");
}else{
    echo ("no ok");

}


?>