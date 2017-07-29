<?php
include('../../include/vars.php');
header("Content-Type: text/html; charset=".$charset);
set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
session_name($session_name);
session_start();
include ('../../herramientas/adodb5/adodb.inc.php');
//******************** Inicio Conexion a la DB ********************
$conex = NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!$conex) {
	echo "<br>Error... Al conectar<br>";
	die($err_conn_db);
	exit;
}

$var_option = $_POST[option];
switch($var_option)
	{  
		case 'guardar':
			$sql="	select 	codigo_regional
					from 	regional
					where 	codigo_regional='".$_POST[codigo_regional]."'; ";
			$result = $conex->Execute($sql);
			if ($result->recordcount() > 0) 
				{
					echo "<script>alert('Codigo Regional ya existe..!');</script>";
				}
			else
				{
					$sql="	select 	nombre_regional
							from 	regional
							where 	nombre_regional='".$_POST[nombre_regional]."'; ";
					$result = $conex->Execute($sql);
					if ($result->recordcount() > 0) 
						{
							echo "<script>alert('Nombre Regional ya existe..!');</script>";															
						}
					else
						{
							$sql="insert into regional (codigo_regional, nombre_regional)
								  values ('".$_POST[codigo_regional]."', '".$_POST[nombre_regional]."')";
							if($conex->Execute($sql))
								{
									echo "<script>alert('REGISTRO GUARDADO CON EXITO..!');</script>";
									echo "<script>parent.limpiar();</script>";
								}
							else	
								{
									echo "<script>alert('ERROR AL GUARDAR..!');</script>";															
								}		
						}						
				}

				
		break;
	}
$conex->close();	
?>