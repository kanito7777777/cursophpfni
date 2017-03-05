<?php

class LibroController extends Libro
{
	public function Insertar()
	{
		$sql = "INSERT INTO `libro` 
				VALUES (null, '$this->Titulo', '$this->Autor', '$this->Url', '$this->Portada', '$this->FkCuenta')";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		return $res;
	}

	public function Modificar($id)
	{
		$sql = "UPDATE `usuario` 
				SET `Titulo`='$this->Titulo', `Autor`='$this->Autor', `Url`='$this->Url', `Portada`='$this->Portada', `FkCuenta`='$this->FkCuenta'  
				WHERE (`Id`='$id')";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		return $res;
	}

	public function Eliminar($id)
	{
		$sql = "DELETE FROM libro WHERE Id = '$id'";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		return $res;
	}

	public function Listar()
	{
		$sql = "SELECT * FROM libro";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		return $res;
	}

	public function BuscarPor($id)
	{
		$sql = "SELECT * FROM libro WHERE Id = '$id'";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		return $res;
	}
}