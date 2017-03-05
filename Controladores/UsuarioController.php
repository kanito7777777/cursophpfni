<?php

class UsuarioController extends Usuario
{
	public function Insertar()
	{
		$sql = "INSERT INTO `usuario` 
				VALUES ('$this->Cuenta', '$this->Password', '$this->Nombre', '$this->Celular')";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		return $res;
	}

	public function Modificar($id)
	{
		$sql = "UPDATE `usuario` 
				SET `Password`='$this->Password', `Nombre`='$this->Nombre', `Celular`='$this->Celular' 
				WHERE (`Cuenta`='$id')";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		return $res;
	}

	public function Eliminar($id)
	{
		$sql = "DELETE FROM usuario WHERE Cuenta = '$id'";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		return $res;
	}

	public function Listar()
	{
		$sql = "SELECT * FROM usuario";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		return $res;
	}

	public function BuscarPor($id)
	{
		$sql = "SELECT * FROM usuario WHERE Cuenta = '$id'";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		return $res;
	}

	public function Autenticar($user, $pass)
	{
		$sql = "select * from usuario where Cuenta = '$user' and Password = '$pass'";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		if(mysqli_num_rows($res))
			echo "ok";
		else
			echo "error";
	}
}


//$obj = new UsuarioController();
//$obj->Autenticar('admin','12345');