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
switch($var_option)
	{  
	
		case 'guardar':
			$query="select 	id_azas_ins
					from $db.materia_prima_e_insumos
					where id_materia_prima_insumos='".$_POST['id_materia_prima_insumos']."'; ";
			$result = $conex->Execute($query);
			if ($result->fields['id_materia_prima_insumos'] > 0) 
				{
					echo "<script>parent.escribir_div_msj('AREA YA EXISTE')</script>";
				}
			
					else
						{
							$query="insert into materia_prima_e_insumos ( id_tipo_ingreso,                 id_unidad,              fecha,             hora,              cantidad,             id_umidad_medida,              codigo,             id_azas_ins,              id_azas_ins,             proveedor,              quien_entrega,             id_usuarios,              obserciones,             ficha_tecnica)
									values 						('".$_POST[id_tipo_ingreso]."',  '".$_POST[id_unidad]."','".$_POST[fecha]."''".$_POST[hora]."','".$_POST[cantidad]."''".$_POST[id_umidad_medida]."','".$_POST[codigo]."''".$_POST[id_azas_ins]."','".$_POST[id_azas_ins]."''".$_POST[proveedor]."','".$_POST[quien_entrega]."''".$_POST[id_usuarios]."','".$_POST[obserciones]."''".$_POST[ficha_tecnica]."',);";
							if($conex->Execute($query))
								{
									echo "<script>parent.escribir_div_msj('REGISTRO GUARDADO CON EXITO.')</script>";
									echo "<script>parent.limpiar();</script>";
								}
							else	
								{
									echo "<script>parent.escribir_div_msj('ERROR AL GUARDAR.')</script>";															
								}		
						}									
		break;
		case 'actualizar':
			$query="
				SELECT tipo_materia_prima_insumos.azas_ins
				FROM $db.tipo_materia_prima_insumos
				WHERE tipo_materia_prima_insumos.azas_ins=('".$_POST['azas_ins']."');";
			$result = $conex->Execute($query);
			if ($result->fields['azas_ins']>0) 
				{
					echo "<script>alert('Nombre de unidad ya existe..!');</script>";
				}
			else 
				{
					$query="UPDATE $db.materia_prima_e_insumos SET tipo_ingreso 	='$_POST[tipo_ingreso]'
																	  nombre_unidad	='$_POST[nombre_unidad]',
																  WHERE azas_ins		='$_POST[azas_insumos]'";
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
	$conex->Close();
	?>