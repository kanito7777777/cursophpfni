<?php 
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:../');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Biblioteca Virtual</title>
	
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	 
      <form class="form-signin" action="../rutas/nuevolibro.php" method="POST" enctype="multipart/form-data">
        <h2 class="form-signin-heading" align="center">Aportar Libro</h2>
        <hr/>

			<label for="txtTitulo">Titulo:<br></label><input type="text" class="form-control" name="txtTitulo" value="" required /><br/>
            <label for="txtAutor">Autor:<br></label><input type="text" class="form-control" name="txtAutor" value="" required /><br/>
            <label for="txtUrl">Url:<br></label><input type="url" class="form-control" name="txtUrl" value="http://" required /><br/>
            <label for="txtPortada">Portada:<br></label><input type="file" name="txtPortada" value="" required /><br/>
            
            <button type="submit" name="btnAceptar" class="btn btn-lg btn-success" >Aceptar</button>
            <a href="listarlibro.php">(Cancelar)</a>

      </form>
    </div>
</body>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
</html>