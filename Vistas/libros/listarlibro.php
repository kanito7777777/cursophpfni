<?php
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:../');

    include("../rutas/rutas.php");

    $obj = new LibroController();
    $datos = $obj->Listar();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Biblioteca Virtual</title>
		<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript">
        function abrirVentana(url)
        {
            window.open(url,"Reportes", "width=900, height=450, left=200, top=150");
        }
    </script>

</head>
<body>
	<div class="container" style="margin-top: 15px">
		<!--  menu -->
		<div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation" class="active"><a href="listarlibro.php">Libros</a></li>
                        <li role="presentation"><a href="aportar.php">Aportar</a></li>
                        <li role="presentation"><a href="../usuarios/perfil.php">Mi Perfil (<?php  echo $_SESSION['user']->Cuenta ?>) </a></li>
                        
                        <?php if($_SESSION['user']->Cuenta == 'admin'): ?>
                        <li role="presentation"><a href="../usuarios/listarusuario.php">Usuarios</a></li>
                        <?php endif; ?>

                        <li role="presentation"><a href="../">Salir</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted"><span class="glyphicon glyphicon-bookmark"></span> Libros </h3>
        </div>

        <p>
            <a href="javascript:abrirVentana('../reportes/reportelistado.php')" >Lista de Aportes</a> ||            
            <a href="javascript:abrirVentana('../reportes/reporteestadistico.php')" >Reporte Estadistico</a>
        </p>
		<!-- tabla -->
		<table  class="table table-bordered table-responsive table-striped" id="tListaLibros">
            <thead>
                <th>Codigo</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Descripción</th>
                <th>Portada</th>
                <th></th>
            </thead>
            <tbody>
                <?php while($f = $datos->fetch_object()):  ?>
                    <tr>
                        <td><?php echo htmlentities($f->Id);  ?></td>
                        <td><?php echo htmlentities($f->Titulo);  ?></td>
                        <td><?php echo htmlentities($f->Autor);  ?></td>
                        <td><?php echo htmlentities($f->Url);  ?></td>
                        <td><?php echo htmlentities($f->Portada);  ?></td>
                        <td>
                        <a href="descargalibro.php?id=<?php echo $f->Id; ?>">Descargar</a>
                        
                        <?php if($_SESSION['user']->Cuenta == 'admin'): ?>
                            <a onclick="return confirm('Seguro que quiere eliminar?')" class="btn btn-danger" href="../rutas/eliminarlibro.php?id=<?php echo $f->Id;?>">Eliminar</a>
                        <?php endif; ?>

                        </td>
                    </tr>
              <?php endwhile; ?>  
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