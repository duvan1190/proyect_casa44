<?php
define("CONN_ERROR","Error connecting DB");
define("NO_DATA",0);
define("BAD_QUERY",1);
define("INSERT_OK",2);
define("DELETE_OK",3);
define("UPDATE_OK",4);
define("QUERY_OK",5);
define("SELECT_QUERY",1);
define("INSERT_QUERY",2);
define("DELETE_QUERY",3);
define("UPDATE_QUERY",4);

class Database
{
	var $conn;
	var $user;
	var	$pwd;
	var $db;
	var $results;
	var $rows;
	var $messages;
	var $path;
	var $host;

	function Database()
	{
		$this->conn = null;
		$this->results = null;
		$this->db = /*conexion pruebas */"system_proyect"; /* conexion local "rsa_db"*/;
		$this->user = "root";
		$this->pwd = /*conexion pruebas */"root";/* conexion local ""*/;
		$this->host = "localhost";
		$this->path = /*conexion pruebas */"http://localhost/music-monisoft/"; /* conexion local "http://localhost/rsa_nuevo/"*/;
		$this->rows = 0;
		$this->messages = array("Error en la conexion","No se pudo realizar la operaci&oacute;n, comun&iacute;quese con el administrador");
		$this->connect();

		// $this->conn = null;
		// $this->results = null;
		// $this->db = "usraidadirect_serena";
		// $this->user = "usrSerena";
		// $this->pwd = "xqK6e5?0";
		// $this->host = "168.144.27.200";
		// $this->path = "http://beparking.com/";
		// $this->rows = 0;
		// $this->messages = array("Error en la conexion","No se pudo realizar la operaci&oacute;n, comun&iacute;quese con el administrador");
		// $this->connect();
	}

	function connect()
	{
		$this->conn = mysqli_connect($this->host,$this->user,$this->pwd);
		if (!$this->conn)
		{
			die($this->messages[CONN_ERROR]);
			return false;
		}
		mysqli_select_db($this->conn, $this->db);
		return $this->conn;
	}

	function link(){
		return $this->conn;
	}

	function doQuery($query,$type)
	{
		$this->results=null;
		mysqli_query($this->conn, "SET NAMES utf8");
		if (!$execute = mysqli_query($this->conn, $query))
		{
			return mysqli_errno($this->conn);
		}
		else
		{
			switch($type)
			{
				case SELECT_QUERY:
					$this->rows = mysqli_num_rows($execute);
					$i = 0;
					while ($i < $this->rows)
					{
						$this->results[$i] = mysqli_fetch_assoc($execute);
						$i++;
					}
				return true;
				break;
				case INSERT_QUERY:
					  return 'ok';
				break;
				case UPDATE_QUERY:
					 return 'ok';
				break;
				case DELETE_QUERY:
					 return 'ok';
				break;
			}
		}
	}
	function doQueryPaginator($execute){
		$this->results = null;
		mysqli_query($this->conn, "SET NAMES utf8");
		if($execute)
		{
			$this->rows = mysqli_num_rows($execute);
			$i = 0;
			while ($i < $this->rows)
			{
				$this->results[$i] = mysqli_fetch_assoc($execute);
				$i++;
			}
		}
	}

	function getNumResults()
	{
		return $this->rows;
	}

	function getResults()
	{
		return $this->results;
	}

	function getLastId()
	{
		return mysqli_insert_id($this->conn);
	}

	function disconnect()
	{
		if($this->conn)
		mysqli_close($this->conn);
	}

/**
 * Guarda un registro en la tabla de logs de usuario para llevar un control de lo que el usuario hace en la aplicaci�n
 * @author Carlos Gamboa
 * @param int $userId id del usuario que realiz� la acci�n
 * @param int $action id de la acci+�n que realiz� el usuario
 * @param stying $detail detalle de lo que realiz� exactamente el usuario
 */
	public function saveUserlog($userId,$action,  $detail)
	{
		$query = "INSERT INTO user_log (fk_usuario_id, fk_accion_id, detalle, insert_date) VALUES ($userId, $action, '$detail', NOW())";
		$this->doQuery($query, INSERT_QUERY);
	}

}
?>
