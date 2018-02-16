<?php
    session_start();
    include("../rutas/rutas.php");

    //recuperando parametro de la url
    $id = $_POST['id'];

    $obj = new LibroController();
    $reg = new Libro();

	$nombrePortada = basename($_FILES['txtPortada']['name']);
	if($nombrePortada)
	{
		//subiendo archivos al servidor
		$nombrePortada = basename($_FILES['txtPortada']['name']);
		$dirPortada = $_FILES['txtPortada']['tmp_name'];

		if (!move_uploaded_file($dirPortada, '../images/'.$nombrePortada))
		{
			echo "<script>alert('Error al subir portada')</script>";
			echo "<script>window.location.href = '../libros/create.php?id=$id'</script>";
		}	
	}

	//cargando datos
	$reg->Titulo = $_POST['txtTitulo'];
	$reg->Autor = $_POST['txtAutor'];
	$reg->Url = $_POST['txtUrl'];
	
	if($nombrePortada)
		$reg->Portada = '../images/'.$nombrePortada;
	else
	{
		$reg->Portada = $obj->BuscarPorPK($id)->fetch_object()->Portada;
	}
	$reg->FkCuenta = $_SESSION['user']->Cuenta;


	if ($obj->Modificar($reg, $id)) {
		echo "<script>window.location.href='../libros/'</script>";
	}
	else{
		echo "<script>alert('Error al registrar libro')</script>";
		echo "<script>window.location.href = '../libros/create.php?id=$id'</script>";
	}

?>
