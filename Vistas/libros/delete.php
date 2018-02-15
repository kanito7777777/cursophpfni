<?php 
	include('../rutas/rutas.php');

	$id = $_GET['id'];

	$obj = new LibroController();

	$obj->Eliminar($id);

	header('Location:../libros/');
?>