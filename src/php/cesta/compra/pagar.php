<?php 
//require "../view_cart.php";
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Forma de pago</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><link rel="stylesheet" href="./style.css">
  <link rel="icon" href="\AplicacionGimnasio\images\icon.png">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="background-image: url('../../../images/pago.jpg'); background-size: cover; background-attachment: fixed;">

<div class="container" style="margin-right: 2%;">
  <div class="col1">
    <div class="card">
      <div class="front">
        <div class="type">
          <img class="bankid"/>
        </div>
        <span class="chip"></span>
        <span class="card_number">&#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; </span>
        <div class="date"><span class="date_value">MM / YYYY</span></div>
        <span class="fullname">FULL NAME</span>
      </div>
      <div class="back">
        <div class="magnetic"></div>
        <div class="bar"></div>
        <span class="seccode">&#x25CF;&#x25CF;&#x25CF;</span>
        <span class="chip"></span><span class="disclaimer">This card is property of Random Bank of Random corporation. <br> If found please return to Random Bank of Random corporation - 21968 Paris, Verdi Street, 34 </span>
      </div>
    </div>
  </div>
  <div class="col2">
    <label style="color: white;">Card Number</label>
    <input style="color: white; background-color: rgba(190, 190, 190, 0.466);" class="number" type="text" ng-model="ncard" maxlength="19" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
    <label style="color: white;">Cardholder name</label>
    <input style="color: white; background-color: rgba(190, 190, 190, 0.466);" class="inputname" type="text"/>
    <label style="color: white;">Expiry date</label>
    <input style="color: white; background-color: rgba(190, 190, 190, 0.466);" class="expire" type="text"/>
    <label style="color: white;">Security Number</label>
    <input style="color: white; background-color: rgba(190, 190, 190, 0.466);" class="ccv" type="text" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
    <button style="background-color: yellow; color: black;" class="buy"><i class="material-icons">lock</i> Pay <?php /*echo $total */?> €</button><br>
    <a href="../view_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Cancelar</a>
  </div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script><script  src="./script.js"></script>

</body>
</html
