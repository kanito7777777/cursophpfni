<?php

class LibroController
{
	private function MyQuery($sql)
	{
		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);
		return $res;
	}

	public function Insertar($reg) 
	{
		$sql = "INSERT INTO `libro` 
		VALUES (null, '$reg->Titulo', 
				'$reg->Autor', '$reg->Url', 
				'$reg->Portada', '$reg->FkCuenta')";

		return $this->MyQuery($sql);
	}

	public function Modificar($reg, $id)
	{
		$sql = "UPDATE libro 
		SET Titulo = '$reg->Titulo', 
		Autor = '$reg->Autor', Url = '$reg->Url',
		Portada = '$reg->Portada', FkCuenta = '$reg->FkCuenta' 
		where Id = '$id'";

		return $this->MyQuery($sql);
	}

	public function Eliminar($id)
	{
		$sql = "DELETE FROM libro WHERE Id = '$id'";

		return $this->MyQuery($sql);
	}

	public function Listar()
	{
		$sql = "SELECT * FROM libro";
		
		return $this->MyQuery($sql);
	}

	private function Filtrar($dato)
	{
		//limpiando espacios
		$dato = trim($dato);

		//filtrando entradas
		$con = Conexion::Conectar();
		$dato = $con->real_escape_string($dato);
		Conexion::Desconectar($con);

		return $dato;
	}

	public function BuscarPorPK($id)
	{
		$id = $this->Filtrar($id);

		$sql = "SELECT * FROM libro WHERE Id = '$id'";

		return $this->MyQuery($sql);
	}
}


//$obj = new UsuarioController();
//$obj->Autenticar('admin','12345');