<?php 
	include("rutas.php");

	$obj = new UsuarioController();
	$obj->Cuenta = $_POST['txtCuenta'];
	$obj->Password = $_POST['txtPassword'];
	$obj->Nombre = $_POST['txtNombre'];
	$obj->Celular = $_POST['txtCelular'];

	if($obj->Insertar()){
		echo "<script>alert('Usuario Registrado Correctamente');</script>";
		echo "<script>window.location.href = '../index.html';</script>";
	}
	else{
        echo "<script>alert('Error!!!')</script>";
        echo "<script>window.location.href = '../nuevousuario.html';</script>";
    }
 ?>