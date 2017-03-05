<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

class Conexion
{
	public static function Conectar()
	{
		$server = "127.0.0.1";
		$user = "root";
		$pass = "";
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