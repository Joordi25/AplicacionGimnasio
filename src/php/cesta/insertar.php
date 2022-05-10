<?php

require_once "../config.php";

$name = $_POST["name"];
$price = $_POST["price"];
$nombre_temporal = $_FILES['img']['tmp_name'];
$nombre_original = $_FILES['img']['name'];
$carpeta = 'productos';

/**
     * Guarda la foto en disco en la carpeta indicada. 
     * El nombre del archivo será aleatorio (md5) y mantendrá la extensión original
     * @param type $nombre_temporal Nombre temporal del archivo
     * @param type $nombre_original Nombre original del archivo
     * @param string $carpeta Nombre de la carpeta donde se guardará la foto
     * @return mixed Devuelve el nombre de archivo con el que se ha guardado en disco
     */

        //Cogemos la extensión del archivo para guardarlo con la misma extensión
        $info_foto = pathinfo($nombre_original);
        //Creamos un md5 para el nombre del archivo y comprobamos que no existe ya
        $nombre_archivo = md5(time() + rand(0, 9999));

        while (file_exists("$carpeta/$nombre_archivo.$info_foto[extension]")) {
            $nombre_archivo = md5(time() + rand(0, 9999));
        }

        $nombre_archivo_con_ext = "$nombre_archivo.$info_foto[extension]";
        move_uploaded_file($nombre_temporal, "$carpeta/$nombre_archivo_con_ext");


$insertar= "INSERT INTO products(name, price, photo) VALUES ('$name', '$price', '$carpeta/$nombre_archivo_con_ext')";

$resultado = mysqli_query($link, $insertar);

if($resultado){
    header("location: inicio_admin.php");
}else{
    echo "no ok";
}

?>