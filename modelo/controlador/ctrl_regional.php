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
		case 'prueba':
			$jTableResult = array();
			$jTableResult['ing_regional']="";
			
			$jTableResult['ing_regional'] .= "
				<table width='80%' border='0' >
					<tr>
						<td width='20%'>NOMBRE</td>
						<td width='50%'>
							<input type='text' name='nombre_regional' id='nombre_regional' />
						</td>
					</tr>	
					<tr>	
						<td>CODIGO MUNICIPIO</td>
						<td >							
							<select name='codigo_Municipio' id='codigo_Municipio'>
								<option value='1' >1</option>
								<option value='2' >2</option>
								<option value='3' >3</option>
							</select>						
						</td>
					</tr>
				</table>";
			
			print json_encode($jTableResult);
		break;
		
		case 'guardar':
			$query="
				SELECT id_municipio
				FROM $db.regional
				where id_municipio ='".$_POST['id_municipio']."';";
			// echo "".$query;exit;
			$result= $conex->Execute($query);
			if ($result->fields['id_municipio']>0)
				{
					//echo "<script>alert('no alertas con alerrt.  DIV.');</scrip>";
					echo "<script>parent.escribir_div_msj(' YA EXISTE ......................................')</script>";
				}
			else
				{
					$query="insert into regional (id_regional, nombre_regional, direccion_regional,telefono_regional,correo_regional,id_municipio)
					values('".$_POST[id_regional]."', '".$_POST[nombre_regional]."', '".$_POST[direccion_regional]."','".$_POST[telefono_regional]."','".$_POST[correo_regional]."','".$_POST[id_municipio]."');
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
				SELECT regional.codigo_regional
				FROM $db.regional
				where regional.codigo_regional =('".$POST['codigo_regional']."');";
			$result= $conex->Execute($query);
			if ($result->fields['codigo_regional']>0)
				{
					echo "<script>alert('el codigo de regional no existe.');</scrip>";
				}
			else
				{
					$query="UPDATE $db.regional SET	nombre_regional			='$_POST[nombre_regional]',
													direccion_regional		='$_POST[direccion_regional]'
													telefono_regional       ='$_POST[telefono_regional]'
													correo_regional			='$_POST[correo_regional]'
													codigo_Municipio 		='$_POST[codigo_Municipio]'
													WHERE codigo_regional	='$_POST[codigo_regional]'";
													
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