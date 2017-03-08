<?php  
	include('rutas.php');

	$obj = new UsuarioController();	

	$obj->Cuenta = $_POST['txtCuenta'];
	$obj->Password = $_POST['txtPassword'];
	$obj->Nombre = $_POST['txtNombre'];
	$obj->Celular = $_POST['txtCelular'];

	if ($obj->Insertar()) {
		echo "<script>window.location.href='../'</script>";
	}
	else{
		echo "<script>alert('Error al registrar usuario')</script>";
		echo "<script>window.location.href = '../usuarios/nuevousuario.htmlx'</script>";
	}
?>