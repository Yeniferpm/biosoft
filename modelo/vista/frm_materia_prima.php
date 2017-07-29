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
		include('../etiquetas/'.$_SESSION['nombre_carpeta'].'/lbl_materia_prima.php');
		?>
<html>
<head>
	<title><?php echo $ttl_pag; ?></title>
	<link rel="stylesheet" type="text/css" href="../../css/css_cajas_btn.css" media="screen" />
	<script type='text/javascript' src='/Biofabrica/herramientas/jquery/jquery-1.8.2.js'></script>
	<script type = "text/javascript">
		$(document).ready(function (){
			$('#formato_ingreso').change(function(){
				if(($('#formato_ingreso').val() == '4' ) || ($('#formato_ingreso').val() == '2' ) ||($('#formato_ingreso').val() == '3' ))
				{  $('#codigo').attr('disabled', 'disabled'); $('#insumos').attr('disabled', 'disabled'); $('#proveedor').attr('disabled', 'disabled');$('#ficha_tecnica').attr('disabled', 'disabled'); }
				else if($('#formato_ingreso').val() == '1' )
				{   $('#codigo').removeAttr("disabled"); $('#insumos').removeAttr("disabled");$('#proveedor').removeAttr("disabled");$('#ficha_tecnica').removeAttr("disabled");  }
			});	
		$('#formato_ingreso').change(function(){
				if($('#formato_ingreso').val() == '1' )
				{  $('#unidad').attr('disabled', 'disabled'); $('#azas').attr('disabled', 'disabled');$('#quien_recibe').attr('disabled', 'disabled');    }
				else if(($('#formato_ingreso').val() == '2' ) || ($('#formato_ingreso').val() == '3' ) ||($('#formato_ingreso').val() == '4' ))
				{   $('#unidad').removeAttr("disabled"); $('#azas').removeAttr("disabled");$('#quien_recibe').removeAttr("disabled"); }
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
					if (document.frm_materia_prima.formato_ingreso.value=='0')
					{
						// document.getElementById("    ").style.borderColor ="#F91009";
						document.getElementById("div_msj").innerHTML += msj_concatenado + '* Formato Ingreso';
						seguir = false;
					}
					if (document.frm_materia_prima.fecha.value=='')
					{
						
						document.getElementById("div_msj").innerHTML +=  '<br>* Fecha Ingreso';
						seguir = false;
					}
					if (document.frm_materia_prima.hora.value=='')
					{
						// document.getElementById("   ").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML +=  '<br>* Hora';
						seguir = false;
					}
					if (document.frm_materia_prima.cantidad.value=='')
					{
						// document.getElementById("   ").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML +=  '<br>* Cantidad';
						seguir = false;
					}
					if (document.frm_materia_prima.uni_medida.value=='0')
					{
						document.getElementById("div_msj").innerHTML +=  '<br>* Unidad Medida';
						seguir = false;
					}
					
				if (seguir == true)
					{
						frm_materia_prima.submit();
					}	
				}
			function modificar()
				{
					document.getElementById('option').value = "actualizar";
					frm_materia_prima.submit();
					
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
					document.frm_materia_prima.formato_ingreso.value='0';
					document.frm_materia_prima.fecha.value='';
					document.frm_materia_prima.hora.value='';
					document.frm_materia_prima.cantidad.value='';
					document.frm_materia_prima.uni_medida.value='';
					document.frm_materia_prima.unidad.value='0';
					document.frm_materia_prima.codigo.value='';
					document.frm_materia_prima.azas.value='0';
					document.frm_materia_prima.insumos.value='0';
					document.frm_materia_prima.proveedor.value='';
					document.frm_materia_prima.quien_entrega.value='';
					document.frm_materia_prima.quien_recibe.value='';
					document.frm_materia_prima.observaciones.value='';
					document.frm_materia_prima.ficha_tecnica.value='';
					
				}
			function escribir_div_msj(msj_recibido)
				{
					// alert('limpiar');
					document.getElementById("div_msj").innerHTML = msj_recibido;
				}	
			function soloNumeros(e)
				{
					var key = window.Event ? e.which : e.keyCode
					return ((key >= 48 && key <= 57)||(key == 8))
				}
			function validateMail(correo_us)
			{
				//Creamos un objeto 
				object=document.getElementById(correo_us);
				valueForm=object.value;
				// Patron para el correo
				var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
				if(valueForm.search(patron)==0)
				{
					//Mail correcto
					object.style.color="#000";
					return;
				}else{
					//Mail incorrecto
					object.style.color="#f00";
				}	
			}		
		</script>	
	</head>
	<body class="materia_prima">
		<div class="container_12" >
			<div class="grid_10" align= 'center'>
				<br><br>
				<div class="box round">
					<center>
						<form name='frm_materia_prima' target='operaciones' action='../controlador/ctrl_materia_prima.php' method='POST'>
							<input type='hidden' id='option' name='option' hidden="true">
							<h1 ><font size="6" color="#00000"><?php echo $ttl_inc; ?></FONT></h1>
							<table border="0">
								<tr>
									<td COLSPAN='2' ><?php echo $formato_ingreso; ?></td>
								</tr>
								<tr>
									<td COLSPAN='2'  >
										<select id="formato_ingreso" class="box-gray" name="formato_ingreso" Title= "<?php echo $title_ingreso;?>" style='width:245px;cursor:pointer;'>
											<option value='0'></option >
											<?php
												$query="SELECT
														tipo_ingreso.id_tipo_ingreso, tipo_ingreso.nombre_tipo_ingreso
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
									<td><?php echo $fecha; ?></td>
									<td><input type="date" name="fecha" class="box-gray" id='fecha'Title="<?php echo $title_fecha;?>" style='width:228px;cursor:pointer;'/></td>
									<td><?php echo $hora; ?></td>
									<td><input type="time" name="hora" class="box-gray" id='hora' Title="<?php echo $title_hora;?>" style='width:230px;cursor:pointer;' /></td>
								</tr>
								<tr> 
									<td><?php echo $unidad; ?></td>
									<td><select type="text" id='unidad' name='unidad' class="box-gray" placeholder="unidad" Title="<?php echo $title_unidades;?>" required="" style='width:230px;cursor:pointer;' >
											<option value='0'></option >
											<?php
												$query="select nombre_unidad, id_unidad from unidad";
												$result = $conex->Execute($query);
												while(!$result->EOF)
												{
													echo "<option value='".$result->fields['id_unidad']."'>".$result->fields['nombre_unidad']."</option >";
													$result->MoveNext();
												}
											?>
										</select>
									</td>
									<td><?php echo $cantidad; ?></td>
									<td> <input type="int" name="cantidad" class="box-gray" id='cantidad' onkeypress=" return soloNumeros(event)" Title="<?php echo $title_cantidad;?>" style='width:100px;cursor:pointer;'/>
										<select type="text" id='uni_medida' name='uni_medida' class="box-gray" placeholder="cantidad" Title="<?php echo $title_medida;?>" required="" style='width:125px;cursor:pointer;' >
											<option value='0'></option >
											<?php
												$query="select unidad_medida, id_unidad_medida from unidad_de_medida";
												$result = $conex->Execute($query);
												while(!$result->EOF)
												{
													echo "<option value='".$result->fields['id_unidad_medida']."'>".$result->fields['unidad_medida']."</option >";
													$result->MoveNext();
												}
											?>
										</select>
									</td>
									<td><?php echo $codigo_insumo; ?></td>
									<td><input type="text" name="codigo" id='codigo' class="box-gray" value="" Title="<?php echo $title_codigo_insumo;?>" style='width:230px;cursor:pointer;' /></td>
								</tr>
								<tr>
									<td><?php echo $tipo; ?></td>
									<td><select type="text" id='azas' name='azas' class="box-gray" placeholder="" Title="<?php echo $title_tipo;?>" required="" style='width:230px;cursor:pointer;' >
												<option value='0'></option >
											<?php
												$query="select azas_ins, id_azas_ins from tipo_materia_prima_e_insumos;";
												$result = $conex->Execute($query);
												while(!$result->EOF)
												{
													echo "<option value='".$result->fields['id_azas_ins']."'>".$result->fields['azas_ins']."</option >";
													$result->MoveNext();
												}
											?>
									</td></select>
									<td><?php echo $nombre_insumo; ?></td>
									<td><select type="text" id='insumos' name='insumos' class="box-gray" placeholder="" Title="<?php echo $title_nombre_insumo;?>" required="" style='width:230px;cursor:pointer;' >
											<option value='0'></option >
											<?php
												$query="select azas_ins, id_azas_ins from tipo_materia_prima_e_insumos;";
												$result = $conex->Execute($query);
												while(!$result->EOF)
												{
													echo "<option value='".$result->fields['id_azas_ins']."'>".$result->fields['azas_ins']."</option >";
													$result->MoveNext();
												}
											?>
										</select>
									</td>
									<td><?php echo $proveedor; ?></td>
									<td><input onkeypress="return soloLetras(event)" type="text" name="proveedor" value="" class="box-gray" id='proveedor' Title="<?php echo $title_proveedor;?>" placeholder="" style='width:230px;cursor:pointer;'></td>
								</tr>
								<tr>
									<td><?php echo $recibe; ?></td>
									<td><select type="text" id='quien_recibe' name='quien_recibe' class="box-gray" placeholder="numero documento" Title="<?php echo $title_recibe;?>" required="" style='width:230px;cursor:pointer;'>
												<option value='0'></option >
												<?php
												$query="select n_documento, id_usuario from registro_usuario;";
												$result = $conex->Execute($query);
												while(!$result->EOF)
												{
													echo "<option value='".$result->fields['id_usuario']."'>".$result->fields['n_documento']."</option >";
													$result->MoveNext();
												}
											?>
											</select>
									</td>
									<td><?php echo $entrega; ?></td>
									<td><input onkeypress="return soloLetras(event)" class="box-gray" type="text" name="quien_entrega" value="" id='quien_entrega' Title="<?php echo $title_entrega;?>" placeholder="" style='width:227px;cursor:pointer;' /></td>
									<td><?php echo $ficha_tecnica; ?></td>
									<td><input type="text" name='ficha' id='ficha_tecnica' class="box-gray" value="" Title="<?php echo $title_ficha_tecnica;?>" style='width:230px;cursor:pointer;' /></td>
								</tr>
								<tr>
									<td><?php echo $observaciones; ?></td>
									<td><input type="text" name='observaciones' id='observaciones' class="box-gray" Title="<?php echo $title_observaciones;?>" style='width:218px;cursor:pointer;' /></td>
								</tr>
							</table>
					</center>		
							<br>
							<div>
								<tr>
									<br>
									<div ALIGN=center>
										<tr>
											<tr>
												<td colspan='4'>
													<div id='div_msj' onmouseover='escribir_div_msj("");' style='cursor:pointer;'></div>
												</td>
											</tr>
										</tr>
										<br>
										<td colspan='4' >
											<button type='button' id='btn_guardar' name='btn_guardar' class="box-gray" onclick='verificar("guardar");' title=<?php echo $title_btn_guardar;?> style='width:20p%;cursor:pointer;'><?php echo $value_guardar;?></button >
											<button type='button' id='btn_limpiar' class="box-gray" name='btn_limpiar' onclick='limpiar();' title=<?php echo $title_btn_limpiar;?> style='width:20p%;cursor:pointer;'><?php echo $value_limpiar;?></button>
										</td>
									</div>	
								</tr>			
							</div>
						</form>
			</div>
			</div>
		</div>
		
			<iframe name='operaciones' style='display:none' width='100%' height=''></iframe>
		<div id="site_info">
		<div class="clear"></div>	
		</div>
		<?php	$conex->close(); ?>
	</body>
		</html>
		<?php 
	} ?>
