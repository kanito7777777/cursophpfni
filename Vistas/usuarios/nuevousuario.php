<?php  
	include('../rutas/rutas.php');

	$obj = new UsuarioController();	
	$reg = new Usuario();

	$reg->Cuenta = $_POST['txtCuenta'];
	$reg->Password = $_POST['txtPassword'];
	$reg->Nombre = $_POST['txtNombre'];
	$reg->Celular = $_POST['txtCelular'];

	if ($obj->Insertar($reg)) {
		echo "<script>window.location.href='../'</script>";
	}
	else{
		echo "<script>alert('Error al registrar usuario')</script>";
		echo "<script>window.location.href = '../usuarios/create.html'</script>";
	}
?>