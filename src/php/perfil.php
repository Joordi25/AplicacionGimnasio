<?php
session_start();

require "config.php";



$user =  !empty($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'registrate';



$usuarios = "SELECT * FROM users WHERE username = '$user' ";
$result = mysqli_query($link, $usuarios);
$row = mysqli_fetch_assoc($result);

$nombre = ($row['nombre']);
$apellidos = ($row['apellidos']);
$num = ($row['num_tlf']);
$direccion = ($row['direccion']);
$pais = ($row['pais']);
$imagen = ($row['foto']);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="shortcut icon" href="../../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <title>Perfil</title>
</head>

<body>

        <div class="container rounded mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php print ($imagen);?>"><span class="font-weight-bold"><?php echo "$user" ?></span>
                        <br> <a class="btn btn-danger profile-button" href="delete_image.php">Eliminar foto</a>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Datos de Perfil</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nombre</label><input type="text" class="form-control" placeholder="<?php echo $nombre; ?>" name="nombre" disabled></div>
                            <div class="col-md-6"><label class="labels">Apellidos</label><input type="text" class="form-control" name="apellidos" placeholder="<?php echo $apellidos; ?>" disabled></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12" style="margin-bottom: 15px;"><label class="labels">Numero de Telefono</label><input type="text" class="form-control" placeholder="<?php echo $num; ?>" name="num_tlf" disabled></div>
                            <div class="col-md-12" style="margin-bottom: 15px;"><label class="labels">Dirección</label><input type="text" class="form-control" placeholder="<?php echo $direccion; ?>" name="direccion" disabled></div>
                            <div class="col-md-12" style="margin-bottom: 15px;"><label class="labels">País</label><input type="text" class="form-control" placeholder="<?php echo $pais; ?>" name="pais" disabled></div>
                        </div>
                         <br> <br>
                        <div class="mt-5 text-center"><a class="btn btn-warning profile-button" href="edit_perfil.php">Editar Perfil</a></div>
                        <div class="mt-5 text-center"><a style="color: yellow;" href="../../Views/index.php">Atrás</a></div>
                    </div>
                </div>
                
            </div>
        </div>
</body>

</html>