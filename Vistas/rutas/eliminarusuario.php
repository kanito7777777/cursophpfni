<?php 
	include('../rutas/rutas.php');

	$id = $_GET['id'];

	$obj = new UsuarioController();

	$obj->Eliminar($id);

	header('Location:../usuarios/listarusuario.php');
?>