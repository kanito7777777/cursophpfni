<?php
session_start();

class UsuarioController extends Usuario
{
	public function Insertar() 
	{
		$sql = "INSERT INTO `usuario` VALUES ('$this->Cuenta', sha1('$this->Password'), '$this->Nombre', '$this->Celular')";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);
		return $res;
	}

	public function Modificar($id)
	{
		$sql = "UPDATE usuario SET `Password` = sha1('$this->Password'), 
		Nombre = '$this->Nombre', Celular = '$this->Celular' where Cuenta = '$id'";

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

	public function BuscarPorPK($id)
	{
		$sql = "SELECT * FROM usuario WHERE Cuenta = '$id'";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);
		return $res;
	}

	public function Autenticar($user, $pass)
	{
		$sql = "select * from usuario where Cuenta = '$user' and Password = sha1('$pass')";

		$con = Conexion::Conectar();
		$res = $con->query($sql);
		Conexion::Desconectar($con);

		if(mysqli_num_rows($res))
		{
			//capturando al usuario en una variable de session
			$_SESSION['user'] = $res->fetch_object();

			return "ok";
		}	
		else
		{
			return "error";
		}
	}
}


//$obj = new UsuarioController();
//$obj->Autenticar('admin','12345');