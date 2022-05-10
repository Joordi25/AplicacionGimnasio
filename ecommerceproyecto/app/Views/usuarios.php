<?php
session_start();


require_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tabla.css">
    <title>Gestión de Usuarios</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
</head>

<body>
    <button><a href="welcome.php">Atrás</a></button>
    <h2>Gestión de usuarios</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>ID usuario</th>
                    <th>Nombre de usuario</th>
                    <th>Correo</th>
                    <th>Fecha de creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from users";
                $result = mysqli_query($link, $sql);

                while ($mostrar = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $mostrar['id'] ?></td>
                        <td><?php echo $mostrar['username'] ?></td>
                        <td><?php echo $mostrar['Correo'] ?></td>
                        <td><?php echo $mostrar['created_at'] ?></td>
                        <td><a href="eliminar_usuarios.php?id=<?php echo $mostrar["id"]; ?>">Eliminar</a></td>

                    </tr>
                <?php
                }
                ?>
            <tbody>
        </table>
    </div>
</body>

</html>