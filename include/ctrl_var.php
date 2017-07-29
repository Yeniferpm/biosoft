<?php 
include_once('vars.php');
header('Content-Type: text/html; charset='.$charset);
include'herramientas/adodb5/adodb.inc.php';
set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
session_name($session_name);
session_start();
//******************** Inicio Conexion a la DB ********************
$conex=NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!$conex) 
	{
		echo "<br>Error... Al conectar<br>";
		die($err_conn_db);
		exit;
	}	

function buscar_lenguaje()
	{
		$query="select opcion from lenguaje where opcion = '1'; ";
		$result = $conex->Execute($query);
		if ($result->fields[opcion]>0)
			{	$_SESSION[nombre_carpeta] = $result->fields[opcion]; }

$conex->close();
	}	

?>