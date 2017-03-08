<?php
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:../');

    include("../rutas/rutas.php");
    //recuperando parametro de la url
    $id = $_GET['id'];

    $obj = new LibroController();
    $datos = $obj->BuscarPorPK($id);
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
                        <li role="presentation" class="active"><a href="listarlibro.php">Libros</a></li>
                        <li role="presentation"><a href="aportar.php">Aportar</a></li>
                        <li role="presentation"><a href="../usuarios/perfil.php">Mi Perfil</a></li>
                        
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
                <?php while($f = $datos->fetch_object()):  ?>
                    <tr>
                        <td>Titulo</td>
                        <td><?php echo htmlentities($f->Titulo);  ?></td>
                    </tr>
                    <tr>
                        <td>Autor</td>
                        <td><?php echo htmlentities($f->Autor);  ?></td>
                    </tr>
                    <tr>
                        <td>Descargar</td>
                        <td><a target="_new" href="<?php echo htmlentities($f->Url);  ?>" >Descargar</a> </td>
                    </tr>
                    <tr>
                        <td>Portada</td>
                        <td><img class="img-thumbnail" width="200px" src="<?php echo htmlentities($f->Portada);?>" /></td>
                    </tr>
              <?php endwhile; ?>  
              <p align="right"><a class="btn btn-success" href="listarlibro.php">volver</a></p>
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