<?php 

include('rutas.php');

$user = $_POST['txtCuenta'];  //'admin';  
$pass = $_POST['txtPassword']; //'12345';

$obj = new UsuarioController();

if($obj->Autenticar($user, $pass) == "ok")
    echo "<script>window.location.href = '../libros/';</script>";

else
{
    echo "<script>alert('Usuario no encontrado');</script>";
    echo "<script>window.location.href = '../';</script>";
}