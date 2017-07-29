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
				SELECT n_documento 
				FROM $db.registro_usuario 
				where n_documento ='".$POST['n_documento']."';";
			$result= $conex->Execute($query);
			if ($result->fields['n_documento']>0)
				{
					echo "<script>alert('el numero de identificacion ya existe.');</scrip>";
				}
			else
				{
					$query="insert into registro_usuario (id_ventas,  )
					values('".$_POST[id_ventas]."', '".$_POST[id_cantidad_producto]."','".$_POST[fecha]."','".$_POST[id_producto]."','".$_POST[cantidad_ventas]."','".$_POST[unidad_medida]."','".$_POST[id_precio]."','".$_POST[total_apagar]."','".$_POST[n_documento]."','".$_POST[recibe]."');
					";
					if($conex->Execute($query))
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
$conex->close();
?>