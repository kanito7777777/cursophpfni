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

        function buscar()
        {
                var tableReg = document.getElementById('grilla');
                var searchText = document.getElementById('txtBuscar').value.toLowerCase();
                var cellsOfRow="";
                var found=false;
                var compareWith="";

                // Recorremos todas las filas con contenido de la tabla
                for (var i = 1; i < tableReg.rows.length; i++)
                {
                        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                        found = false;
                        // Recorremos todas las celdas
                        for (var j = 0; j < cellsOfRow.length && !found; j++)
                        {
                                compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                                // Buscamos el texto en el contenido de la celda
                                if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
                                {
                                        found = true;
                                }
                        }
                        if(found)
                        {
                                tableReg.rows[i].style.display = '';
                        } else {
                                // si no ha encontrado ninguna coincidencia, esconde la
                                // fila de la tabla
                                tableReg.rows[i].style.display = 'none';
                        }
                }
        }
    </script>

</head>
<body>
	<div class="container" style="margin-top: 15px">
		<!--  menu -->
		<div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation" class="active"><a href="./">Libros</a></li>
                        <li role="presentation"><a href="create.php">Aportar</a></li>
                        <li role="presentation"><a href="../usuarios/show.php">Mi Perfil (<?php  echo $_SESSION['user']->Cuenta ?>) </a></li>
                        
                        <?php if($_SESSION['user']->Cuenta == 'admin'): ?>
                        <li role="presentation"><a href="../usuarios/">Usuarios</a></li>
                        <?php endif; ?>

                        <li role="presentation"><a href="../">Salir</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted"><span class="glyphicon glyphicon-bookmark"></span> Libros </h3>
        </div>

        <?php  if($_SESSION['user']->Cuenta == 'admin'): ?>
        <p>
            <a href="javascript:abrirVentana('../reportes/reportelistado.php')" >Lista de Aportes</a> ||            
            <a href="javascript:abrirVentana('../reportes/reporteestadistico.php')" >Reporte Estadistico</a>
        </p>
        <?php endif; ?>

        <p>
            Buscar: <input onkeyup="javascript:buscar()" type="textBuscar" id="txtBuscar" name="txt" style="width:100%" value="">
        </p>

		<!-- tabla -->
		<table  class="table table-bordered table-responsive table-striped" id="grilla">
            <thead>
                <th>Codigo</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Descripción</th>
                <th></th>
            </thead>
            <tbody>
                <?php while($f = $datos->fetch_object()):  ?>
                    <tr>
                        <td><?php echo htmlentities($f->Id);  ?></td>
                        <td><?php echo htmlentities($f->Titulo);  ?></td>
                        <td><?php echo htmlentities($f->Autor);  ?></td>
                        <td><?php echo htmlentities($f->Url);  ?></td>
                        <td>
                        <a href="show.php?id=<?php echo $f->Id; ?>" class="btn btn-info"><span class="glyphicon glyphicon-download"></span> Descargar</a>
                        
                        <?php if($_SESSION['user']->Cuenta == 'admin'): ?>
                            <a class="btn btn-success" href="create.php?id=<?php echo $f->Id;?>"><span class="glyphicon glyphicon-edit"></span> Editar</a>

                            <a onclick="return confirm('Seguro que quiere eliminar?')" class="btn btn-danger" href="delete.php?id=<?php echo $f->Id;?>"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
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