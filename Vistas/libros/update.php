<?php
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:../');

    //recuperando parametro de la url
    $id = $_GET['id'];

    include("../rutas/rutas.php");
    $obj = new LibroController();
    $datos = $obj->BuscarPorPK($id);
?>
