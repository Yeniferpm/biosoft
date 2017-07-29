<?php
	include_once('vars.php');
	include_once('herramientas/adodb5/adodb.inc.php');
	$conex=NewADOConnection($driver_db);
	$conex->Connect($host_db, $user_db, $pass_db, $db);
	$conex->debug=$debug_db;	
?>