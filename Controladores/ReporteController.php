<?php

class ReporteController
{
	private function MyQuery($sql)
	{
		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);
		return $res;
	}

	public function Listar()
	{
		$sql = "SELECT * FROM vwlibrousuario";
		return $this->MyQuery($sql);
	}

	public function Estadistico()
	{
		$sql = "call sprestadistico()";
		return $this->MyQuery($sql);
	}
}


//$obj = new UsuarioController();
//$obj->Autenticar('admin','12345');