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
				SELECT id_auconsumo
				FROM autoconsumo
				where id_auconsumo ='".$_POST['id_auconsumo']."';";
			// echo "".$query;exit;
			$result= $conex->Execute($query);
			if ($result->fields['id_auconsumo']>0)
				{
					//echo "<script>alert('no alertas con alerrt.  DIV.');</scrip>";
					echo "<script>parent.escribir_div_msj(' YA EXISTE ......................................')</script>";
				}
			else
				{
					$query="insert into autoconsumo (id_auconsumo, fecha, cantidad,descripcion_producto,se_entrega,aplicacion_en,actividad_a_realizar,autoriza,recibe,id_cantidad_producto,n_documento,unidad_medida)
					values('".$_POST[id_auconsumo]."', '".$_POST[fecha]."', '".$_POST[cantidad]."'".$_POST[descripcion_producto]."'".$_POST[se_entrega]."'".$_POST[aplicacion_en]."'".$_POST[actividad_a_realizar]."'".$_POST[autoriza]."'".$_POST[recibe]."'".$_POST[id_cantidad_producto]."'".$_POST[n_documento]."'".$_POST[unidad_medida]."');
					";
					if($conex->Execute($query))
						{
							//echo "<script>alert('REGISTRO GUARDADO CON EXITO..!');</script>";
							echo "<script>parent.escribir_div_msj('REGISTRO GUARDADO CON EXITO.')</script>";
							echo "<script>parent.limpiar();</script>";
						}
					else	
						{
						echo "<script>alert('ERROR AL GUARDAR..!');</script>";															
						}
				
				}
		break;
		
		case 'actualizar':
			$query="
				SELECT autoconsumo.id_auconsumo
				FROM $db.regional
				where autoconsumo.id_auconsumo =('".$POST['id_auconsumo']."');";
			$result= $conex->Execute($query);
			if ($result->fields['id_auconsumo']>0)
				{
					echo "<script>alert('el codigo de autoconsumo no existe.');</scrip>";
				}
			else
				{
					$query="UPDATE $db.regional SET	fecha						='$_POST[fecha]',
													cantidad					='$_POST[cantidad]'
													descripcion_producto		='$_POST[descripcion_producto]'
													se_entrega					='$_POST[se_entrega]'
													aplicacion_en				='$_POST[aplicacion_en	]'
													actividad_a_realizar		='$_POST[actividad_a_realizar]'
													autoriza					='$_POST[autoriza]'
													recibe						='$_POST[recibe]'
													id_cantidad_producto		='$_POST[id_cantidad_producto]'
													n_documento					='$_POST[n_documento]'
													unidad_medida				='$_POST[unidad_medida]'
													WHERE id_auconsumo	='$_POST[id_auconsumo]'";
													
					if($result=$conex->Execute($query))
						{
							echo "<script>alert('REGISTRO ACTUALIZADO CON EXITO..!');</script>";
							echo "<script>parent.limpiar();</script>";
						}
					else	
						{
						echo "<script>alert('ERROR AL ACTUALIZAR..!');</script>";															
						}
				
				}
		break;							

	}
$conex->close();
?>