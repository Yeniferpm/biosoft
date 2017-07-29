<?php
	include_once('vars.php');
	include_once('ctrl_acceso.php');
	@session_name($session_name);
	@session_start();
	if (!$conex)
		{
			echo '<script>Error...Al Conectar</script>';
			die($err_conn_db);
			exit;
		}
	else
		{	
			$query="select 	opcion, carpeta, lenguaje 
					from 	$db.lenguaje 
					where 	opcion = '1' ";
			$result = $conex->Execute($query);
			if ($result->fields['opcion']>0)
				{ 
					$_SESSION['nombre_carpeta'] = $result->fields['carpeta']; 
				}
			else 
				{
					echo "<script>alert('ERROR....! NO EXISTE LEGUAJE SELECCIONADO....!');</script>";
					echo "<script>alert('EL PROGRAMA SE DETENDRA... CONSULTE EL PROVEEDOR DEL PROGRAMA');</script>";
					exit;
				}
		}		
?>