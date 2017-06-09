<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/media.css" rel="stylesheet">
  </head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4>Bienvenido</h4>
            <form name="formulario" method="post" action="valid.php">
            <input type="text" id="user" name="user" class="form-control input-sm chat-input" placeholder="Usuario" required />
            </br>
            <input type="password" id="pass" name="pass" class="form-control input-sm chat-input" placeholder="Contraseña" required/>
            </br>
            <div class="wrapper"> 
            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-md">Ingresar <i class="fa fa-sign-in"></i></button>   
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
<?php require 'function/footer.php';
?>