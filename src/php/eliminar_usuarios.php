<?php

require "config.php";

$id = $_GET['id'];

echo $id;


$eliminar = "DELETE FROM users WHERE id = '$id'";


$resultadoEliminar = mysqli_query($link, $eliminar);

if ($resultadoEliminar){
    header("location: usuarios.php");
}else{
    echo ("no ok");

}

?>
