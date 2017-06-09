<?php 
	class tools  
	{
			var $db;
			function  __construct($db)
			{
				$this->db = $db;
			}
			public function guardar($tabla, $datos, $files='')
			{
					if(!empty($files["imagen_file"]['name'])){
						if (($files["imagen_file"] == "image/jpg") || ($files["imagen_file"]["type"] == "image/jpeg")){
								$prefijo = substr(md5(uniqid(rand())),0,6);
								$archivo = $prefijo."_".$files["imagen_file"]['name'];
								$destino =  $_SERVER['DOCUMENT_ROOT'].'/music-monisoft/images';;
								@copy($files['imagen_file']['tmp_name'],$destino);
								$datos[imagen_file] = $archivo;
						}else{
							echo "No se puede subir una imagen con ese formato ";
						}
				}
				foreach ($datos as $indice => $valor)
				{
					$pos = strpos($indice, "boton");
					if($pos === false)
					{
						if($indice != "zone"){
						$cols[] = $indice;
							if(!is_array($valor))
							{
								$valor = trim($valor);
								$valores[] =  $valor;
							}else{
								$valores[] = implode(',',$valor);
							}
						}
					}
				}
				$ncols = implode(",",$cols);
				$ncols .= ",fecha_registro";
				$nvalores = "'";
				if(!empty($id_session)){
					$valores[1]=$id_session;
				} else {
				}
				$nvalores .= implode("','",$valores);
				$nvalores .= "', NOW()";
			  $sql = "INSERT INTO ".$tabla. "(".$ncols.") VALUES(".$nvalores.")";
				$consulta = $this->db->doQuery($sql, INSERT_QUERY);			
				return $consulta;
			}
		public function actualizar($tabla, $key, $datos, $files=''){
			$q=" ";
			$c="";
			$i=0;
			$indice =  @key($files);
			foreach ($datos as $indice => $valor)
			{
				$pos = strpos($indice, "boton");
				if($pos === false){
					if($indice == $key){
					$c .= " WHERE $indice = '$valor'";
					}else{
						$valor =  htmlentities($valor, ENT_QUOTES);
						$q .= "$indice = '$valor', ";

					}
				}
			}
			$q .= "fecha_registro = NOW() ";
			$c .= " WHERE id = '$key'";
			$sql = "UPDATE ".$tabla. " SET ".$q. " ".$c;
			$consulta = $this->db->doQuery($sql, UPDATE_QUERY);
			return $consulta;
		}
		public function delete($table, $row){
			$query = "DELETE FROM $table WHERE id = '$row'";
			$res = $this->db->doQuery($query, DELETE_QUERY);
			return $res;
		}
		public function loginAdmin($usuario,$contrasena){
		  $query = "SELECT *FROM administrador
		            WHERE usuario = '".$usuario."'
		            AND contrasena = $contrasena
		            AND estado = '1' ";
		  $this->db->doQuery($query, SELECT_QUERY);
		  $regs = $this->db->results;
		  if(!empty($regs)){
		    //register session vars
		    $_SESSION['id'] = $regs[0]['id'];                
		    $_SESSION['name'] = $regs[0]['nombre'];
		    return 'true';
		  }else{
		    return 'false';
		  }
	  }
	  public function cerrar()
		{
			session_destroy();
			return "true";
		}
		public function form_create($formtype)	{
		  foreach($formtype as $form) {
				$html.='<input type="'.$form['type'].'" class="'.$form['class'].'" name="'.$form['title'].'" value="'.$form['value'].'">';
				$html.='<br>';
	 		}
	 		return $html;
		}				
	}// final de la clase tools
?>