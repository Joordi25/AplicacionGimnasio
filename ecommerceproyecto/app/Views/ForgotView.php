<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $Correo = $_POST['Correo'];

  $to = 'padelangeltomelloso@gmail.com';
  $subject = 'Marriage Proposal';
  $message = 'Hi Jane, will you marry me?'; 


// Sending email
if(mail($to, $subject, $message)){
  echo 'Your mail has been sent successfully.';
} else{
  echo 'Unable to send email. Please try again.';
}


/*if (mail($to_email, $subject, $body)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}*/







/*

  $queryusuario   = mysqli_query($link, "SELECT * FROM users WHERE correo = '$correo'");
  $nr = mysqli_num_rows($queryusuario);
  if ($nr == 1) {
    $mostrar    = mysqli_fetch_array($queryusuario);
    $enviarpass   = $mostrar['password'];

    $paracorreo     = $correo;
    $titulo        = "Recuperar contraseña";
    $mensaje      = $enviarpass;
    $tucorreo      = "From: jordibraso9900@gmail.com";

    if (mail($paracorreo, $titulo, $mensaje, $tucorreo)) {
      echo "<script> alert('Contraseña enviada');window.location= 'index.html' </script>";
    } else {
      echo "<script> alert('Error');window.location= 'index.html' </script>";
    }
  } else {
    echo "<script> alert('Este correo no existe');window.location= 'index.html' </script>";
  }*/
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recuperar Cuenta</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/css.css">
  <link rel="icon" href="images/favicon.png">

</head>

<body>
  <div class="login-page">
    <div class="form">
      <form class="login-form" method="POST" action="">
        <input type="text" name="Correo" class="form-control">
        <button type="submit">Recuperar</button>
        <p class="message">¿No estás registrado? <a href="RegisterView.php">Crea una cuenta</a></p> <br>
        <p><a href="..\Index.php" class="btn btn-primary">Volver al inicio</a></p>
      </form>
    </div>
  </div>
</body>

</html>