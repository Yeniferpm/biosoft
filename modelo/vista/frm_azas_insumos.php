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
		include('../etiquetas/'.$_SESSION['nombre_carpeta'].'/lbl_azas_insumos.php');
		?>
		<html>
		<head>
			<title><?php echo $ttl_pag; ?></title>
			<link rel="stylesheet" type="text/css" href="../../css/css_cajas_btn.css" media="screen" />
			<script type = "text/javascript">
				$(document).ready(function (){
					$('#formato_ingreso').change(function(){
						if($('#formato_ingreso').val() == '1' )
						{  $('#nombre_unidad').attr('disabled', 'disabled');     }
						else if(($('#formato_ingreso').val() == '2' ) || ($('#formato_ingreso').val() == '3' ) ||($('#formato_ingreso').val() == '4' ))
						{   $('#nombre_unidad').removeAttr("disabled");  }
					});				
				});
			</script>
			<script type="text/javascript" language="javascript">
					$(document).ready(function () {
						
						$('#id_area').change(function(){
							$.post("../controlador/ctrl_combos.php",{
								action       : 'buscar_unidades',
								id_area  : $('#id_area').val()
							},function(data){
								$("#id_unidad").html(data.azas);
							},'json');
						});				
						
					});		
				</script>
			<script type = "text/javascript">
					function verificar(var_recibida)
						{
							// alert('si');
							var seguir = true;
							var msj_concatenado = "Errores Encontrados <br> ";
							document.getElementById('option').value = var_recibida;
							if (document.frm_azas_insumos.azas_ins.value==''){
								// document.getElementById("codigo_ficha").style.borderColor ="#F91009";
								document.getElementById("div_msj").innerHTML += msj_concatenado + '* Nombre';
								seguir = false;
							}
							if (document.frm_azas_insumos.formato_ingreso.value=='0'){
								// document.getElementById("nombre_programa").style.borderColor= "#F91009";
								document.getElementById("div_msj").innerHTML +=  '<br>* Formato Ingreso';
								seguir = false;
							}
							
						if (seguir == true)
							{
								frm_azas_insumos.submit();
							}	
						}
					function modificar()
						{
							document.getElementById('option').value = "actualizar";
							frm_azas_insumos.submit();
							
						}		
					function soloLetras(evt)
					{ 
						evt = (evt) ? evt : event; 
						var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : 
						((evt.which) ? evt.which : 0)); 
						if (charCode > 31 && (charCode < 64 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode > 32) && (charCode > 241 || charCode < 209)) 
						{ 
							//alert("Solo se permiten letras en este campo.");
							return false; 
						} 
						else
						{		
							return true; 
						}
					}
					function limpiar()
						{
							document.frm_azas_insumos.formato_ingreso.value='0';
							document.frm_azas_insumos.nombre_unidad.value='0';
							document.frm_azas_insumos.azas_ins.value='';
							
						}
					function escribir_div_msj(msj_recibido)
						{
							// alert('limpiar');
							document.getElementById("div_msj").innerHTML = msj_recibido;
						}	
				</script>	
			</head>
			<body class="azas_insumos">
				<center>
					<form name='frm_azas_insumos' target='operaciones' action='../controlador/ctrl_azas_insumos.php' method='POST'>
						<input type='hidden' id='option' name='option' >
						<h1><font size="5" color="#00000"><?php echo $ttl_inc; ?></FONT></h1>
						<table border="0" width='60%' >
							<tr>
								<td COLSPAN='2' ><?php echo $tipo_ingreso; ?></td>
							</tr>
							<tr>
								<td COLSPAN='2'  >
									<select id="formato_ingreso" name="formato_ingreso" class="box-gray" Title="<?php echo $title_tipo_ingreso;?>" style='width:245px;cursor:pointer;'>
										<option value='0'></option >
										<?php
											$query="SELECT
													tipo_ingreso.nombre_tipo_ingreso, tipo_ingreso.id_tipo_ingreso
													FROM
													tipo_ingreso;";
											$result = $conex->Execute($query);
											while(!$result->EOF)
											{
												echo "<option value='".$result->fields['id_tipo_ingreso']."'>".$result->fields['nombre_tipo_ingreso']."</option >";
												$result->MoveNext();
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo $areas; ?></td>
								<td>
									<select type="text"  id='id_area' name='id_area' class="box-gray"  title="<?php echo $title_area; ?>" required="" style="width:300px;cursor:pointer;"/>	
										<option value='0'>:.</option >
										<?php
											$query="select id_area, nombre_area from areas;";
											$result = $conex->Execute($query);
											while(!$result->EOF)
												{
													echo "<option value='".$result->fields['id_area']."'>".utf8_encode($result->fields['nombre_area'])."</option >";
													$result->MoveNext();
												}
										?>
									</select>
								</td>
							</tr>							
							<tr>
								<td><?php echo $unidad; ?></td>
								<td>
									<select type="text"  id='id_unidad' name='id_unidad' class="box-gray"  title="<?php echo $title_unidades; ?>" style="width:300px;cursor:pointer;"/>	
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo $nombre; ?></td>
								<td><input onkeypress="return soloLetras(event)" type="text" class="box-gray" id='azas_ins' name='azas_ins' Title="<?php echo $title_nombre;?>" placeholder="" style='width:300px;cursor:pointer;'></td>
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
									<button type='button' id='btn_guardar' class="box-gray" name='btn_guardar' class='btn btn-navy' onclick='verificar("guardar");' title=<?php echo $title_btn_guardar;?> style='width:20p%;cursor:pointer;'><?php echo $value_guardar;?></button >
									<button type='button' id='btn_limpiar' class="box-gray" class='btn btn-navy' name='btn_limpiar' onclick='limpiar();' title=<?php echo $title_btn_limpiar;?> style='width:20p%;cursor:pointer;'><?php echo $value_limpiar;?></button>
								</td>
							</tr>
						</table>
					</form>
					<iframe name='operaciones' style='display:none' width='100%' height=''></iframe>
					<?php	$conex->close();?>
			</body>
		</html>
		<?php 
	} ?>
