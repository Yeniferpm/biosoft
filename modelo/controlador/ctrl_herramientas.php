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
				SELECT codigo_herramientas
				FROM $db.herramientas
				where id_herramientas ='".$_POST['codigo_herramientas']."';";
			 // echo " AQYUI".$query; exit;
			$result= $conex->Execute($query);
			if ($result->fields['codigo_herramientas']>0)
				{
					//echo "<script>alert('no alertas con alerrt.  DIV.');</scrip>";
					echo "<script>parent.escribir_div_msj(' YA EXISTE ......................................')</script>";
				}
			else
				{
					$query="insert into herramientas (codigo_herramientas, nombre_herramienta, id_unidad)
					values('".$_POST[codigo_herramientas]."', '".$_POST[nombre_herramienta]."', '".$_POST[id_unidad]."');
					";
					if($conex->Execute($query))
						{
							//echo "<script>alert('REGISTRO GUARDADO CON EXITO..!');</script>";
							echo "<script>parent.escribir_div_msj('REGISTRO GUARDADO CON EXITO.')</script>";
							echo "<script>parent.cancelar();</script>";
						}
					else	
						{
						echo "<script>alert('ERROR AL GUARDAR..!');</script>";															
						}
				
				}
		break;
		
		case 'actualizar':
			$query="
				SELECT herramientas.codigo_herramientas
				FROM $db.regional
				where herramientas.codigo_herramientas =('".$POST['codigo_herramientas']."');";
			$result= $conex->Execute($query);
			if ($result->fields['codigo_herramientas']>0)
				{
					echo "<script>alert('el codigo de herramienta no existe.');</scrip>";
				}
			else
				{
					$query="UPDATE $db.regional SET	nombre_herramienta			='$_POST[nombre_herramienta]',
													nombre_unidad				='$_POST[nombre_unidad]'
													WHERE codigo_herramientas	='$_POST[codigo_herramientas]'";
													
					if($result=$conex->Execute($query))
						{
							echo "<script>alert('REGISTRO ACTUALIZADO CON EXITO..!');</script>";
							echo "<script>parent.limpiar();</script>";
						}
					else	
						{
						echo "<script>alert('ERROR AL ACTUALIZAR..!');</script>";															
						}
				
				}
		break;							

	}
$conex->close();
?>