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
$var_option = $_POST['option'];          
switch($var_option)
	{  
			case 'guardar':
			$query="select id_precio
				FROM $db.lista_precios
				WHERE id_precio=('".$_POST['id_precio']."');";
			$result = $conex->Execute($query);
			if ($result->fields['id_precio'] > 0) 
				{
					echo "<script>parent.escribir_div_msj('DATO YA EXISTE')</script>";
				}
			else
				{
					$query="insert into lista_precios(id_precio,cantidad_unitaria,precio_producto,fecha_registro,fecha_cierre,id_usuario,id_unidad_medida,id_producto)
					values('".$_POST['id_precio']."','".$_POST['cantidad_unitaria']."', '".$_POST['precio_producto']."', '".$_POST['fecha_registro']."', '".$_POST['fecha_cierre']."','".$_POST['id_usuario']."','".$_POST['id_unidad_medida']."','".$_POST['id_producto']."');
					";
					//echo $query; exit;
					if($conex->Execute($query))
						{
							// echo "<script>alert('REGISTRO GUARDADO CON EXITO..!');</script>";
							echo "<script>parent.escribir_div_msj('REGISTRO GUARDADO CON EXITO.')</script>";
							echo "<script>parent.limpiar();</script>";
						}
					else	
						{
						echo "<script>parent.escribir_div_msj('ERROR AL GUARDAR..!')</script>";															
						}
				}								
		break;
		case 'actualizar':
			$query="
				SELECT lista_precios.id_precio
				FROM $db.lista_precios
				WHERE lista_precios.id_precio=('".$_POST['id_precio']."');";
			$result = $conex->Execute($query);
			if ($result->fields['id_precio']>0) 
				{
					echo "<script>alert('precio ya existe..!');</script>";
				}
			else 
				{
					$query="UPDATE $db.lista_precios SET id_producto ='$_POST[id_producto]'
											  WHERE id_precio='$_POST[id_precio]'";
					if($result=$conex->Execute($query))
						{
							echo "<script>alert('REGISTRO GUARDADO CON EXITO..!');</script>";
							echo "<script>parent.limpiar();</script>";
						}
					else	
						{
							echo "<script>alert('ERROR AL ACTUALIZAR..!');</script>";															
						}		
				}
		break;
	}
	$conex->Close();
?>