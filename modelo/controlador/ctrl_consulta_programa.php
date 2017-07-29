<?php
include_once('include/vars.php');
header('Context-Type: text/html; charset='.$charset);
set_include_path(get_include_path() .PATH_SEPARATOR .$PathApp);
session_name($session_name);
session_start();
include'herramientas/adodb5/adodb.inc.php';
//************INICIO CONEXION BASE DE DATOS**********//
$conex=NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!conex){
	echo "<script>Error...Al Conectar></script>";
	die($err_conn_db);
	exit;}

else if ($_SESSION['nombre_programa']){

if (!$conex) {
	echo "<br>Error<br>";
	die($err_conn_db);
	exit;
}
	
	$var_estado_bus=$_POST['opcion'];
	$var_dato_bus=$_POST['dato_b'];
	
	if($var_estado_bus==1){  $var_sql_01=" WHERE nombre_programa LIKE '%$var_dato_bus%'" ; 	}
	if($var_estado_bus==2){  $var_sql_01="" ; 	}
	$sql="	SELECT 	programa_formacion.nombre_programa
			FROM 	$db.programa_formacion
					$var_sql_01;";	
		// echo "<br>$sql";
		// exit;
		echo"<link href='../../css/estilos_tablas.css' rel='stylesheet' type='text/css' ><br><br>
		<link rel='stylesheet' type='text/css' media='all' href='../../css/estilo-DB.css'>
		<table width='100%' bgcolor='#f5f5f5' border='1' align='center' cellpadding='0' cellspacing='0' height=''>
				";	
		$v=1;
		$row=$conex->Execute($sql);
		if($row->fields[nombre_programa]>0)
		{
			echo "<tr>
					<td colspan='18' class='td_titulo2' align='center'>datos encontrados</TD>
				</tr>
				<tr>
					<td class='td_titulo_1_2'>op</td>
					<td class='td_titulo_1_2'>NOMBRE PROGRAMA</td>
					<td class='td_titulo_1_2'>TODO</td>
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
				 
						
						echo "<td $var_etiqueta><input type='radio' name='sele' id='sele' title='Opcion' style='cursor:pointer' 
						onclick=\"
						
							parent.parent.document.frm_programa.nombre_programa.value='".$row->fields[nombre_programa]."';
							parent.parent.document.frm_programa.btn_guardar.disabled=true;	
						    parent.parent.document.frm_programa.btn_actualizar.disabled=false;	
							parent.parent.document.frm_programa.btn_eliminar.disabled=false;
							parent.parent.document.frm_programa.btn_consultar.disabled=true;	
							window.parent.parent.$('#ventana1').dialog('close');
						
						\"></td>";
				 
						echo "<td >".$row->fields[nombre_programa]."</td>";
					
						$row->MoveNext();
						
				}
				echo "</tr>
				<tr>
				<td colspan='4' align='center'>
				<a href='ctrl_excel_programa.php?opcion=<?php echo $var_estado_bus;?>&&dato_b=<?php echo $var_dato_bus?>'>
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