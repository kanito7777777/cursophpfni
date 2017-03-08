<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

class Conexion
{
	public static function Conectar()
	{
		$server = "localhost";
		$user = "root";
		$pass = "root";
		$database = "bibliotecabd";

		$cadcon = new mysqli($server, $user, $pass);
		$cadcon->select_db($database);
		return $cadcon;
	}

	public static function Desconectar($con)
	{
		mysqli_close($con);
	}
}