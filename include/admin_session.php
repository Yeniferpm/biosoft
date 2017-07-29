<?php
//ruta al archivo que contiene los datos de entrada 
include('vars.php');
header("Content-Type: text/html; charset=".$charset);
set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
//para hacer funcionar variables de sesion
session_name($session_name);
session_start();
//inicio de conexion a base de datos//
include ('../herramientas/adodb5/adodb.inc.php');
$conex = NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!$conex) {
	echo "<br>Error<br>";
	die($err_conn_db);
	// exit;
}
switch ($_REQUEST['action'])
	{
		case 'ingles':
			$query="update lenguaje set opcion = 0 ";
			$result = $conex->Execute($query);
			$query="update lenguaje set opcion = 1 where lenguaje = 'ingles'; ";
			$result = $conex->Execute($query);
		break;
		case 'espanol':
			$query="update lenguaje set opcion = 0 ";
			$result = $conex->Execute($query);
			$query="update lenguaje set opcion = 1 where lenguaje = 'Espanol'; ";
			$result = $conex->Execute($query);		
		break;		
		case 'login':
			$query="SELECT 	registro_usuario.id_usuario, registro_usuario.n_documento, concat(registro_usuario.nombres, ' ', registro_usuario.apellidos) as usu_log,  
							registro_usuario.celular,  registro_usuario.correo_usuario,
							registro_usuario.clave,  registro_usuario.id_tipo_documento,  registro_usuario.id_rol, rol.nombre_rol,
							registro_usuario.codigo_ficha,  estado.nombre_estado,  tipo_documento.nombre_tipo_documento,
							registro_usuario.id_estado,  rol.nombre_rol,  programa_formacion.nombre_programa,
							ficha.id_programa,  areas.nombre_area,  ficha.id_area,  centro.nombre_centro,  centro.id_regional,
							regional.nombre_regional
					FROM 	$db.registro_usuario
							INNER JOIN estado ON estado.id_estado = registro_usuario.id_estado
							INNER JOIN tipo_documento ON tipo_documento.id_tipo_documento = registro_usuario.id_tipo_documento
							INNER JOIN rol ON rol.id_rol = registro_usuario.id_rol 
							INNER JOIN ficha ON ficha.codigo_ficha = registro_usuario.codigo_ficha
							INNER JOIN programa_formacion ON programa_formacion.id_programa = ficha.id_programa
							INNER JOIN areas ON areas.id_area = ficha.id_area
							INNER JOIN centro ON centro.id_centro = areas.id_centro
							INNER JOIN regional ON regional.id_regional = centro.id_regional
					WHERE 	registro_usuario.n_documento = ('".($_POST['n_documento'])."')
					AND		registro_usuario.clave = ('".($_POST['clave'])."');
					";		
			// echo $query; 	
			// exit;
			$result = $conex->Execute($query);
			if ($result->fields['id_usuario'] >0) 
			{//se debe validar el rol de Manager, Aprendiz y Administrador.
					if ($result->fields['id_rol']=='1') 
						{
							$_SESSION['id_usuario']=trim($result->fields['id_usuario']);
							$_SESSION['n_documento']=trim($result->fields['n_documento']);
							$_SESSION['usu_log']=trim($result->fields['usu_log']);
							$_SESSION['celular']=trim($result->fields['celular']);
							$_SESSION['correo_usuario']=trim($result->fields['correo_usuario']);
							$_SESSION['clave']=trim($result->fields['clave']);
							$_SESSION['id_estado']=trim($result->fields['id_estado']);
							$_SESSION['id_tipo_documento']=trim($result->fields['id_tipo_documento']);
							$_SESSION['id_rol']=trim($result->fields['id_rol']);
							$_SESSION['nombre_rol']=utf8_encode(trim($result->fields['nombre_rol']));
							$_SESSION['codigo_ficha']=trim($result->fields['codigo_ficha']);
							echo"<script>parent.location.href='../modelo/vista/frm_cabecera.php'</script>";						
						}
					else
						{
							echo"<script>parent.msj_controlador('USUARIO NO ACTIVO.');</script>";
							echo"<script>parent.limpiar();</script>";									
						}
			}
			else 
			{
					echo"<script>parent.msj_controlador('USUARIO NO IDENTIFICADO.')</script>";
					echo"<script>parent.limpiar();</script>";													
			}
		break;
		
		case 'salir':
				session_start();
				$url=$_SESSION[PathApp];
				unset($_SESSION['id_usuario']);
				unset($_SESSION['n_documento']);
				unset($_SESSION['usu_log']);
				// unset($_SESSION['apellidos']);
				unset($_SESSION['celular']);
				unset( $_SESSION['correo_usuario']);
				unset( $_SESSION['clave']);
				unset( $_SESSION['id_estado']);
				unset( $_SESSION['id_tipo_documento']);
				unset( $_SESSION['id_rol']);
				unset( $_SESSION['codigo_ficha']);
				unset( $_SESSION['nombre_carpeta']);
				session_destroy();
				echo"<script>parent.location.href='../index.php'</script>";
			break;
	}
$conex->Close();
?>