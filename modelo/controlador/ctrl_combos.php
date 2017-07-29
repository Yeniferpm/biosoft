<?php
include('../../include/vars.php');
header("Content-Type: text/html; charset=".$charset);
set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
session_name($session_name);
session_start();
include ('../../herramientas/adodb5/adodb.inc.php');
//******************** Inicio Conexion a la DB ********************
$conex = NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!$conex) 
	{
		echo "<br>Error... Al conectar<br>";
		die($err_conn_db);
	}
else
	{
		switch($_POST['action'])
			{  
				case 'buscar_programas':
					$jTableResult = array();
					$jTableResult['programas']="";
						if($_POST['id_area']>0)
							{
								$query="SELECT	  areas.nombre_area, programa_formacion.nombre_programa,
												  areas.id_area, programa_formacion.id_programa
										FROM	  $db.programa_formacion
													INNER JOIN areas ON areas.id_area = programa_formacion.id_area
										WHERE		areas.id_area = '".$_POST['id_area']."'
										ORDER BY    areas.nombre_area; "; 
								$result=$conex->Execute($query);
								if($result->fields['id_programa']>0)
									{
										$jTableResult['programas']="<option value=''>:..</option>";
										while (!$result->EOF){
											  $jTableResult['programas'].= "<option value='".$result->fields['id_programa']."'>".utf8_encode($result->fields['nombre_programa'])."</option>";
											  $result->MoveNext();
											}
									}
								else
									{
										$jTableResult['programas']="<option value='0'>NO EXISTEN DATOS ASOCIADOS</option>";
									}
							}
						else			
							{
								$jTableResult['programas']="<option value='0'></option>";
							}
					print json_encode($jTableResult);	
				break;
			
				case 'buscar_areas':
					$jTableResult = array();
					$jTableResult['areas']="";
						if($_POST['id_centro']>0)
							{
								$query="SELECT  areas.nombre_area, areas.id_area, centro.nombre_centro,
										        centro.id_centro
										FROM    $db.areas
												INNER JOIN centro ON centro.id_centro = areas.id_centro
										WHERE	centro.id_centro = '".$_POST['id_centro']."'
										ORDER BY centro.nombre_centro; "; 
								$result=$conex->Execute($query);
								if($result->fields['id_area']>0)
									{
										$jTableResult['areas']="<option value=''>:..</option>";
										while (!$result->EOF){
											  $jTableResult['areas'].= "<option value='".$result->fields['id_area']."'>".utf8_encode($result->fields['nombre_area'])."</option>";
											  $result->MoveNext();
											}
									}
								else
									{
										$jTableResult['areas']="<option value='0'>NO EXISTEN DATOS ASOCIADOS</option>";
									}
							}
						else			
							{
								$jTableResult['areas']="<option value='0'></option>";
							}

					print json_encode($jTableResult);	
				break;
				
				case 'buscar_ficha':
					$jTableResult = array();
					$jTableResult['ficha']="";
						if($_POST['id_programa']>0)
							{
								$query="SELECT  ficha.codigo_ficha, programa_formacion.nombre_programa,
										        programa_formacion.id_programa
										FROM    $db.ficha
												INNER JOIN programa_formacion ON programa_formacion.id_programa = ficha.id_programa
										WHERE	programa_formacion.id_programa = '".$_POST['id_programa']."'
										ORDER BY programa_formacion.nombre_programa; "; 
								$result=$conex->Execute($query);
								if($result->fields['codigo_ficha']>0)
									{
										$jTableResult['fichas']="<option value=''>:..</option>";
										while (!$result->EOF){
											  $jTableResult['fichas'].= "<option value='".$result->fields['codigo_ficha']."'>".utf8_encode($result->fields['codigo_ficha'])."</option>";
											  $result->MoveNext();
											}
									}
								else
									{
										$jTableResult['fichas']="<option value='0'>NO EXISTEN DATOS ASOCIADOS</option>";
									}
							}
						else			
							{
								$jTableResult['fichas']="<option value='0'></option>";
							}

					print json_encode($jTableResult);	
				break;
			
			case 'buscar_cantidad_producto':
					$jTableResult = array();
					$jTableResult['cantidad_producto']="";
						if($_POST['id_producto']>0)
							{
								$query="SELECT
										  productos.nombre_producto, cantidad_productos.id_producto, cantidad_productos. id_unidad_medida,
										  cantidad_productos.id_cantidad_producto, unidad_de_medida.unidad_medida,
										  cantidad_productos.cantidad_producto
										FROM
										 $db.cantidad_productos 
										 INNER JOIN	  productos ON productos.id_producto = cantidad_productos.id_producto
										 INNER JOIN   unidad_de_medida ON unidad_de_medida.id_unidad_medida = cantidad_productos.id_unidad_medida
										WHERE	productos.id_producto = '".$_POST['id_producto']."'
										ORDER BY cantidad_productos.id_cantidad_producto; "; 
								$result=$conex->Execute($query);
								if($result->fields['id_cantidad_producto']>0)
									{
										$jTableResult['cantidad_producto']="<option value=''>:..</option>";
										while (!$result->EOF){
											  $jTableResult['cantidad_producto'].= "<option value='".$result->fields['id_cantidad_producto']."'>".utf8_encode($result->fields['cantidad_producto']).($result->fields['unidad_medida'])."</option>";
											  $result->MoveNext();
											}
									}
								else
									{
										$jTableResult['cantidad_producto']="<option value='0'>NO EXISTEN DATOS ASOCIADOS</option>";
									}
							}
						else			
							{
								$jTableResult['cantidad_producto']="<option value='0'></option>";
							}

					print json_encode($jTableResult);	
				break;
			
				case 'buscar_precio':
					$jTableResult = array();
					$jTableResult['precio_producto']="";
						if($_POST['id_producto']>0)
							{
								$query="SELECT
										  lista_precios.id_precio, lista_precios.precio_producto,
										  lista_precios.id_producto, productos.nombre_producto,
										  lista_precios.id_unidad_medida, unidad_de_medida.unidad_medida
										FROM
										  $db.lista_precios INNER JOIN
										  productos ON productos.id_producto = lista_precios.id_producto
										  INNER JOIN
										  unidad_de_medida ON unidad_de_medida.id_unidad_medida =
											lista_precios.id_unidad_medida
										WHERE	productos.id_producto = '".$_POST['id_producto']."'
										ORDER BY lista_precios.id_precio; "; 
								$result=$conex->Execute($query);
								if($result->fields['id_precio']>0)
									{
										$jTableResult['precio']="<option value=''>:..</option>";
										while (!$result->EOF){
											  $jTableResult['precio'].= "<option value='".$result->fields['id_precio']."'>".utf8_encode($result->fields['precio_producto'])."</option>";
											  $result->MoveNext();
											}
									}
								else
									{
										$jTableResult['precio']="<option value='0'>NO EXISTEN DATOS ASOCIADOS</option>";
									}
							}
						else			
							{
								$jTableResult['precio']="<option value='0'></option>";
							}

					print json_encode($jTableResult);	
				break;
				case 'buscar_centros':
					$jTableResult = array();
					$jTableResult['centros']="";
					
						if($_POST['id_regional']>0)
							{
								$query="SELECT 		regional.nombre_regional, centro.nombre_centro, 
													centro.id_centro,  regional.id_regional
										FROM  		$db.centro 
													INNER JOIN  regional ON regional.id_regional = centro.id_regional
										WHERE  		regional.id_regional = '".$_POST['id_regional']."'
										ORDER BY  	regional.nombre_regional; "; 
								$result=$conex->Execute($query);
								if($result->fields['id_centro']>0)
									{
										$jTableResult['centros']="<option value=''>:..</option>";
										while (!$result->EOF){
											  $jTableResult['centros'].= "<option value='".$result->fields['id_centro']."'>".utf8_encode($result->fields['nombre_centro'])."</option>";
											  $result->MoveNext();
											}
									}
								else
									{
										$jTableResult['centros']="<option value='0'>NO EXISTEN DATOS ASOCIADOS</option>";
									}
							}
						else			
							{
								$jTableResult['centros']="<option value='0'></option>";
							}

					print json_encode($jTableResult);	
				break;
				case 'buscar_areas':
					$jTableResult = array();
					$jTableResult['areas']="";
					
						if($_POST['id_centro']>0)
							{
								$query="SELECT 		centro.nombre_centro, areas.nombre_area, 
													areas.id_area,  centro.id_centro
										FROM  		$db.areas 
													INNER JOIN  centro ON centro.id_centro = areas.id_centro
										WHERE  		centro.id_centro = '".$_POST['id_centro']."'
										ORDER BY  	centro.nombre_centro; "; 
								$result=$conex->Execute($query);
								if($result->fields['id_area']>0)
									{
										$jTableResult['areas']="<option value=''>:..</option>";
										while (!$result->EOF){
											  $jTableResult['areas'].= "<option value='".$result->fields['id_area']."'>".utf8_encode($result->fields['nombre_area'])."</option>";
											  $result->MoveNext();
											}
									}
								else
									{
										$jTableResult['areas']="<option value='0'>NO EXISTEN DATOS ASOCIADOS</option>";
									}
							}
						else			
							{
								$jTableResult['areas']="<option value='0'></option>";
							}

					print json_encode($jTableResult);	
				break;
				case 'buscar_unidades':
					$jTableResult = array();
					$jTableResult['unidad']="";
					
						if($_POST['id_area']>0)
							{
								$query="SELECT 		areas.nombre_area, unidad.nombre_unidad, 
													unidad.id_unidad,  areas.id_unidad
										FROM  		$db.unidad
													INNER JOIN  areas ON areas.id_area = unidad.id_area
										WHERE  		areas.id_area = '".$_POST['id_area']."'
										ORDER BY  	areas.nombre_area; "; 
								$result=$conex->Execute($query);
								if($result->fields['id_unidad']>0)
									{
										$jTableResult['unidad']="<option value=''>:..</option>";
										while (!$result->EOF){
											  $jTableResult['unidad'].= "<option value='".$result->fields['id_unidad']."'>".utf8_encode($result->fields['nombre_unidad'])."</option>";
											  $result->MoveNext();
											}
									}
								else
									{
										$jTableResult['unidad']="<option value='0'>NO EXISTEN DATOS ASOCIADOS</option>";
									}
							}
						else			
							{
								$jTableResult['unidad']="<option value='0'></option>";
							}

					print json_encode($jTableResult);	
				break;
			}
		$conex->close();
	}	
?>