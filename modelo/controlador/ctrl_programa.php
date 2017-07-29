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
				SELECT id_programa
				FROM $db.programa_formacion 
				where id_programa ='".$POST['id_programa']."';";
			$result= $conex->Execute($query);
			if ($result->fields['id_programa']>0)
				{
					echo "<script>parent.escribir_div_msj('el nombre de progrma ya existe.')</scrip>";
				}
			else
				{
					$query="insert into programa_formacion (nombre_programa, id_area)
					values('".$_POST[nombre_programa]."','".$_POST[nombre_area]."');";
					if($conex->Execute($query))
						{
							echo "<script>parent.escribir_div_msj('REGISTRO GUARDADO CON EXITO..!')</script>";
							echo "<script>parent.limpiar();</script>";
						}
					else	
						{
							echo "<script>parent.escribir_div_msj('ERROR AL GUARDAR..!')</script>";															
						}
				}
		break;
	}
$conex->close();
?>