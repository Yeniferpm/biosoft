<?php
	include_once('vars.php');
	set_include_path(get_include_path().PATH_SEPARATOR .$PathApp);
	session_name($session_name);
	session_start();
	//************INICIO CONEXION BASE DE DATOS**********//
	include('herramientas/adodb5/adodb.inc.php');
	$conex=NewADOConnection($driver_db);
	$conex->Connect($host_db, $user_db, $pass_db, $db);
	$conex->debug=$debug_db;
	if (!$conex){
		echo '<script>Error...Al Conectar</script>';
		die($err_conn_db);
		exit;
		}

function cargar_idioma()
	{

		$query="select opcion, carpeta, lenguaje from lenguaje where opcion = '1' ";
		$result = $conex->Execute($query);
		if ($result->fields['opcion']>0)
		{ $var_carpeta = $result->fields['carpeta']; }
	return $var_carpeta;
	}
?>