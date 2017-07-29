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
			
			}
		$conex->close();
	}	
?>