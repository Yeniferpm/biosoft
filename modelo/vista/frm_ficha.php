<?php
include_once('../../include/vars.php');
include_once('ctrl_acceso.php');
include_once('ctrl_lenguaje.php');
@header('Context-Type: text/html; charset='.$charset);
@set_include_path(get_include_path().PATH_SEPARATOR .$PathApp);
@session_name($session_name);
@session_start();
if (!$conex){	echo "<script>alert('Error... Al Conectar');</script>";	}
else{
		include('../etiquetas/'.$_SESSION['nombre_carpeta'].'/lbl_ficha.php');
?>

<html>
	<head>
		<title><?php echo $ttl_bienvenido; ?></title>
		<link rel="stylesheet" href="../../css/cajas_style.css" type="text/css"/>
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
						$.post("../controlador/ctrl_combos_ficha.php",{
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
					var msj_concatenado = "Errores Encontrados: <br> ";
					document.getElementById('option').value = var_recibida;
					if (document.frm_ficha.codigo_ficha.value==''){
						// document.getElementById("codigo_ficha").style.borderColor ="#F91009";
						document.getElementById("div_msj").innerHTML += msj_concatenado + '* Codigo de Ficha';
						seguir = false;
					}
					if (document.frm_ficha.id_programa.value==''){
						// document.getElementById("nombre_programa").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML +=  '<br>* Nombre de Programa';
						seguir = false;
					}
					if (document.frm_ficha.id_area.value=='0'){
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

			function escribir_div_msj(msj_recibido)
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
			<form name='frm_ficha' target='operaciones' action='../controlador/ctrl_grilla_ficha.php' method='POST'>
				<input type='hidden' id='option' name='option'>
				<h1><font size="10" color="#00000"><?php echo $ttl_ficha; ?></FONT></h1>
				<table border="0" width='60%' >
					<tr>
						<td>centro</td>
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
						<td><?php echo $area; ?></td>
						<td>
							<select type="text"   class="box-gray" id='id_area' name='id_area' class="form-control"  title="<?php echo $title_area; ?>" required="" style="width:500px;cursor:pointer;" /> 
							
						    </select>
						</td>
					</tr>
					<tr>
						<td><?php echo $nombre_programa;?></td>
						<td>
							<select type="text" id='id_programa'  class="box-gray" name='id_programa' class="form-control"  title='<?php echo $title_nombre_programa; ?>' required="" style="width:500px;cursor:pointer;" />
							</select>
						</td>
					</tr>
					<tr>
						<td><?php echo $codigo_ficha;?></td>
						<td><input type="text" class="form-control" id="codigo_ficha" name="codigo_ficha"  maxlength='20' onkeypress=" return soloNumeros(event)" title='<?php echo $title_codigo_ficha;?>' required="" style="width:245px; cursor:pointer;"/> </td>
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
							<button type='button' id='btn_guardar' class='btn btn-navy' name='btn_guardar' onclick='verificar("guardar");' title='<?php echo $title_btn_guardar;?>' style="width:20p%;cursor:pointer;" >
								<?php echo $value_guardar; ?>
							</button >
						</td>
					</tr>
				</table>
			</form>
			<iframe name='operaciones' style='display:none' width='100%' height=''></iframe>
			<?php $conex->close(); 	?>
		</center>
	</body>
</html>
	<?php 
	} ?>