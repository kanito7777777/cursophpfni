<?php 
	include('../Modelos/Conexion.php');
	include('../Modelos/Libro.php');
	include("../Controladores/LibroController.php");

	$obj = new LibroController();
	$datos = $obj->Listar();

	/*while($f = $datos->fetch_object())
	{
		echo $f->Titulo;
		echo "<br/>";
	}*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Biblioteca Virtual</title>
		<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container" style="margin-top: 15px">
		<div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation" class="active"><a href="libros.php">Libros</a></li>
                        <li role="presentation"><a href="aportar.php">Aportar</a></li>
                        <li role="presentation"><a href="perfil.php?id=<?php echo $_SESSION['IdUsuario']; ?>">Mi Perfil</a></li>
                        <li role="presentation"><a href="index.php">Salir</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted"><span class="glyphicon glyphicon-bookmark"></span> Libros </h3>
        </div>

		<table  class="table table-bordered table-responsive table-striped" id="tListaLibros">
            <thead>
                <th>Codigo</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Descripción</th>
                <th></th>
            </thead>
            <tbody>
                <?php while($f = mysql_fetch_array($result)): ?>
                <tr>
                    <td><?php echo utf8_encode($f['IdLibro']); ?></td>
                    <td><?php echo htmlentities(utf8_encode($f['Titulo'])); ?></td>
                    <td><?php echo htmlentities(utf8_encode($f['Autor'])); ?></td>
                    <!--Seguridad: Escapando las salidas para evitar SQL inyecciones XSS-->
                    <td><?php echo utf8_encode($f['Descripcion']); ?></td>
                    <td><a href="detalleLibro.php?idLibro=<?php echo $f['IdLibro']; ?>">descargar</a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
    </div>
  	<footer class="footer">
    	<p>&copy; Ing. Saul Mamani M.</p>
  	</footer>
</body>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
</html>