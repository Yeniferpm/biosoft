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
		include('../etiquetas/'.$_SESSION['nombre_carpeta'].'/lbl_ventas.php');
?>
<html>
	<head>
		<title><?php echo $ttl_bienvenido; ?></title>
		<script src="../../herramientas/jquery/js/jquery.js"></script>
		<script type="text/javascript" language="javascript">
					$(document).ready(function () {
						
						$('#id_producto').change(function(){
							$.post("../controlador/ctrl_combos.php",{
								action       : 'buscar_cantidad_producto',
								id_producto  : $('#id_producto').val()
							},function(data){
								$("#id_cantidad_producto").html(data.cantidad_producto);
							},'json');
						});	

						$('#id_producto').change(function(){
						$.post("../controlador/ctrl_combos.php",{
							action       : 'buscar_precio',
							id_producto  : $('#id_producto').val()
						},function(data){
							$("#id_precio").html(data.precio);
						},'json');
					});								
					});		
				</script>
		<script type = "text/javascript">
			function verificar (var_recibida)
			{
				var seguir = true;
				//document.frm.acceso.action.value='login';
				var msj_concatenado = "Errores Encontrados <br>";
				document.getElementById ('option').value = var_recibida;
				if (document.frm_ventas.fecha.value==''){
					document.getElementById("div_msj").innerHTML +=  '*Fecha<br>';
					seguir = false;
				}
				if (document.frm_ventas.id_ventas.value==''){
					document.getElementById("div_msj").innerHTML += '*Numero ventas<br>';
					seguir = false;
				}
				if (document.frm_ventas.id_cantidad_producto.value=='0'){
					document.getElementById("div_msj").innerHTML +=  '*Cantidad Producto Disponible<br>';
					seguir = false;
				}
				if (document.frm_ventas.id_producto.value=='0'){
					document.getElementById("div_msj").innerHTML +=  '*Nombre Producto<br>';
					seguir = false;
				}
				if (document.frm_ventas.cantidad_ventas.value==''){
					document.getElementById("div_msj").innerHTML +=  '*Cantidad Producto<br>';
					seguir = false;
				}
				if (document.frm_ventas.unidad_medida.value=='0'){
					document.getElementById("div_msj").innerHTML +=  '*Unidad Medida<br>';
					seguir = false;
				}
				if (document.frm_ventas.id_precio.value=='0'){
					document.getElementById("div_msj").innerHTML +=  '*Precio Producto<br>';
					seguir = false;
				}
				if (document.frm_ventas.total_apagar.value==''){
					document.getElementById("div_msj").innerHTML +=  '*Total a Pagar<br>';
					seguir = false;
				}
				if (document.frm_ventas.n_documento.value=='0'){
					document.getElementById("div_msj").innerHTML += '*Responsable Venta<br>';
					seguir = false;
				}
				
				if (document.frm_ventas.recibe.value==''){
					document.getElementById("div_msj").innerHTML +='*Recibe<br>';
					seguir = false;
				}
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
			/*function enviar()
			{
				document.getElementById('option').value = "guardar";
				frm_ventas.submit();
			}*/
			function modificar(){
				document.getElementById('option').value = "actualizar";
				frm_ventas.submit();	
			}
			function limpiar ()
				{
					document.frm_ventas.reset();
					document.frm_ventas.btn_actualizar.disabled=true;
					document.frm_ventas.btn_eliminar.disabled=true;
					document.frm_ventas.btn_guardar.disabled=false;
					document.frm_ventas.btn_consultar.disabled=false;
					document.getElementById("fecha").className = '';
					document.getElementById("id_ventas").className = '';
					document.getElementById("id_cantidad_producto").className = '';
					document.getElementById("id_producto").className = '';
					document.getElementById("cantidad_ventas").className = '';
					document.getElementById("unidad_medida").className = '';
					document.getElementById("id_precio").className = '';
					document.getElementById("total_apagar").className = '';
					document.getElementById("n_documento").className = '';
					document.getElementById("recibe").className = '';
					
				}
			function escribir_div_msj(msj_recibido)
				{
					// alert('limpiar');
					document.getElementById("div_msj").innerHTML = msj_recibido;
				}	
			
		</script>
		<style type="text/css">
		</style>
		<script type="text/javascript" src="../../calendario-jquery/calendario_dw/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="../../calendario-jquery/calendario_dw/calendario_dw.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".campofecha").calendarioDW();
			})
		</script>
	</head>
	<body class="ventas">
		<center>
			<form name="frm_ventas" target="operaciones" action="../controlador/ctrl_ventas.php" method="POST">
				<input type='hidden' id='option' name='option'>
				<h1 ><?php echo $ttl_pag; ?></h1>
				<table border="0">
					<tr>
						<td><?php echo $ttl_id_venta ?></td>
						<td><input type="text" id="id_ventas" name="id_ventas" class="form-control" title="<?php echo $title_fecha; ?>"  required="" style="width:100px; cursor:pointer;"/></td>
						<td><?php echo $ttl_fecha; ?></td>
						<td><input type="date" name="fecha" class="campofecha"  title="<?php echo $title_fecha; ?>" style="width:175px; cursor:pointer;"/></td>
					</tr>
					<tr>	
						<td><?php echo $ttl_nombre_producto;?></td>
						<td>						 
							 <select type="text" class="form-control" id="id_producto" name="id_producto"  title="<?php echo$title_nombre_producto; ?>" required="" style="width:245px; cursor:pointer;"/>
								<option value="0">:..</option>
								<?php
									$query="SELECT productos.id_producto, nombre_producto FROM productos";
									$result = $conex->Execute($query);
									while(!$result->EOF)
									{
										echo "<option value='".$result->fields['id_producto']."'>".$result->fields['nombre_producto']."</option>";
										$result->MoveNext();
									}
								?>
							</select> 
						</td>	
						<td><?php echo $ttl_cantidad_producto_disponible; ?></td>
						<td>
							<select type="text" class="form-control" id="id_cantidad_producto" name="id_cantidad_producto" title='<?php echo $title_cantidad_producto_disponible;?>' required="" style="width:245px; cursor:pointer;">
							</select>
						</td>	
					</tr>
					<tr>
						<td><?php echo $ttl_cantidad_producto; ?></td>
						<td><input type="text" class="form-control" onkeypress=" return soloNumeros(event)" id="cantidad_ventas" name="cantidad_ventas"  title="<?php echo $title_cantidad_producto; ?>" required="" style="width:122px; cursor:pointer;"/>
						
							<select type="text" class="form-control" id="unidad_medida" name="unidad_medida" title="seleccione unidad de medida"  required="" style="width:120px; cursor:pointer;" >
								<option value="0">:..</option>
								<?php
									$query="SELECT unidad_de_medida.id_unidad_medida,unidad_medida FROM unidad_de_medida";
									$result = $conex->Execute($query);
									while(!$result->EOF)
									{
										echo "<option value='".$result->fields['id_unidad_medida']."'>".$result->fields['unidad_medida']."</option>";
										$result->MoveNext();
									}
								?>
							</select>
						</td>						
						<td><?php echo $ttl_valor_unitario; ?></td>
						<td>
							<select type="text" class="form-control" id="id_precio" name="id_precio"  title="<?php echo $title_valor_unitario;?>" required="" style="width:245px; cursor:pointer;">
							</select>
						</td>
					</tr>
					<tr>
						<td><?php echo $ttl_total_pagar; ?></td>
						<td><input type="text" class="form-control" onkeypress=" return soloNumeros(event)" id="total_apagar" name="total_apagar" title="<?php echo $title_total_pagar; ?>"  required="" style="width:245px; cursor:pointer;"/></td>
						<td><?php echo $ttl_responsable; ?></td>
						<td><?php  echo utf8_encode($_SESSION['usu_log']);?></td>
					</tr>
					<tr>
						<td><?php echo $ttl_recibe; ?></td>
						<td><input type="text" class="form-control" onkeypress=" return soloLetras(event)" id="recibe" name="recibe" title="<?php echo $title_recibe; ?>"  required="" style="width:245px; cursor:pointer;"/></td>
						<td><?php echo $ttl_observacion_venta;?></td>
						<td>
							<textarea type="text" class="form-control" onkeypress=" return soloLetras(event)" id="observacion_venta" name="observacion_venta" title="<?php echo $obsetvacion_venta; ?>"  required="" style="width:245px; cursor:pointer;">	
							</textarea>
						</td>
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
							<button type='button' id='btn_guardar' onclick='verificar("guardar");' name='btn_guardar' title='<?php echo $title_btn_guardar; ?>' style='width:20p%' >
								<?php echo $value_guardar; ?>
							</button >
						</td>
					</tr>
				</table>
			</form>
			<iframe name='operaciones' style="display:none" width='100%' height=''></iframe>
			<?php $conex->close(); 	?>
		</center>
	</body>
</html>
<?php 
	} ?>
