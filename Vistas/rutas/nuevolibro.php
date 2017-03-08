<?php
	session_start(); 
	include('../rutas/rutas.php');

	$obj = new LibroController();

	//subiendo archivos al servidor
	$nombrePortada = basename($_FILES['txtPortada']['name']);
	$dirPortada = $_FILES['txtPortada']['tmp_name'];

	if (!move_uploaded_file($dirPortada, '../images/'.$nombrePortada))
	{
		echo "<script>alert('Error al subir portada')</script>";
		echo "<script>window.location.href = '../libros/aportar.php'</script>";
	}		

	$obj->Titulo = $_POST['txtTitulo'];
	$obj->Autor = $_POST['txtAutor'];
	$obj->Url = $_POST['txtUrl'];
	$obj->Portada = '../images/'.$nombrePortada;
	$obj->FkCuenta = $_SESSION['user']->Cuenta; //pendiente

	if ($obj->Insertar()) {
		echo "<script>window.location.href='../libros/listarlibro.php'</script>";
	}
	else{
		echo "<script>alert('Error al registrar libro')</script>";
		echo "<script>window.location.href = '../libros/aportar.php'</script>";
	}
?>