<?php
include('../../include/vars.php');
header("Content-Type: text/html; charset=".$charset);
set_include_path(get_include_path() .PATH_SEPARATOR .$PathApp);
session_name($session_name);
session_start ();
include('../../herramientas/adodb5/adodb.inc.php');
//************INICIO CONEXION BASE DE DATOS**********//
$conex=NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!$conex){
	echo "<script>Error...Al Conectar></script>";
	die($err_conn_db);
	exit;
}
//guardar en la base de datos el registro de usuario//
$var_option = $_POST[option];
	switch ($var_option)
	{
		case 'guardar':
			$query="
				SELECT nombre_unidad
				FROM $db.unidad
				where nombre_unidad ='".$POST['nombre_unidad']."';";
			$result= $conex->Execute($query);
			if ($result->fields['nombre_unidad']>0)
				{
					echo "<script>alert('la unidad ya existe.');</scrip>";
				}
			else
				{
					$query="insert into unidad (nombre_unidad, nombre_area)
					values('".$_POST[nombre_unidad]."', '".$_POST[nombre_area]."');
					";
					if($conex->Execute($query))
						{
							echo "<script>alert('REGISTRO GUARDADO CON EXITO..!');</script>";
							echo "<script>parent.limpiar();</script>";
						}
					else	
						{
							echo "<script>alert('ERROR AL GUARDAR..!');</script>";															
						}		
				}
		break;				

	}
$conex->close();
?>