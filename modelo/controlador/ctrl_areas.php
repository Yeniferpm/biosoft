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
			$query="select 	nombre_area
					from $db.areas
					where id_area='".$_POST['nombre_area']."'; ";
			$result = $conex->Execute($query);
			if ($result->fields['nombre_area']> 0) 
				{
					//echo "<script>alert('no alertas con alerrt.  DIV.');</scrip>";
					echo "<script>parent.escribir_div_msj('AREA YA EXISTE')</script>";
				}
			else
				{
					$query="insert into areas (nombre_area,            id_centro)
						  values ('".$_POST[nombre_area]."', '".$_POST[id_centro]."');";
								  // echo "".$query; exit;
							if($conex->Execute($query))
						{
							//echo "<script>alert('REGISTRO GUARDADO CON EXITO..!');</script>";
							echo "<script>parent.escribir_div_msj('REGISTRO GUARDADO CON EXITO.')</script>";
							echo "<script>parent.limpiar();</script>";
						}
					else	
						{
						echo "<script>alert('ERROR AL GUARDAR..!');</script>";															
						}
				
				}
		break;
		
		case 'actualizar':
			$query="
				SELECT areas.nombre_area
				FROM $db.areas	
				WHERE areas.nombre_area=('".$_POST['nombre_area']."');";
			$result = $conex->Execute($query);
			if ($result->fields['nombre_area']>0) 
				{
					echo "<script>alert('Nombre de unidad ya existe..!');</script>";
				}
			else 
				{
					$query="UPDATE $db.areas SET id_centro ='$_POST[id_centro]'
											  WHERE nombre_area='$_POST[nombre_area]'";
					if($result=$conex->Execute($query))
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