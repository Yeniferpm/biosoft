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
				SELECT codigo_centro
				FROM $biofabrica
				where codigo_centro ='".$_POST['codigo_centro']."';";
			// echo "".$query;exit;
			$result= $conex->Execute($query);
			if ($result->fields['codigo_centro']>0)
				{
					//echo "<script>alert('no alertas con alerrt.  DIV.');</scrip>";
					echo "<script>parent.escribir_div_msj(' YA EXISTE ......................................')</script>";
				}
			else
				{
					$query="insert into centro (codigo_centro, nombre_centro,telefono_centro,direccion_centro,correo_centro,codigo_regional)
					values('".$_POST[codigo_centro]."', '".$_POST[nombre_centro]."', '".$_POST[telefono_centro]."','".$_POST[direccion_centro]."','".$_POST[correo_centro]."','".$_POST[codigo_regional]."');
					";
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
				SELECT centro.codigo_centro
				FROM $biofabrica
				where centro.codigo_centro =('".$POST['codigo_centro']."');";
			$result= $conex->Execute($query);
			if ($result->fields['codigo_centro']>0)
				{
					echo "<script>alert('el codigo de centro no existe.');</scrip>";
				}
			else
				{
					$query="UPDATE $db.regional SET	nombre_centro			='$_POST[nombre_centro]',
													telefono_centro       	='$_POST[telefono_centro]'
													direccion_centro		='$_POST[direccion_centro]'
													correo_regional			='$_POST[correo_regional]'
													WHERE codigo_centro	='$_POST[codigo_centro]'";
													
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