<?php 
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:../');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista de Usuarios</title>

<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

</head>
<body>
	<?php 
		include('../rutas/rutas.php');

		$obj = new UsuarioController();
		$datos = $obj->Listar();

		while($f = $datos->fetch_object())
		{
			echo $f->Cuenta;
			echo "<br/>";
            
			echo $f->Nombre;            
			echo "<br/>";
		}
	?>

</body>
</html>