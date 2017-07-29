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
				SELECT id_proceso_productivo
				FROM $db.proceso_productivo 
				where id_proceso_productivo ='".$POST['id_proceso_productivo']."';";
			$result= $conex->Execute($query);
			if ($result->fields['id_proceso_productivo']>0)
				{
					echo "<script>parent.escribir_div_msj('el id del registro  ya existe.');</scrip>";
				}
			else
				{
					$query="insert into proceso_productivo (
					id_tipo_proceso,
					id_tipo_pila, 
					id_medida_termica, 
					identificaion_de_cama,
					identificaion_de_pila,
					fecha_inicio,
					fecha_finalizacion,
					temperatura,
					medida_termica,
					ph, 
					humedad,
					olor,
					color,
					textura,
					cantidad_terminada,
					id_unidad_medida,
					observaciones)
					values('".$_POST[id_tipo_proceso]."',
					'".$_POST[id_tipo_pila]."',
					'".$_POST[id_medida_termica]."',		
					'".$_POST[id_tipo_pila]."',
					'".$_POST[identificaion_de_cama]."',
					'".$_POST[identificaion_de_pila]."',
					'".$_POST[fecha_inicio]."',
					'".$_POST[fecha_finalizacion]."',
					'".$_POST[temperatura]."',
					'".$_POST[medida_termica]."',
					'".$_POST[ph]."',
					'".$_POST[humedad]."',
					'".$_POST[color]."',
					'".$_POST[olor]."',
					'".$_POST[textura]."',
					'".$_POST[cantidad_terminada]."',
					'".$_POST[id_unidad_medida]."',
					'".$_POST[observaciones]."');
					";
					if($conex->Execute($query))
						{
							echo "<script>parent.escribir_div_msj('REGISTRO GUARDADO CON EXITO..!');</script>";
							echo "<script>parent.limpiar();</script>";
						}
					else	
						{
							echo "<script>parent.escribir_div_msj('ERROR AL GUARDAR..!');</script>";															
						}		
				}
		break;
	}
$conex->close();
?>