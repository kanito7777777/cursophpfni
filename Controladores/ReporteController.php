<?php

class ReporteController
{
	public function Listar()
	{
		$sql = "select * from vwlibrousuario";
		
		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);
		return $res;
	}

	public function Estadistico()
	{
		$sql = "call sprestadistico()";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);
		return $res;
	}
}


//$obj = new UsuarioController();
//$obj->Autenticar('admin','12345');