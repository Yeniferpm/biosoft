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
		include('../etiquetas/'.$_SESSION['nombre_carpeta'].'/lbl_regional.php');
		?>
		<html>
			<head> 
				<title>regional</title>
				<link rel="shortcut icon" href="../../imagenes/sena icono.png" />
				<!link href='../../css/css_Biofabrica/style.css' rel='stylesheet' type='text/css'>
				<!img src="../../imagenes/biosoft.jpg" width="100%" height="20%">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<script type="text/javascript">
					function verificar(var_recibida)
						{
								// alert('si');
								var seguir = true;
								var msj_concatenado = "Errores Encontrados <br> ";
									document.getElementById('option').value = var_recibida;
								if (document.frm_regional.nombre_regional.value=='')
								{
									// document.getElementById("nombre_regional").style.borderColor ="#F91009";
									document.getElementById("div_msj").innerHTML += msj_concatenado + '* nombre de regional';
									seguir = false;
								}
								if (document.frm_regional.direccion_regional.value=='')
								{
									// document.getElementById("direccion_regional").style.borderColor= "#F91009";
									document.getElementById("div_msj").innerHTML +=  '<br>* direccion regional';
									seguir = false;
								}
								if (document.frm_regional.telefono_regional.value=='')
								{
									// document.getElementById("telefono_regional").style.borderColor= "#F91009";
									document.getElementById("div_msj").innerHTML += '<br>* telefono regional';
									seguir = false;
								}
								if (document.frm_regional.id_municipio.value=='')
								{
									// document.getElementById("codigo_Municipio").style.borderColor= "#F91009";
									document.getElementById("div_msj").innerHTML += '<br>* codigo Municipio';
									seguir = false;
								}
								if (document.frm_regional.codigo_regional.value=='')
								{
									// document.getElementById("codigo_regional").style.borderColor= "#F91009";
									document.getElementById("div_msj").innerHTML += '<br>* codigo_regional';
									seguir = false;
								}	
								if (document.frm_regional.correo_regional.value=='')
								{
									// document.getElementById("correo_regional").style.borderColor= "#F91009";
									document.getElementById("div_msj").innerHTML += '<br>* correo_regional';
									seguir = false;
								}
								if (seguir == true)
								{
									frm_regional.submit();
								}	
						}
							// function enviar()
								// {
									// document.getElementById('option').value = "guardar";
									// frm_regional.submit();
								// }
								function modificar()
									{
										document.getElementById('option').value = "actualizar";
										frm_regional.submit();
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
								function soloNumeros(e)
									{
										var key = window.Event ? e.which : e.keyCode
										return ((key >= 48 && key <= 57)||(key == 8))
									}	
								function cancelar() 
									{
										document.frm_regional.codigo_regional.value= "";
										document.frm_regional.nombre_regional.value= "";										
										document.frm_regional.direccion_regional.value= "";
										document.frm_regional.telefono_regional.value= "";
										document.frm_regional.correo_regional.value= "";
										document.frm_regional.id_municipio.value= "";
									}	
								function escribir_div_msj(msj_recibido)
									{
										// alert('limpiar');
										document.getElementById("div_msj").innerHTML = msj_recibido;
									}
				</script>
			</head>

			<body class="regional">
				<form name='frm_regional' target='operaciones' action='../controlador/ctrl_regional.php' method='POST'8>
								<input type='text' id='option' name='option' style="display:none;"/>
								<center> <h1><?php echo $ttl_pag; ?></h1></center>
								<center>
									<table width="900" border="0" colspan="4">
										<br>
										<tr>
											<td width="50"><?php echo $ttl_nombre;?></td>
											<td width="144">
											<input type="text" style='cursor:pointer' title='<?php echo $title_nombre; ?>' name="nombre_regional" id="nombre_regional" onkeypress=" return soloLetras(event)"  />
											</td>
											<td> <?php echo $ttl_codigo_municipio;?></td>
											<td><select style="width:390;cursor:pointer" title='<?php echo $title_codigo_municipio; ?>' name="id_municipio" id="id_municipio">
													<option value='0' >:.</option>
													<?php
														$query='SELECT municipio.id_municipio, municipio.nombre_municipio FROM municipio';
														$result = $conex->Execute($query);
														while (!$result->EOF)
														{
															echo "<option value='".$result->fields['id_municipio']."'>".$result->fields['nombre_municipio']."</option>";
															$result->MoveNext();
														} 
													?>	
												</select>
											</td>
										</tr>
										<tr>
											<td> <?php echo $ttl_direccion; ?> </td>
											<td>
												<input type="text" style='cursor:pointer' title='<?php echo $title_direccion; ?>' name="direccion_regional" id="direccion_regional" />
												<td width="900"><?php echo $ttl_codigo_regional; ?></td>
											</td>
											<td width="0">
												<input style="width:390;cursor:pointer " type="text" title='<?php echo $title_codigo_regional; ?>' name="codigo_regional" id="codigo_regional" onkeypress=" return soloNumeros(event)" />
											</td>
										</tr>
										<tr>
											<td> <?php echo $ttl_telefono; ?></td>
											<td>
											  <input type="text" style='cursor:pointer' title='<?php echo $title_telefono; ?>' name="telefono_regional" id="telefono_regional" onkeypress=" return soloNumeros(event)" />
											</td>
											<td><?php echo $ttl_correo; ?> </td>
											<td width="5">
											  <input style="width:390; cursor:pointer" type="text" title='<?php echo $title_correo; ?>' name="correo_regional" id="correo_regional" />
											</td>
										</tr>
										<tr>
											<td colspan='4' align='center'>
												<div id='div_msj' onmouseover='escribir_div_msj("");'>
												</div>
											</td>
										</tr>
									</table> 
								</center>
						<br/><br/><br/><br/>
							<center>	
									<tr>
										<td colspan='4'  >
											<button type='button' id='btn_guardar' name='btn_guardar' class='btn btn-navy' onclick='verificar("guardar");' title='' style='width:20p%' >
												GUARDAR
											</button >
											<button type='button' id='btn_cancelar' class='btn btn-navy' name='btn_cancelar' title='' style='width:20p%' onclick='cancelar();' >
												LIMPIAR
											</button >
										</td>
							</center></tr>
						<?php
							$conex->Close();
						?>
				</form>	
				<iframe name='operaciones' style='display:none'	width='100%'height=''></iframe> 	
			</body>
		</html>
		
		<?php 
	} ?>
