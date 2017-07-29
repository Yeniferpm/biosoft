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
		include('../etiquetas/'.$_SESSION['nombre_carpeta'].'/lbl_unidades.php');
		?>
		<html>
			<head>
				<title><?php echo $ttl_inc; ?></title>
				<link rel="stylesheet" type="text/css" href="../../css/css_cajas_btn.css" media="screen" />
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
						
					});		
				</script>
				
				<script type = "text/javascript">
					function verificar(var_recibida)
						{
							var seguir = true;
							var msj_concatenado = "Errores Encontrados <br> ";
							document.getElementById('option').value = var_recibida;
							if (document.frm_unidades.id_area.value=='0')
								{
									document.getElementById("div_msj").innerHTML += msj_concatenado + '* Nombre de area <br>';
									seguir = false;
								}
							if (document.frm_unidades.nombre_unidad.value=='')
								{
									document.getElementById("div_msj").innerHTML += '* Nombre de Unidad';
									seguir = false;
								}
							if (seguir == true)
								{
									frm_unidades.submit();
								}	
						}
						
					function modificar()
						{
							document.getElementById('option').value = "actualizar";
							frm_unidades.submit();
						}		
						
					function limpiar()
						{
							document.frm_unidades.id_area.value='0';
							document.frm_unidades.nombre_unidad.value='';
						}
						
					function escribir_div_msj(msj_recibido)
						{
							document.getElementById("div_msj").innerHTML = msj_recibido;
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
				</script>	
			</head>
			<body >
				<div class="container_12" >
					<div class="grid_10" align= 'center'>
						<div class="box round">
							<center>
								<form name='frm_unidades' target='operaciones' action='../controlador/ctrl_unidad.php' method='POST'>
									<input type='hidden' id='option' name='option'>
									<h1 ><?php echo $ttl_pag;?></h1>									
									<table  width='' align='center' >
										<tr>
											<td><?php echo $centro; ?></td>
											<td>
												<select type="text"  id='id_centro' name='id_centro' class="box-gray"   title="<?php echo $title_centro; ?>" required="" style="width:545px;cursor:pointer;"/>	
													<option value='0'>:.</option >
													<?php
														$query="select id_centro, nombre_centro from centro;";
														$result = $conex->Execute($query);
														while(!$result->EOF)
															{
																echo "<option value='".$result->fields['id_centro']."'>".utf8_encode($result->fields['nombre_centro'])."</option >";
																$result->MoveNext();
															}
													?>
												</select>
											</td>
										</tr>							
										<tr>
											<td><?php echo $nombre_areas; ?></td>
											<td>
												<select type="text"  id='id_area' name='id_area' class="box-gray" title="<?php echo $title_areas; ?>" style="width:545px;cursor:pointer;"/>	
												</select>
											</td>
										</tr>
										<tr>
											<td><?php echo $nombre_unidad; ?></td>
											<td><input onkeypress="return soloLetras(event)" type="text" class="box-gray" id="nombre_unidad" name="nombre_unidad" title='<?php echo $title_unidad;?>' required="debe ingrsar nombre de unidad" style="width:545px;cursor:pointer;" ></td>
										</tr>
										<tr>
											<td colspan='4' align='center' >
												<div id='div_msj' onmouseover='escribir_div_msj("");'>
												</div>
											</td>
										</tr>					
										<tr>
											<td colspan='4' align='center' >
												<button type='button' id='btn_guardar'  name='btn_guardar' class="box-gray" onclick='verificar("guardar");' title=<?php echo $title_btn_guardar;?> style='width:20p%'><?php echo $value_guardar;?></button >
												<button type='button' id='btn_limpiar' class="box-gray" class='btn btn-navy' name='btn_limpiar' onclick='limpiar();' title=<?php echo $title_btn_limpiar;?> style='width:20p%;cursor:pointer;'><?php echo $value_limpiar;?></button>
											</td>
										</tr>
									</table>
								</form>
							</center>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<iframe name='operaciones' style='display:none' width='100%' height=''></iframe>
				<div class="clear"></div>
				<div id="site_info"></div>
				<?php $conex->close();	?>
			</body>
		</html>
		<?php 
	} ?>
