<?php 
  //matando sesiones
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Biblioteca Virtual</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
	 
      <form class="form-signin" action="rutas/autenticar.php" method="POST">
        <h2 class="form-signin-heading" align="center">Biblioteca Virtual</h2>
        <hr/>
		
		    <label for="txtCuenta" class="sr-only">Email</label>
        <input type="text" id="txtCuenta" name="txtCuenta" class="form-control" placeholder="Ingrese Cuenta" required autofocus>
        
		    <label for="txtPassword" class="sr-only">Password</label>
        <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Ingrese Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnAceptar">Ingresar al Sistema</button>
		
		<div id="res"></div>
		
      </form>
		<p align="center"><a href="usuarios/nuevousuario.html">(Si no tiene cuenta puede registrase aqui)</a></p>
    </div> <!-- /container -->

    <script src="js/bootstrap.js"></script>
	<script src="js/jquery.js"></script>
  </body>
</html>
