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
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <title>Perfil</title>
</head>

<body>

    <form action="procesar_perfil.php" method="POST" enctype="multipart/form-data">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                <div class="mt-5 text-center"><a class="btn btn-primary profile-button" href="perfil.php">Cancelar</a></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Editar Perfil</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nombre</label><input type="text" value="<?php echo $nombre; ?>" class="form-control" placeholder="nombre" name="nombre"></div>
                            <div class="col-md-6"><label class="labels">Apellidos</label><input type="text" value="<?php echo $apellidos; ?>" class="form-control" name="apellidos" placeholder="apellidos"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Numero de Telefono</label><input type="text" maxlength="9" value="<?php echo $num; ?>" class="form-control" placeholder="Numero tlf" name="num_tlf"></div> <br>
                            <div class="col-md-12"><label class="labels">Dirección</label><input type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="dirección" name="direccion"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Pais</label><input type="text" class="form-control" value="<?php echo $pais; ?>" placeholder="Pais" name="pais"></div>
                        </div> <br> <br>
                        <input type="file" name="img" accept="image/png, image/jpeg">
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Guardar Perfil</button></div>
                        <div class="mt-5 text-center"><a class="btn btn-primary profile-button" href="reset-password.php">Cambiar Contraseña</a></div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="p-3 py-5">
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>