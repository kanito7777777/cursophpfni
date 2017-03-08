<?php
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:../');

    include("../rutas/rutas.php");

    $obj = new ReporteController();
    $datos = $obj->Listar();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Biblioteca Virtual</title>
		<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	
	<style type="text/css" media="print">
		a{
			display: none;
		}
	</style>

</head>
<body>
	<div class="container" style="margin-top: 15px">
		
		<p>
			<a href="javascript:window.print()">Imprimir</a>
		</p>

		<!-- tabla -->
		<table  class="table table-bordered table-responsive table-striped" id="tListaLibros">
		<caption><center><h3>Listado de Aportes</h3></center></caption>
            <thead>
                <th>Codigo</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Url</th>
                <th>Aportado Por</th>
            </thead>
            <tbody>
                <?php while($f = $datos->fetch_object()):  ?>
                    <tr>
                        <td><?php echo htmlentities($f->Id);  ?></td>
                        <td><?php echo htmlentities($f->Titulo);  ?></td>
                        <td><?php echo htmlentities($f->Autor);  ?></td>
                        <td><?php echo htmlentities($f->Url);  ?></td>
                        <td><?php echo htmlentities($f->Nombre);  ?></td>
                        
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