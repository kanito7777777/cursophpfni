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
	<div class="container" style="margin-top: 15px">
		<!--  menu -->
		<div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation"><a href="../libros/listarlibro.php">Libros</a></li>
                        <li role="presentation"><a href="../libros/aportar.php">Aportar</a></li>
                        <li role="presentation" class="active"><a href="perfil.php">Mi Perfil (<?php  echo $_SESSION['user']->Cuenta ?>)</a></li>
                        
                        <?php if($_SESSION['user']->Cuenta == 'admin'): ?>
                        <li role="presentation"><a href="../usuarios/listarusuario.php">Usuarios</a></li>
                        <?php endif; ?>
                        
                        <li role="presentation"><a href="../">Salir</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted"><span class="glyphicon glyphicon-bookmark"></span> Libros </h3>
        </div>

		<!-- tabla -->
		<table  class="table table-bordered table-responsive table-striped" id="tListaLibros">
            <thead>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                    <tr>
                        <td>Cuenta</td>
                        <td><?php echo htmlentities($_SESSION['user']->Cuenta);  ?></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo htmlentities($_SESSION['user']->Nombre);  ?></td>
                    </tr>
                    <tr>
                        <td>Celular</td>
                        <td><?php echo htmlentities(    $_SESSION['user']->Celular);  ?></td>
                    </tr>
              <p align="right"><a class="btn btn-success" href="../libros/listarlibro.php">volver</a></p>
            </tbody>
        </table>
        
    </div>
  	<footer class="footer">
    	<p>&copy; somosDAS</p>
  	</footer>
</body>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
</html>