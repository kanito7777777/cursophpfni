<?php
session_start();

class UsuarioController
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
		$sql = "INSERT INTO `usuario` VALUES ('$reg->Cuenta', sha1('$reg->Password'), '$reg->Nombre', '$reg->Celular')";

		return $this->MyQuery($sql);
	}

	public function Modificar($reg, $id)
	{
		$sql = "UPDATE usuario SET `Password` = sha1('$reg->Password'), 
		Nombre = '$reg->Nombre', Celular = '$reg->Celular' where Cuenta = '$id'";

		return $this->MyQuery($sql);
	}

	public function Eliminar($id)
	{
		$sql = "DELETE FROM usuario WHERE Cuenta = '$id'";

		return $this->MyQuery($sql);
	}

	public function Listar()
	{
		$sql = "SELECT * FROM usuario";
		
		return $this->MyQuery($sql);
	}

	public function BuscarPorPK($id)
	{
		$sql = "SELECT * FROM usuario WHERE Cuenta = '$id'";

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

	public function Autenticar($user, $pass)
	{

		$user = $this->Filtrar($user);
		$pas = $this->Filtrar($pass);	

		$sql = "select * from usuario where Cuenta = '$user' and Password = sha1('$pass')";

		$res = $this->MyQuery($sql);

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