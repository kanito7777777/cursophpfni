<?php
	session_start(); 
	include('../rutas/rutas.php');

	$obj = new LibroController();
	$reg = new Libro();

	//subiendo archivos al servidor
	$nombrePortada = basename($_FILES['txtPortada']['name']);
	$dirPortada = $_FILES['txtPortada']['tmp_name'];

	if (!move_uploaded_file($dirPortada, '../images/'.$nombrePortada))
	{
		echo "<script>alert('Error al subir portada')</script>";
		echo "<script>window.location.href = '../libros/aportar.php'</script>";
	}		

	$reg->Titulo = $_POST['txtTitulo'];
	$reg->Autor = $_POST['txtAutor'];
	$reg->Url = $_POST['txtUrl'];
	$reg->Portada = '../images/'.$nombrePortada;
	$reg->FkCuenta = $_SESSION['user']->Cuenta;

	if ($obj->Insertar($reg)) {
		echo "<script>window.location.href='../libros/'</script>";
	}
	else{
		echo "<script>alert('Error al registrar libro')</script>";
		echo "<script>window.location.href = '../libros/create.php'</script>";
	}
?>