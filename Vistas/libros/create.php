<?php 
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:../');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        include("../rutas/rutas.php");
        $obj = new LibroController();
        $f = $obj->BuscarPorPK($id)->fetch_object();
    }
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
	 
    <?php if(!isset($f)): ?> 
        <form class="form-signin" action="nuevolibro.php" method="POST" enctype="multipart/form-data">
    <?php else: ?>
        <form class="form-signin" action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value="<?php echo $f->Id ?>">
    <?php endif; ?>

        <h2 class="form-signin-heading" align="center">Aportar Libro</h2>
        <hr/>
			<label for="txtTitulo">Titulo:<br></label><input type="text" class="form-control" name="txtTitulo" value="<?php if(isset($f)) echo $f->Titulo; ?>" required /><br/>
            <label for="txtAutor">Autor:<br></label><input type="text" class="form-control" name="txtAutor" value="<?php if(isset($f)) echo $f->Autor; ?>" required /><br/>
            <label for="txtUrl">Url:<br></label><input type="url" class="form-control" name="txtUrl" value="<?php if(isset($f)) echo $f->Url; ?>" required /><br/>
            
            <label for="txtPortada">Portada:<br></label><input type="file" name="txtPortada" value="" <?php if(!isset($f)): ?> required <?php endif; ?>  /><br/>
                
            <button type="submit" name="btnAceptar" class="btn btn-lg btn-success" >Aceptar</button>
            <a href="./">(Cancelar)</a>

      </form>
    </div>
</body>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
</html>