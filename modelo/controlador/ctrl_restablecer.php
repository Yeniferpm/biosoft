<?php 
header("Content-Type: text/html; charset=iso-8859-1");
include('../../include/vars.php');
set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
session_name($session_name);
session_start();
//******************** Inicio Conexion a la DB ********************
include ('../../herramientas/adodb5/adodb.inc.php');
$conex = NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
	if (!$conex) 
		{
		// echo "<br>No se logro la conexion a la bases de datos<br>";
		die($err_conn_db);
		}
	else
		{
			$query="SELECT n_documento, correo_usuario FROM $db.registro_usuario WHERE correo_usuario=('$_POST[restablecer]')";
			$result = $conex->Execute($query);
			$num=$result->fields['n_documento'];
			IF($num>0)
				{
				$conex->BeginTrans();
				$query="SELECT n_documento, correo_usuario FROM $db.registro_usuario WHERE correo_usuario=('$_POST[restablecer]')";
				// INICIO como enviar correo al usuario para recuperar clave
				
				
				
				// FIN como enviar correo al usuario para recuperar clave
				ECHO "<SCRIPT>alert('SU CLAVE FUE ENVIADA AL CORREO');</SCRIPT>";
				ECHO "<SCRIPT>window.parent.parent.$('#ventana1').dialog('close');";
				}
			else
				{					
					ECHO "<SCRIPT>alert('correo no existe');</SCRIPT>";
				}
			echo  "se logro obtener la conexion a la base de datos<br>";
		}
		$conex->Close();		
?>