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
				SELECT nombre_producto
				FROM $db.productos
				where nombre_producto ='".$POST['nombre_producto']."';";
			
			
			$result= $conex->Execute($query);
			if ($result->fields['nombre_producto']>'') 
				{
					echo "<script>parent.escribir_div_msj('el producto ya existe.');</scrip>";
				}
				
			else
				{
					$query="insert into productos (nombre_producto, id_tipo_producto, id_categoria)
					values('".$_POST[nombre_producto]."', '".$_POST[id_tipo_producto]."','".$_POST[id_categoria]."');";
				
				
					if($conex->Execute($query))
						{
							echo "<script>parent.escribir_div_msj('REGISTRO GUARDADO CON EXITO..!');</script>";
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