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
		include('../etiquetas/'.$_SESSION['nombre_carpeta'].'/lbl_centro.php');
		?>

		<html>
			<head>
				<title>centro</title>
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
							if 	(document.frm_centro.codigo_centro.value=='')
							{
								// document.getElementById("codigo_centro").style.borderColor ="#F91009";
								document.getElementById("div_msj").innerHTML += msj_concatenado + '* codigo centro';
								seguir = false;
							}
							if (document.frm_centro.nombre_centro.value=='')
							{
								// document.getElementById("nombre_centro").style.borderColor= "#F91009";
								document.getElementById("div_msj").innerHTML +=  '<br>* nombre centro';
								seguir = false;
							}
							if (document.frm_centro.telefono_centro.value=='')
							{
								// document.getElementById("telefono_centro").style.borderColor= "#F91009";
								document.getElementById("div_msj").innerHTML += '<br>* telefono centro';
								seguir = false;
							}
							if (document.frm_centro.direccion_centro.value=='')
							{
								// document.getElementById("direccion_centro").style.borderColor= "#F91009";
								document.getElementById("div_msj").innerHTML += '<br>* direccion centro';
								seguir = false;
							}
							if (document.frm_centro.correo_centro.value=='')
							{
								// document.getElementById("correo_centro").style.borderColor= "#F91009";
								document.getElementById("div_msj").innerHTML += '<br>* correo centro';
								seguir = false;
							}
							if (document.frm_centro.id_regional.value=='')
							{
								// document.getElementById("id_regional").style.borderColor= "#F91009";
								document.getElementById("div_msj").innerHTML += '<br>* codigo regional';
								seguir = false;
							}
							if (seguir == true)
							{
								frm_centro.submit();
							}	
						}
								// function enviar()
									// {
										// document.getElementById('option').value = "guardar";
										// frm_centro.submit();
									// }
							function modificar()
							{
								document.getElementById('option').value = "actualizar";
								frm_centro.submit();
							
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
									document.frm_centro.codigo_centro.value= "";
									document.frm_centro.nombre_centro.value= "";										
									document.frm_centro.telefono_centro.value= "";
									document.frm_centro.direccion_centro.value= "";
									document.frm_centro.correo_centro.value= "";
									document.frm_centro.id_regional.value= "";
								}	
								function escribir_div_msj(msj_recibido)
								{
									// alert('limpiar');
									document.getElementById("div_msj").innerHTML = msj_recibido;
								}
				</script>
			</head>

			<body class="centro">
				<form name='frm_centro' target='operaciones'  action='../controlador/ctrl_centro.php' method='POST'>
							<input type='text' id='option' name='option' style="display:none;">
							<center> <h1><?php echo  $ttl_pag; ?></h1></center>
							<center>
						<table width="900" border="0" colspan="4">
							<br>
							<tr>
									<td width="50"><?php echo $ttl_codigo;?></td>
									<td width="144">
									<input type="text" style='cursor:pointer' title='<?php echo $title_codigo; ?>' name="codigo_centro" id="codigo_centro" onkeypress=" return soloNumeros(event)"/>
									</td>
									<td> <?php echo $ttl_codigo_regional;?></td>
									<td width="800">
				
										<select style="width:390;cursor:pointer" title='<?php echo $title_codigo_regional; ?>' name="id_regional" id="id_regional"style="width:390">
											<option value='0' >:.</option>
														<?php
															$query='SELECT regional.id_regional, regional.nombre_regional FROM regional';
																	$result = $conex->Execute($query);
																	while (!$result->EOF)
															{
																echo "<option value='".$result->fields['id_regional']."'>".$result->fields['codigo_regional']." ".$result->fields['nombre_regional']."</option>";
																$result->MoveNext();
															} 
														?>	
										</select>
									</td>
							</tr>
							<tr>
									<td><?php echo $ttl_nombre;?> </td>
									<td>
									<input type="text" style="cursor:pointer" title='<?php echo $title_nombre; ?>' name="nombre_centro" id="nombre_centro" onkeypress=" return soloLetras(event)" />
									<td width="900"><?php echo $ttl_direccion;?> </td>
									<td width="0">
									<input style="width:390; cursor:pointer" title='<?php echo $title_direccion; ?>'type="text" name="direccion_centro" id="direccion_centro" />
									</td>
							</tr>
							<tr>
									<td><?php echo $ttl_telefono;?> </td>
									<td>
									<input type="text" style="cursor:pointer" title='<?php echo $title_telefono;?>' name="telefono_centro" id="telefono_centro" onkeypress=" return soloNumeros(event)" />
									</td>
									<td><?php echo $ttl_correo;?> </td>
									<td width="5">
									<input style="width:390 ;cursor:pointer" title='<?php echo $title_correo;?>' type="text" name="correo_centro" id="correo_centro" />
									</td>
							</tr>
							<tr>
									<td colspan='4' align='center'>
										<div id='div_msj' onmouseover='escribir_div_msj("");'>
										</div>
									</td>
						  </tr>
						</table>
						<br /><br /><br /><br />
						<tr>
							<td colspan='4' align='center' >
								<button type='button' id='btn_guardar' name='btn_guardar' onclick='verificar("guardar");' title='' style='width:20p%' >
									GUARDAR
								</button >
								<button type='button' id='btn_cancelar'  name='btn_cancelar' title='' style='width:20p%' onclick='cancelar();' >
									LIMPIAR
								</button >
							</td>
						</tr>
					<?php
						$conex->Close();
					?>
				</form>	
						<iframe name='operaciones'style='display:none'width='100%'height=''>
						</iframe> 	
			</body>
		</html>
		<?php 
	} ?>
