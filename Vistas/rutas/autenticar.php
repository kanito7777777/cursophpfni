<?php 

include('rutas.php');

$user = $_POST['txtCuenta'];  //'admin';  
$pass = $_POST['txtPassword']; //'12345';

$obj = new UsuarioController();
$obj->Autenticar($user, $pass);