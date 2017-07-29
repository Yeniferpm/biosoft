<?php
include_once('../../include/vars.php'); //ruta relativa al directorio include
header('Context-Type: text/html; charset='.$charset);
set_include_path(get_include_path() .PATH_SEPARATOR .$PathApp);
session_name($session_name);
session_start();

include'../../herramientas/adodb5/adodb.inc.php';
//************INICIO CONEXION BASE DE DATOS**********//
$conex=NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!conex){
	echo "<script>Error...Al Conectar></script>";
	die($err_conn_db);
	exit;}
include_once '../etiquetas/ESP/lbl_ficha.php';
?>
<html>
	<head>
		<title><?php echo $ttl_bienvenido; ?></title>
		<script type = "text/javascript">
			function verificar(var_recibida)
				{
					// alert('si');
					var seguir = true;
					var msj_concatenado = "Errores Encontrados <br> ";
					document.getElementById('option').value = var_recibida;
					if (document.frm_ficha.codigo_ficha.value==''){
						// document.getElementById("codigo_ficha").style.borderColor ="#F91009";
						document.getElementById("div_msj").innerHTML += msj_concatenado + '* Codigo de Ficha';
						seguir = false;
					}
					if (document.frm_ficha.nombre_programa.value=='0'){
						// document.getElementById("nombre_programa").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML +=  '<br>* Nombre de Programa';
						seguir = false;
					}
					if (document.frm_ficha.nombre_area.value=='0'){
						// document.getElementById("nombre_area").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* Nombre de Area';
						seguir = false;
					}
				if (seguir == true)
					{
						frm_ficha.submit();
					}	
				}
			// function enviar()
				// {
					// document.getElementById('option').value = "guardar";
					// frm_ficha.submit();
				// }
			function modificar()
				{
					document.getElementById('option').value = "actualizar";
					frm_ficha.submit();
					
				}		
			function soloNumeros(e)
				{
					var key = window.Event ? e.which : e.keyCode
					return ((key >= 48 && key <= 57)||(key == 8))
				}	

			function escribir_div_msj(msj_recibida)
				{
					// alert('limpiar');
					document.getElementById("div_msj").innerHTML = msj_recibido;
				}
function limpiar ()
				{
					document.frm_ficha.reset();
					document.frm_ficha.btn_actualizar.disabled=true;
					document.frm_ficha.btn_eliminar.disabled=true;
					document.frm_ficha.btn_guardar.disabled=false;
					document.frm_ficha.btn_consultar.disabled=false;
					document.getElementById("nombre_area").className = '';
					document.getElementById("codigo_ficha").className = '';
					document.getElementById("nombre_programa").className = '';
				}				
		</script>	
	</head>
	<body class="ficha" >
		<center>
			<form name='frm_ficha' target='operaciones' action='../controlador/ctrl_ficha.php' method='POST'>
				<input type='hidden' id='option' name='option' >
				<h1 ><font size="10" color="#00000"><?php echo $ttl_ficha; ?></FONT></h1>
				<table border="0" width='60%' >
					<tr>
						<td><?php echo $codigo_ficha;?></td>
						<td><input type="text" class="form-control"   id="codigo_ficha" name="codigo_ficha"  title='<?php echo $title_codigo_ficha;?>' required="" style="width:245px; cursor:pointer;"/> </td>
					</tr>
					<tr>
						<td><?php echo $nombre_programa; ?></td>
						<td>
							<select type="text" id='nombre_programa' name='nombre_programa' class="form-control"  title='<?php echo $title_nombre_programa; ?>' required="" style="width:500px;cursor:pointer;"   />
							<option value='0'>:..</option >
							<?php
								$query="SELECT programa_formacion.nombre_programa FROM programa_formacion;";
								$result = $conex->Execute($query);
								while(!$result->EOF)
								{
									echo "<option value='".$result->fields['nombre_programa']."'>".$result->fields['nombre_programa']."</option>";
									$result->MoveNext();
								}
							?>
						</td>
					</tr>
					<tr>
						<td><?php echo $area; ?></td>
						<td>
							<select type="text"  id='nombre_area' name='nombre_area' class="form-control"  title="<?php echo $title_area; ?>" required="" style="width:500px;cursor:pointer;" /> 
							<option value='0'>:..</option>
							<?php
								$query="SELECT areas.nombre_area FROM areas;";
								$result = $conex->Execute($query);
								while(!$result->EOF)
								{
									echo "<option value='".$result->fields['nombre_area']."'>".$result->fields['nombre_area']."</option>";
									$result->MoveNext();
								}
							?>
						</td>
					</tr>
					<tr>
						<tr>
							<td colspan='4' align='center' >
								<div id='div_msj' >
								</div>
							</td>
						</tr>
					</tr>
				</table>
				<table><br><br><br>
					<tr>
						<td colspan='4' align='center' >
							<button type='button' id='btn_guardar' name='btn_guardar' onclick='verificar("guardar");' title='<?php echo $title_btn_guardar;?>' style='width:20p%' >
								<?php echo $value_guardar; ?>
							</button >
							<button type='button'  id='btn_actualizar' onclick="modificar ();" name='btn_actualizar' title='<?php echo $title_btn_actualizar;?>' style='width:20p%' >
								<?php echo $value_actualizar; ?>
							</button >
							<button type='button' id='btn_buscar'  name='btn_buscar' title='<?php echo $title_btn_consultar;?>' style='width:20p%' >
								<?php echo $value_consultar; ?>
							</button >
							<button type='button' id='btn_cancelar'  name='btn_cancelar' title='<?php echo $title_btn_cancelar;?>' style='width:20p%' onclick='limpiar();' >
								<?php echo $value_cancelar; ?>
							</button >
						</td>
					</tr>
				</table>
			</form>
			<iframe name='operaciones' style='display:yes' width='100%' height=''></iframe>
			<?php $conex->close(); 	?>
		</center>
	</body>
</html>