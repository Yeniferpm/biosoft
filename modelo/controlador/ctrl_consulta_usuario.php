<?php
header("Content-Type: text/html; charset=iso-8859-1");
require_once('include/vars.php');	//ruta relativa al directorio include
set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
//chdir($PathApp);
session_name($session_name);
session_start();
include('etiquetas/lbl_consulta_usuario.php');
include ('herramientas/adodb5/adodb.inc.php');
require_once('herramientas/swiftmailer/swift_required.php');
if (!$_SESSION['cod_usuario']){
	header("Location: ".$_SESSION[UrlApp]."/index.php");
}

else if ($_SESSION['cod_usuario']){
//******************** Inicio Conexion a la DB ********************
$conex = NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
 //echo "dentro";
//exit;

if (!$conex) {
	echo "<br>Error<br>";
	die($err_conn_db);
	exit;
}
	
	$var_estado_bus=$_POST['opcion'];
	$var_dato_bus=$_POST['dato_b'];
	if($var_estado_bus==1){  $var_sql_01=" WHERE numero_identificacion LIKE  '%$var_dato_bus%'" ;}
	if($var_estado_bus==2){  $var_sql_01=" WHERE primer_apellido_us LIKE '%$var_dato_bus%'" ; 	}
	if($var_estado_bus==3){  $var_sql_01=" WHERE segundo_apellido_us LIKE '%$var_dato_bus%'" ; 	}
	if($var_estado_bus==4){  $var_sql_01=" WHERE id_estado LIKE  '%$var_dato_bus%'" ; 		}
	if($var_estado_bus==5){  $var_sql_01=" " ; 		}

	$sql="	SELECT
		  usuario.id_usuario,
		  usuario.fecha_registro,
		  usuario.nombre_usuario,
		  usuario.primer_apellido_us,
		  usuario.segundo_apellido_us,
		  usuario.numero_identificacion,
		  usuario.telefono_us,
		  usuario.direccion_us,
		  usuario.correo_us,  
		  usuario.clave,
		  tipo_identificacion.id_tipo_identificacion,
		  tipo_identificacion.tipo_identificacion,
		  roll.id_roll,
		  roll.descripcion_roll,
		  estado.estado,
		  estado.id_estado,
		  centro.id_centro,
		  centro.nombre_centro
		FROM
		  $db.usuario
		  INNER JOIN tipo_identificacion ON tipo_identificacion.id_tipo_identificacion = usuario.id_tipo_identificacion
		  INNER JOIN roll ON roll.id_roll = usuario.id_roll
		  INNER JOIN estado ON estado.id_estado = usuario.id_estado
		  INNER JOIN centro ON centro.id_centro = usuario.id_centro
					$var_sql_01;";	
					
		// echo "<br>$sql";
		// exit;
		echo"<link href='../../css/estilos_tablas.css' rel='stylesheet' type='text/css' ><br><br>
		<link rel='stylesheet' type='text/css' media='all' href='../../css/estilo-DB.css'>
		<table width='100%' bgcolor='#f5f5f5' border='1' align='center' cellpadding='0' cellspacing='0' height=''>
				";	
		$v=1;
		$row=$conex->Execute($sql);
		if($row->fields[id_usuario]>0)
		{
			echo "<tr>
					<td colspan='18' class='td_titulo2' align='center'>datos encontrados</TD>
				</tr>
				<tr>	
                    <td class='td_titulo_1_2'>op</td>				
					<td class='td_titulo_1_2'>Numero Identificación</td>
					<td class='td_titulo_1_2'>Nombres</td>
					<td class='td_titulo_1_2'>Primer Apellido</td>
					<td class='td_titulo_1_2'>Segundo Apellido</td>
					<td class='td_titulo_1_2'>Rol Descripcion</td>
					
				</tr>";
			while (!$row->EOF) 
				{
					echo "<tr>";
					if ($var_class=='1')
							{
								$var_etiqueta="class='td_titulo_1_3'";
								$var_class=0;
							}			
							else
							{
								$var_etiqueta="class='td_titulo_2_3'";
								$var_class=1;
							}
				 echo "
				 
				 <td $var_etiqueta><input type='radio' name='sele' id='sele' title='Opcion' style='cursor:pointer' 
							onclick=\"parent.parent.document.frm_usuario.fecha_registro.value='".$row->fields[fecha_registro]."';
							parent.parent.document.frm_usuario.nombre_usuario.value='".$row->fields[nombre_usuario]."';
							parent.parent.document.frm_usuario.primer_apellido_us.value='".$row->fields[primer_apellido_us]."';
							parent.parent.document.frm_usuario.segundo_apellido_us.value='".$row->fields[segundo_apellido_us]."';
							parent.parent.document.frm_usuario.id_tipo_identificacion.value='".$row->fields[id_tipo_identificacion]."';
							parent.parent.document.frm_usuario.numero_identificacion.value='".$row->fields[numero_identificacion]."';
							parent.parent.document.frm_usuario.telefono_us.value='".$row->fields[telefono_us]."';
							parent.parent.document.frm_usuario.direccion_us.value='".$row->fields[direccion_us]."';
							parent.parent.document.frm_usuario.correo_us.value='".$row->fields[correo_us]."';
							parent.parent.document.frm_usuario.id_roll.value='".$row->fields[id_roll]."';
							parent.parent.document.frm_usuario.clave.value='".$row->fields[clave]."';
							parent.parent.document.frm_usuario.id_estado.value='".$row->fields[id_estado]."';
							parent.parent.document.frm_usuario.id_usuario.value='".$row->fields[id_usuario]."';
							parent.parent.document.frm_usuario.id_centro.value='".$row->fields[id_centro]."';
							parent.parent.document.frm_usuario.btn_guardar.disabled=true;	
						    parent.parent.document.frm_usuario.btn_actualizar.disabled=false;	
							parent.parent.document.frm_usuario.btn_eliminar.disabled=false;
							parent.parent.document.frm_usuario.btn_consultar.disabled=true;	
							window.parent.parent.$('#ventana1').dialog('close');
						\"></td>";
						echo "<td >".$row->fields[numero_identificacion]."</td>";
						echo "<td >".$row->fields[nombre_usuario]."</td>";					
						echo "<td >".$row->fields[primer_apellido_us]."</td>";
						echo "<td >".$row->fields[segundo_apellido_us]."</td>";				
						echo "<td >".$row->fields[descripcion_roll]."</td>";	
						$row->MoveNext();
				}
				echo "</tr>
				<tr>
				<td colspan='4' align='center'>
				<a href='ctrl_excel_usuario.php?opcion=<?php echo $var_estado_bus;?>&&dato_b=<?php echo $var_dato_bus?>'>
				<img src='../../imagenes/descargar.png' widht='150' height='40' border='0'>
				</a>
				</td>
				</tr>";				
		}
	 else
		{
			echo "<tr>
					<td colspan='18' class='td_titulo2' align='center'>NO SE ENCONTRAON COINCIDENCIAS</TD>
				</tr>";
		}
		echo "</table>";
		
	 $conex->Close();
	}
?>

