<?php
include('../../include/vars.php');	//ruta relativa al directorio include
include('../etiquetas/esp/lbl_autoconsumo.php');
//session_start();
include('cabecera.php');
//******************** Inicio Conexion a la DB ********************
include ('../../herramientas/adodb5/adodb.inc.php');
$conex = NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!$conex) {
	echo "<br>Error de conexion <br>";
	die($err_conn_db);
exit;}
?>
<html>
<head>
	<title>autoconsumo</title>
	<link rel="shortcut icon" href="../../imagenes/sena icono.png" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript">
				function verificar(var_recibida)
				{
					// alert('si');
					var seguir = true;
					var msj_concatenado = "Errores Encontrados <br> ";
					document.getElementById('option').value = var_recibida;
					if (document.frm_autoconsumo.fecha.value==''){
						// document.getElementById("fecha").style.borderColor ="#F91009";
						document.getElementById("div_msj").innerHTML += msj_concatenado + '*fecha ';
						seguir = false;
					}
					if (document.frm_autoconsumo.cantidad.value==''){
						// document.getElementById("cantidad").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML +=  '<br>* cantidad';
						seguir = false;
					}
					if (document.frm_autoconsumo.descripcion_producto.value==''){
						// document.getElementById("descripcion_producto").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* descripcion producto';
						seguir = false;
					}
					if (document.frm_autoconsumo.se_entrega.value==''){
						// document.getElementById("se_entrega").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* se_entrega';
						seguir = false;
					}
					if (document.frm_autoconsumo.aplicacion_en.value==''){
						// document.getElementById("aplicacion_en").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* aplicacion_en';
						seguir = false;
					}if (document.frm_autoconsumo.actividad_a_realizar.value==''){
						// document.getElementById("actividad_a_realizar").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* actividad_a_realizar';
						seguir = false;
					}if (document.frm_autoconsumo.autoriza.value==''){
						// document.getElementById("autoriza").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* autoriza';
						seguir = false;
					}if (document.frm_autoconsumo.recibe.value==''){
						// document.getElementById("recibe").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* recibe';
						seguir = false;
					
					}if (document.frm_autoconsumo.id_cantidad_producto.value==''){
						// document.getElementById("cantidad").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML +=  '<br>* cantidad_producto ';
						seguir = false;
					}
					if (document.frm_autoconsumo.n_documento.value==''){
						// document.getElementById("n_documento").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* numero de documento';
						seguir = false;
					}if (document.frm_autoconsumo.unidad_medida.value==''){
						// document.getElementById("unidad_medida").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* unidad_medida';
						seguir = false;
					}
				if (seguir == true)
					{
						frm_autoconsumo.submit();
					}	
				}
			// function enviar()
				// {
					// document.getElementById('option').value = "guardar";
					// frm_autoconsumo.submit();
				// }
			function modificar()
				{
					document.getElementById('option').value = "actualizar";
					frm_autoconsumo.submit();
					
				}		
			function soloNumeros(e)
				{
					var key = window.Event ? e.which : e.keyCode
					return ((key >= 48 && key <= 57)||(key == 8))
				}	
				function cancelar() {
										document.frm_autoconsumo.cantidad.value= "";
										document.frm_autoconsumo.descripcion_producto.value= "";
										document.frm_autoconsumo.se_entrega.value= "";
										document.frm_autoconsumo.aplicacion_en.value= "";
										document.frm_autoconsumo.actividad_a_realizar.value= "";
										document.frm_autoconsumo.autoriza.value= "";
										document.frm_autoconsumo.recibe.value= "";
										document.frm_autoconsumo.id_cantidad_producto.value= "";
										document.frm_autoconsumo.n_documento.value= "";
										document.frm_autoconsumo.unidad_medida.value= "";
										document.frm_autoconsumo.fecha.value= "";
										
										
									   }	
				function escribir_div_msj(msj_recibido)
				{
					// alert('limpiar');
					document.getElementById("div_msj").innerHTML = msj_recibido;
				}
		</script>
</head>

<body class="autoconsumo">
		<form name='frm_autoconsumo' target='operaciones' action='../controlador/ctrl_autoconsumo.php' method='POST'>
		<input type='text' id='option' name='option' style="display:yes;">

		<center> <h1>AUTOCONSUMO </h1></center> <center>
		<center>
		<table width="900" border="0" colspan="4">
		  <br>
		  <tr>
			<td width="50"> <?php echo $ttl_fecha;?></td>
			<td width="144">
			  <input type="date" style="width:235; cursor:pointer" title='<?php echo $title_fecha; ?>' name="fecha" id="fecha" />
			</td>
		  </tr>
		  <br><br>
			<td width="1100"><?php echo $ttl_descripcion;?></td>
			<td width="0" input type="text" style="width:390; cursor:pointer" title='<?php echo $title_descripcion; ?>' name="descripcion_producto" id="descripcion_producto" />
			  <textarea ></textarea><br>
			  <td width="900"><?php echo $ttl_cantidad;?></td>
			<td width="0">
			  <input type="text" style="width:390; cursor:pointer" title='<?php echo $title_cantidad; ?>' name="cantidad" id="cantidad" />
			  </td>
			  <td width="100">
					<select name="unidad_de_medida" id="unidad_de_medida" style="width:200; cursor:pointer" title='<?php echo $title_unidad_de_medida; ?>'>
							   <option value='0' >:.UNIDAD DE MEDIDA</option>
														<?php
															$query='SELECT unidad_de_medida.unidad_medida FROM unidad_de_medida';
																	$result = $conex->Execute($query);
																	while (!$result->EOF)
															{
																echo "<option value='".$result->fields['unidad_medida']."'>".$result->fields['unidad_medida']."</option>";
																$result->MoveNext();
															} 
														?>	
							  </select>
					</td>
			</td>
		  </tr>
		   <tr>
			<td width="1500"><?php echo $ttl_se_entrega;?></td>
			<td width="0">
			  <input style="width:235; cursor:pointer" title='<?php echo $title_se_entrega; ?>' type="text" name="se_entrega" id="se_entrega" />
			
			<td width="1500"><?php echo $ttl_aplicacion;?></td>
			<td width="0">
			  <input style="width:390;cursor:pointer" title='<?php echo $title_aplicacion; ?>' type="text" name="aplicacion_en" id="aplicacion_en" />
			</td>
		  </tr>
			<tr>
			<td><?php echo $ttl_actividad_a_realizar;?></td>
			<td input style="width:390;cursor:pointer" type="text" title='<?php echo $title_actividad_a; ?>' id="actividad_a_realizar" name="actividad_a_realizar" >
			  <textarea name="" cols="" rows=""></textarea>
			
			  <td width="900"><?php echo $ttl_autoriza;?></td>
			<td width="0">
			  <input style="width:390;cursor:pointer" type="text" title='<?php echo $title_autoriza; ?>'type="text" name="autoriza" id="autoriza" />
			</td>
		  </tr>
			<tr>
			<td><?php echo $ttl_recibe;?></td>
			<td>
			  <input type="text" style="width:;cursor:pointer" type="text" title='<?php echo $title_recibe; ?>' name="recibe" id="recibe" />
				
			  <td width="900"><?php echo $ttl_cantidad_producto;?></td>
			<td width="1">
			  <input style="width:390;cursor:pointer" type="text" title='<?php echo $title_cantidad_producto; ?>'type="text" name="id_cantidad_producto" id="id_cantidad_producto " />
			</td>
		  </tr>
		  <td><?php echo $ttl_n_documento;?></td>
		   <td width="0">
			  <td width="100">
					<select name="n_documento" id="n_documento" style="width:390;cursor:pointer" type="text" title='<?php echo $title_n_documento; ?>'>
							   <option value='0' >:.</option>
														<?php
															$query='SELECT registro_usuario.n_documento,nombres,apellidos FROM registro_usuario';
																	$result = $conex->Execute($query);
																	while (!$result->EOF)
															{
																echo "<option value='".$result->fields['n_documento']."'>'".$result->fields['n_documento']."'>".$result->fields['nombres']." ".$result->fields['apellidos']."</option>";
									
																$result->MoveNext();
															} 
														?>	
							  </select>
					</td>
			</td>
			 <tr>
			<td colspan='4' align='center'>
				<div id='div_msj' onmouseover='escribir_div_msj("");'>
				</div>
			</td>
  </tr>
		</table>
		</center>
		<br /> 
		<center><tr>
									<td colspan='4' align='center' >
										<button type='button' id='btn_guardar' name='btn_guardar' onclick='verificar("guardar");' title='' style='width:20p%' >
											GUARDAR
										</button >
										<button type='button'  id='btn_actualizar' onclick="modificar ();" name='btn_actualizar' title='' style='width:20p%' >
											ACTUALIZAR
										</button >
										<button type='button' id='btn_buscar'  name='btn_buscar' title='' style='width:20p%' >
											CONSULTAR
										</button >
										<button type='button' id='btn_cancelar'  name='btn_cancelar' title='' style='width:20p%' onclick='cancelar();' >
											CANCELAR
										</button >
									</td>
								</tr>
		</center>
<?php
			$conex->Close();
		?>
	</form>	
			<iframe name='operaciones'
					style='display:none'
					width='100%'height=''>
			</iframe> 	
</body>
</html>