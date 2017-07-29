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
$var_option = $_POST[option];
	switch ($var_option)
	{
		case 'guardar':
			$query="
				SELECT nombre_rol
				FROM $db.rol 
				where nombre_rol ='".$_POST['nombre_rol']."';";

			$result= $conex->Execute($query);
			if ($result->fields['nombre_rol']>'')
				{
					echo "<script>parent.escribir_div_msj('ROL YA EXISTE')</script>";
				}
			else
				{
					$query="insert into rol (nombre_rol)
					values('".$_POST[nombre_rol]."');
					";
					if($conex->Execute($query))
						{
							echo "<script>parent.escribir_div_msj('REGISTRO GUARDADO CON EXITO.')</script>";
						}
					else	
						{
						echo "<script>parent.escribir_div_msj('ERROR AL GUARDAR..!');</script>";															
						}
				
				}
		break;
		
		case 'actualizar':
			$query="
				SELECT rol.nombre_rol
				FROM $db.rol
				where rol.nombre_rol =('".$POST['nombre_rol']."');";
			$result= $conex->Execute($query);
			if ($result->fields['nombre_rol']>0)
				{
					echo "<script>parent.escribir_div_msj('el Rol No existe.');</scrip>";
				}
			else
				{
					$query="UPDATE $db.rol SET	nombre_rol ='$_POST[nombre_rol]'";
													
					if($result=$conex->Execute($query))
						{
							echo "<script>parent.escribir_div_msj('REGISTRO ACTUALIZADO CON EXITO..!');</script>";
							echo "<script>parent.escribir_div_msj.limpiar();</script>";
						}
					else	
						{
						echo "<script>parent.escribir_div_msj('ERROR AL ACTUALIZAR..!');</script>";															
						}
				
				}
		break;							

	}
$conex->close();
?>