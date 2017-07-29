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
// if (!conex){
	// echo "<script>Error...Al Conectar></script>";
	// die($err_conn_db);
	// exit;}
include_once '../etiquetas/ESP/lbl_programa_formacion.php';
?>
<html>
	<head>
		<title><?php echo $ttl_bienvenido; ?></title>
				<script src="../../herramientas/jquery/js/jquery.js"></script>
				<script type="text/javascript" language="javascript">
					$(document).ready(function () {
						
						$('#id_centro').change(function(){
							$.post("../controlador/ctrl_combos.php",{
								action       : 'buscar_areas',
								id_centro  : $('#id_centro').val()
							},function(data){
								$("#id_area").html(data.areas);
							},'json');
						});		
						
						$('#id_area').change(function(){
						$.post("../controlador/ctrl_combos.php",{
							action       : 'buscar_programas',
							id_area  : $('#id_area').val()
						},function(data){
							$("#id_programa").html(data.programas);
						},'json');
					});		
						
					});		
				</script>
		<script type = "text/javascript">
		function verificar(var_recibida)
				{
					// alert('si');
					var seguir = true;
					var msj_concatenado = "Errores Encontrados: <br>";
					document.getElementById('option').value = var_recibida;
					if (document.frm_programa.nombre_programa.value==''){
						// document.getElementById("nombre_programa").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += msj_concatenado +'* Nombre de Programa';
						seguir = false;
					}
					if (document.frm_programa.id_area.value==''){
						// document.getElementById("nombre_area").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '* Nombre de Area';
						seguir = false;
					}
					if (document.frm_programa.id_centro.value=='0'){
						// document.getElementById("nombre_area").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '* Nombre de centro';
						seguir = false;
					}
				if (seguir == true)
					{
						frm_programa.submit();
					}	
				}
			/*function enviar()
			{
				document.getElementById('option').value = "guardar";
				frm_programa.submit();
			}*/
			function modificar()
			{
				document.getElementById('option').value = "actualizar";
				frm_programa.submit();
				
			}
			function soloLetras(evt)
			{ 
				evt = (evt) ? evt : event; 
				var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : 
				((evt.which) ? evt.which : 0)); 
				if (charCode > 31 && (charCode < 64 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode > 32) && (charCode > 241 || charCode < 209)) 
					{ 
						return false; 
					} 
				else
					{		
						return true; 
					}
			}	
			function limpiar ()
				{
					document.frm_programa.reset();
					document.frm_programa.btn_actualizar.disabled=true;
					document.frm_programa.btn_eliminar.disabled=true;
					document.frm_programa.btn_guardar.disabled=false;
					document.frm_programa.btn_consultar.disabled=false;
					document.getElementById("nombre_area").className = '';
					document.getElementById("nombre_programa").className = '';
					
				}
			function escribir_div_msj(msj_recibido)
				{
					// alert('limpiar');
					document.getElementById("div_msj").innerHTML = msj_recibido;
				}				
		</script>
	</head>
		<body class="programa">
			<center>
			<form name='frm_programa' target='operaciones' action='../controlador/ctrl_grilla_programa.php' method='POST'>
				<input type='hidden' id='option' name='option'>
				<h1><?php echo $ttl_pag; ?></h1>
				<table border="0" width='60%' >
				<tr>
						<td><?php echo $nombre_centro; ?></td>
						<td>
							<select type="text"  id='id_centro' class="box-gray" name='id_centro' class="form-control"  title="<?php echo $title_area; ?>" required="" style="width:500px;cursor:pointer;" /> 
							<option value='0'>:..</option>
							<?php
								$query="SELECT centro.id_centro, nombre_centro FROM centro;";
								$result = $conex->Execute($query);
								while(!$result->EOF)
								{
									echo "<option value='".$result->fields['id_centro']."'>".$result->fields['nombre_centro']."</option>";
									$result->MoveNext();
								}
							?>
						    </select>
						</td>
					</tr>
					<tr>
						<td><?php echo $nombre_area; ?></td>
						<td>
							<select type="text"  id='id_area' name='id_area' class="form-control"  title="<?php echo $title_area; ?>" required="" style="width:500px;cursor:pointer;" /> 
								
							</select>
						</td>
					</tr>
					<tr>
						<td><?php echo $nombre_programa; ?></td>
						<td><input type="text" id='nombre_programa' name='nombre_programa' maxlength='60' class="form-control" onkeypress=" return soloLetras(event)"  title='<?php echo $title_nombre_programa; ?>' required="" style="width:245px;cursor:pointer;"/></td>
					</tr>
					<tr>
						<tr>
							<td colspan='4' align='center'>
								<div id='div_msj' onmouseover='escribir_div_msj("");'></div>
							</td>
						</tr>
					</tr>
				</table>
				<table>
					<tr>
						<td colspan='4' align='center' >
							<button type='button' id='btn_guardar' name='btn_guardar' onclick='verificar("guardar");' title='<?php echo $title_btn_guardar; ?>' style="width:20p%;cursor:pointer;" >
								<?php echo $value_guardar; ?>
							</button >
						</td>
					</tr>
				</table>
			</form>
			<iframe name='operaciones' style='display:none' width='100%' height=''></iframe>
			<?php $conex->close(); ?>
		</center>
	</body>
</html>
