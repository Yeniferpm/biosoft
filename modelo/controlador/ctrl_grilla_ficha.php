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
///ctl_ficha///
$var_option = $_POST[option];
	switch ($var_option)
	{
		case 'guardar':
			$query="
				SELECT codigo_ficha
				FROM $db.ficha 
				where codigo_ficha ='".$_POST['codigo_ficha']."';";
			$result= $conex->Execute($query);
			if ($result->fields['codigo_ficha']>0)
				{ 
					echo "<script>parent.escribir_div_msj('EL NUMERO DE FICHA YA EXISTE.')</script>";
				}
			else 
				{
					$query="insert into ficha (codigo_ficha, id_programa, id_area)
					values('".$_POST[codigo_ficha]."', '".$_POST[id_programa]."', '".$_POST[id_area]."');";
				if($conex->Execute($query))
						{
							echo "<script>parent.escribir_div_msj('REGISTRO GUARDADO CON EXITO..!')</script>";
							echo "<script>parent.limpiar();</script>";
						}
					else 	
						{
						echo "<script>parent.escribir_div_msj('ERROR AL GUARDAR..!');</script>";															
						}
				
				}
		break;
		case 'actualizar':
			$query="
				SELECT ficha.codigo_ficha
				FROM $db.ficha 
				where ficha.codigo_ficha ='".$_POST['codigo_ficha']."';";
			$result= $conex->Execute($query);
			if ($result->fields['codigo_ficha']>0)
				{
					echo "<script>parent.escribir_div_msj('el numero de ficha no existe.')</script>";
				}
			else
				{
					$query="UPDATE $db.ficha SET	nombre_programa			='$_POST[nombre_programa]',
													nombre_area				='$_POST[nombre_area]'
													WHERE codigo_ficha		='$_POST[codigo_ficha]'";
													
					if($result=$conex->Execute($query))
						{
							echo "<script>parent.escribir_div_msj('REGISTRO ACTUALIZADO CON EXITO..!')</script>";
							echo "<script>parent.limpiar();</script>";
						}
					else	
						{
						echo "<script>parent.escribir_div_msj('ERROR AL ACTUALIZAR..!')</script>";															
						}
				
				}
		break;							
	}
	///fin ctrl_ficha///
	///ctrl_grilla///

  try {
    switch ($_REQUEST['action']) {

      case 'lista_ficha':
		$jTableResult = array();
		unset($where);
			
			if ($_POST['id_area']!='')
				{
					$where  = " where (centro.id_centro = '".$_POST['id_centro']."') 
								and   (areas.id_area  = '".$_POST['id_area']."')   
								and   (programa_formacion.id_programa  = '".$_POST['id_programa']."') ";	
				}
			// $query="select * from $db.usuario where (1=1) $where";
			$query="SELECT
					  centro.nombre_centro, programa_formacion.nombre_programa,
					  areas.nombre_area, ficha.codigo_ficha, areas.id_centro,
					  programa_formacion.id_area, ficha.id_programa
					FROM
					  areas INNER JOIN
					  centro ON centro.id_centro = areas.id_centro INNER JOIN
					  programa_formacion ON areas.id_area = programa_formacion.id_area
					  INNER JOIN
					  ficha ON programa_formacion.id_programa = ficha.id_programa
					$where 
					";
			// echo $query; exit;	
			$result=$conex->Execute("select count(*) as RecordCount from ($query) as tbl");
			$recordCount = $result->fields['RecordCount'];

			$result=$conex->Execute($query." ORDER BY " . $_GET['jtSorting'] . " LIMIT " . $_GET['jtStartIndex'] . "," . $_GET['jtPageSize']);
			$rows = array();
			while (!$result->EOF) {
			  array_push($rows, $result->fields);
			  $result->MoveNext();
			}

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['TotalRecordCount'] = $recordCount;
        $jTableResult['Records'] = $rows;
        print json_encode($jTableResult);
      break;

      //////////////////////////////////////////////////////////////////////////////////////////
	  // no mas tareas de aqui hacia abajo
      //////////////////////////////////////////////////////////////////////////////////////////
      case 'registra_usuario':
        $jTableResult = array();
        $query="select id_usu FROM $db.usuario WHERE (numero_documento_usu = '".$_POST['numero_documento_usu']."')";
        $result=$conex->Execute($query);
				if ($result->recordcount()>0){
					$jTableResult['Result'] = "ERROR";
					$jTableResult['Message'] = "LA IDENTIFICACION INGRESADA YA SE ENCUENTRA REGISTRADA EN EL SISTEMA";
					print json_encode($jTableResult);
					exit;
				}

        $query="select id_usu FROM $db.usuario WHERE (login = '".$_POST['login']."')";
        $result=$conex->Execute($query);
				if ($result->recordcount()>0){
					$jTableResult['Result'] = "ERROR";
					$jTableResult['Message'] = "EL LOGIN DEL USUARIO INGRESADO YA SE ENCUENTRA REGISTRADO EN EL SISTEMA";
					print json_encode($jTableResult);
					exit;
				}

				$var_cantidad = strlen($_POST['correo_usu']);
				if ($var_cantidad > 0)
					{
						$query="select id_usu FROM $db.usuario WHERE (correo_usu = '".$_POST['correo_usu']."')";
						$result=$conex->Execute($query);
						if ($result->recordcount()>0){
								$jTableResult['Result'] = "ERROR";
								$jTableResult['Message'] = "EL CORREO DIGITADO YA EXISTE";
								print json_encode($jTableResult);
								exit;
							}
					}
				// $var_credencial_encrip      = Encripta($_POST['contrasena'], 1);

				$query_cargo="SELECT cargo.id_cargo,  cargo.descripcion_cargo FROM $db.cargo WHERE id_cargo = ('".$_POST['id_cargo']."')";
				$result_cargo=$conex->Execute($query_cargo);
				$var_cargo = $result_cargo->fields['descripcion_cargo'];
				// $num						= rand($var_u, $var_d);
				// $Newpassword  				= generarpass($num);
				$var_tipo = $_POST['id_tipo'];
				if ($var_tipo==1){	$var_entidad = $_POST['id_entidad'];	}
				if ($var_tipo==0){	$var_entidad = $_SESSION['IdEntidad'];	}
				$query="INSERT INTO $db.usuario SET
								fecha_registro_usuario	=now(),
								codigo_dpto				='".$_POST['codigo_dpto']."',
								codigo_municipio		='".$_POST['codigo_municipio']."',
								id_entidad				='".$var_entidad."',
								id_cargo				='".$_POST['id_cargo']."',
								tipo_documento_usu		='".$_POST['tipo_documento_usu']."',
								numero_documento_usu	='".$_POST['numero_documento_usu']."',
								nombres_usu				='".$_POST['nombres_usu']."',
								primer_apellido_usu		='".$_POST['primer_apellido_usu']."',
								segundo_apellido_usu	='".$_POST['segundo_apellido_usu']."',
								direccion_residencia_usu='".$_POST['direccion_residencia_usu']."',
								telefono_usu			='".$_POST['telefono_usu']."',
								celular_usu				='".$_POST['celular_usu']."',
								correo_usu				='".$_POST['correo_usu']."',
								estado_usu				='".$_POST['estado_usu']."',
								tipo 					='".$_POST['id_tipo']."',
								login					='".$_POST['login']."'";
				
				$var_cantidad_password = strlen($_POST['contrasena']);
				if ($var_cantidad_password == 0)
						{
							////// inicio credenciales //////////////////////////////
							$var_credencial_encrip  = Encripta($Newpassword , 	1);
							$var_password 			= $Newpassword;
							////// cierre credenciales //////////////////////////////
						}
					else
						{
							////// inicio credenciales //////////////////////////////
							$var_credencial_encrip	= Encripta($_POST['contrasena'], 1);
							$var_password 			= $_POST['contrasena'];
							////// cierre credenciales //////////////////////////////
						}
				//registrar usuario
				$query.=", contrasena = '$var_credencial_encrip';";
				// echo "".$query;exit;
				if ($conex->Execute($query))
					{
						if ($var_cantidad > 0)
							{
								///////////inicio enviar correo /////////////////////
								$nombre		=	$_POST['nombres_usu']." ".$_POST['primer_apellido_usu'];
								$var_envio = 	enviarEmail($nombre, $_POST['correo_usu'], $var_asunto, $_POST['login'],  	$_POST['numero_documento_usu'], $var_cargo, $var_password);
								///////////cierre enviar correo /////////////////////
								if ($var_envio==1)
									{
										$jTableResult['Result']  = "OK";
										$jTableResult['Message'] = "INFORMACION REGISTRADA CON EXITO.\nSE CONFIRMA EL ENVIO DE COPIA DEL REGISTRO AL CORREO REGISTRADO";
									}
								else
									{
										$jTableResult['Result']  = "ERROR....";
										$jTableResult['Message']= "SE PRESENTO UN ERROR INESPARADO \nINTENTE DE NUEVO O DE UNA ESPARA PARA OBTENER CONECTIVIDAD.";
									}
							}
						else
							{
								$jTableResult['Result']  = "OK";
								$jTableResult['Message'] = "LOS DATOS FUERON REGISTRADOS CON EXITO. SIN COPIA AL CORREO.";
							}
					}
				else
					{
						$jTableResult['Result']  = "ERROR";
						$jTableResult['Message'] = "NO SE PUDO REGISTRAR LA INFORMACION";
					}

				print json_encode($jTableResult);
		break;

      //////////////////////////////////////////////////////////////////////////////////////////
		case 'actualiza_usuario':
			$jTableResult = array();
				$query="select id_usu FROM $db.usuario WHERE (login = '".$_POST['login']."') AND (id_usu != '".$_POST['id_usu']."')";
				$result=$conex->Execute($query);
			if ($result->recordcount()>0){
					$jTableResult['Result'] 	= "ERROR";
					$jTableResult['Message']	= "EL LOGIN DEL USUARIO INGRESADO YA SE ENCUENTRA REGISTRADO EN EL SISTEMA";
					print json_encode($jTableResult);
					exit;
				}

				$query="select id_usu FROM $db.usuario WHERE (numero_documento_usu = '".$_POST['numero_documento_usu']."') AND (id_usu !='".$_POST['id_usu']."')";
				$result=$conex->Execute($query);
			if ($result->recordcount()>0){
					$jTableResult['Result'] = "ERROR";
					$jTableResult['Message'] = "LA IDENTIFICACION INGRESADA YA SE ENCUENTRA REGISTRADA EN EL SISTEMA";
					print json_encode($jTableResult);
					exit;
				}

			$var_cantidad = strlen($_POST['correo_usu']);

			if ($var_cantidad > 0)
				{
					$query="select id_usu FROM $db.usuario WHERE (correo_usu = '".$_POST['correo_usu']."') AND (id_usu !='".$_POST['id_usu']."')";
					$result=$conex->Execute($query);
					if ($result->recordcount()>0){
							$jTableResult['Result'] = "ERROR";
							$jTableResult['Message'] = "EL CORREO DIGITADO YA EXISTE";
							print json_encode($jTableResult);
							exit;
						}
				}

				$query_cargo="SELECT cargo.id_cargo,  cargo.descripcion_cargo FROM $db.cargo WHERE id_cargo = ('".$_POST['id_cargo']."')";
				$result_cargo=$conex->Execute($query_cargo);
				$var_cargo = $result_cargo->fields['descripcion_cargo'];
				$num						= rand($var_u, $var_d);
				$Newpassword  				= generarpass($num);

				$query="UPDATE $db.usuario SET
							codigo_dpto='".$_POST['codigo_dpto']."',
							codigo_municipio='".$_POST['codigo_municipio']."',
							tipo_documento_usu='".$_POST['tipo_documento_usu']."',
							nombres_usu='".$_POST['nombres_usu']."',
							primer_apellido_usu='".$_POST['primer_apellido_usu']."',
							segundo_apellido_usu='".$_POST['segundo_apellido_usu']."',
							direccion_residencia_usu='".$_POST['direccion_residencia_usu']."',
							telefono_usu='".$_POST['telefono_usu']."',
							celular_usu='".$_POST['celular_usu']."',
							correo_usu='".$_POST['correo_usu']."',
							estado_usu='".$_POST['estado_usu']."' ";

			$var_cantidad_password = strlen($_POST['contrasena']);
			if ($var_cantidad_password == 0)
					{
						////// inicio credenciales //////////////////////////////
						$var_credencial_encrip  = Encripta($Newpassword , 	1);
						$var_password 			= $Newpassword;
						////// cierre credenciales //////////////////////////////
					}
				else
					{
						////// inicio credenciales //////////////////////////////
						$var_credencial_encrip	= Encripta($_POST['contrasena'], 1);
						$var_password 			= $_POST['contrasena'];
						////// cierre credenciales //////////////////////////////
					}
			//actuaizar usuario
			$query.=", contrasena = '$var_credencial_encrip'  WHERE (id_usu = '".$_POST['id_usu']."');";
			// echo "".$query;
			if ($conex->Execute($query)){

					////// inicio envio de copia al correo //////////////////////////////
					if ($var_cantidad > 0)
						{
							$nombre		=	$_POST['nombres_usu']." ".$_POST['primer_apellido_usu'];
							$var_envio = 			 enviarEmail($nombre,$_POST['correo_usu'],$var_asunto,$_POST['numero_documento_usu'],$_POST['login'],$var_cargo,$var_password);
							///////////cierre envio de copia al correo /////////////////////
							if ($var_envio==1)
								{
									$jTableResult['Result'] = "OK";
									$jTableResult['Message'] = "INFORMACION ACTUALIZADA CON EXITO.\nSE CONFIRMA EL ENVIO DE COPIA DE LA ACTUALIZACION AL CORREO REGISTRADO";
								}
							else
								{
									$jTableResult['Result']  = "ERROR....";
									$jTableResult['Message'] = "NO SE LOGRO ENVIAR COPIA AL CORREO. CONSULTE A SU PROVEEDOR.";
								}
						}
					else
						{
							$jTableResult['Result']  = "OK";
							$jTableResult['Message'] = "LOS DATOS FUERON REGISTRADOS CON EXITO. SIN COPIA AL CORREO";
						}
				}
			else{
					$jTableResult['Result'] 	= "ERROR";
					$jTableResult['Message'] 	= "NO SE PUDO ACTUALIZAR LA INFORMACION";
				}
			print json_encode($jTableResult);
		break;

		//////////////////////////////////////////////////////////////////////////////////////////
		case 'elimina_usuario':
			$query="DELETE FROM $db.usuario WHERE (id_usu = 	)";
			$conex->Execute($query);

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);
		break;

		//////////////////////////////////////////////////
		case 'carga_municipios':   //CARGA LOS MUNICIPIOS POR CENTRO
			$query="SELECT codigo_municipio, nombre_municipio
				FROM $db.municipio
				WHERE (codigo_dpto = '".$_POST['departamento']."')
				ORDER BY nombre_municipio";
			$result = $conex->Execute($query);
			$return_data="<option value='0'>...</option>";
			while (!$result->EOF) {
				$return_data .= "<option value='".$result->fields['codigo_municipio']."'>".utf8_encode($result->fields['nombre_municipio'])."</option>";
				$result->MoveNext();
			}
			echo $return_data;
		break;

		//////////////////////////////////////////////////
		case 'verificaLogin':
			$jTableResult = array();
					$query="SELECT 	id_usu
							FROM 	$db.usuario
							WHERE 	(numero_documento_usu = '".$_POST['numero_documento_usu']."')";
					$result = $conex->Execute($query);
					if ($result->recordcount()==0){
						$jTableResult['Result'] = "OK";
					}
					else{
						$jTableResult['Result'] = "ERROR";
						$jTableResult['Message'] = "Identificacion existente...";
					}
			print json_encode($jTableResult);
		break;
    }

    //******************** Cierre de  Conexion a la DB ********************
    $conex->Close();
    //******************** Cierre de  Conexion a la DB ********************
  }
  catch(Exception $ex) {
    $jTableResult = array();
    $jTableResult['Result'] = "ERROR";
    $jTableResult['Message'] = $ex->getMessage();
    print json_encode($jTableResult);
  }

?>