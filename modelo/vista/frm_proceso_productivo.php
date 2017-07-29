<?php
include_once('../../include/vars.php');
header('Context-Type: text/html; charset='.$charset);
set_include_path(get_include_path() .PATH_SEPARATOR .$PathApp);
session_name($session_name);
session_start();
include('cabecera.php');
include'../../herramientas/adodb5/adodb.inc.php';
//************INICIO CONEXION BASE DE DATOS**********//
$conex=NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!$conex){
	echo "<script>Error...Al Conectar></script>";
	die($err_conn_db);
	exit;}
include_once '../../modelo/etiquetas/Esp/lbl_procesos_productivos.php';
?>
<html>			
<head>		
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $ttl_pag;?></title>
</head>



<script type='text/javascript' src='../../herramientas/jquery/jquery-1.8.2.js'></script>
	
<script type = "text/javascript">
		$(document).ready(function (){
			
			$('#nombre_procesos').change(function(){
				if($('#nombre_procesos').val() == '1' )
				{  $('#id_de_pila').attr('disabled','disabled')&& $('#tipo_pila').attr('disabled','disabled')&& $('#temperatura').attr('disabled','disabled')&& $('#medida_termica').attr('disabled','disabled')&& $('#identificacion_de_cama').attr('disabled','disabled')&& $('#humedad').attr('disabled','disabled')&& $('#textura').attr('disabled','disabled');}
				
				if($('#nombre_procesos').val() == '2' )
				{  $('#id_de_pila').attr('disabled','disabled')&& $('#tipo_pila').attr('disabled','disabled')&& $('#temperatura').attr('disabled','disabled')&& $('#medida_termica').attr('disabled','disabled')&& $('#identificacion_de_cama').attr('disabled','disabled')&& $('#humedad').attr('disabled','disabled')&& $('#textura').attr('disabled','disabled');}
				
				
				if($('#nombre_procesos').val() == '3' ) 
				{  $('#identificacion_de_cama').attr('disabled','disabled')&& $('#color').attr('disabled','disabled')&& $('#olor').attr('disabled','disabled');}
				
			
				if($('#nombre_procesos').val() == '4' ) 
					{  $('#id_de_pila').attr('disabled','disabled')&& $('#tipo_pila').attr('disabled','disabled')&& $('#color').attr('disabled','disabled')&& $('#olor').attr('disabled','disabled');}
				
			});				
		});
</script>

<script type = "text/javascript">

			function verificar(var_recibida)
				{
					var seguir = true;
					var msj_concatenado = "Errores Encontrados <br> ";
					document.getElementById('option').value = var_recibida;
					
					
					if (document.frm_procesos_productivos.nombre_proceso.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* proceso';
						seguir = false;
					}
					if (document.frm_procesos_productivos.fecha_inicio.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* fecha de inicio';
						seguir = false;
					}if (document.frm_procesos_productivos.fecha_finalizacion.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* fecha final';
						seguir = false;
					}if (document.frm_procesos_productivos.identificacion_de_pila.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* id pila';
						seguir = false;
					}
					if (document.frm_procesos_productivos.tipo_pila.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* tipo pila';
						seguir = false;
					}
					if (document.frm_procesos_productivos.identificacion_de_cama.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* id cama';
						seguir = false;
					}
					if (document.frm_procesos_productivos.tipo_producto.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* tipo producto';
						seguir = false;
					}
					if (document.frm_procesos_productivos.cantidad.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* cantidad';
						seguir = false;
					}
					if (document.frm_procesos_productivos.temperatura.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* temperatura';
						seguir = false;
					}
					if (document.frm_procesos_productivos.medida_termica.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* medida termica';
						seguir = false;
					}
					if (document.frm_procesos_productivos.humedad.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* humedad';
						seguir = false;
					}
					if (document.frm_procesos_productivos.ph.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* ph';
						seguir = false;
					}
					if (document.frm_procesos_productivos.olor.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* olor';
						seguir = false;
					}
					if (document.frm_procesos_productivos.color.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* color';
						seguir = false;
					}
					if (document.frm_procesos_productivos.textura.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* textura';
						seguir = false;
					}
					if (document.frm_procesos_productivos.observaciones.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '* observaciones';
						seguir = false;
					}
					
				if (seguir == true)
					{
						frm_procesos_productivos.submit();
					}	
				}
			function modificar()
				{
					document.getElementById('option').value = "actualizar";
					frm_procesos_productivos.submit();
					
				}		
			function soloNumeros(e)
				{
					var key = window.Event ? e.which : e.keyCode
					return ((key >= 48 && key <= 57)||(key == 8))
				}	
			function limpiar()
				{
					document.frm_procesos_productivos.nombre_procesos.value=' ';
					document.frm_procesos_productivos.id_de_pila.value=' ';
					document.frm_procesos_productivos.tipo_pila.value=0;
					document.frm_procesos_productivos.temperatura.value=' ';
					document.frm_procesos_productivos.medida_termica.value=0;
					document.frm_procesos_productivos.cantidad.value=' ';
					document.frm_procesos_productivos.tipo_cantidad.value=0;
					document.frm_procesos_productivos.fecha_ficha_tecnica.value='';
					document.frm_procesos_productivos.fecha_inicio.value='';
					document.frm_procesos_productivos.fecha_finalizacion.value='';
					document.frm_procesos_productivos.identificacion_de_cama.value=' ';
					document.frm_procesos_productivos.humedad.value=' ';
					document.frm_procesos_productivos.ph.value=' ';
					document.frm_procesos_productivos.textura.value=' ';
					document.frm_procesos_productivos.color.value=' ';
					document.frm_procesos_productivos.olor.value=' ';
					document.frm_procesos_productivos.observaciones.value=' ';
				}
			function escribir_div_msj(msj_recibido)
				{
					document.getElementById("div_msj").innerHTML = msj_recibido;
				}
					
		</script>

<center><h1><font size="10" color="#00000"><?PHP ECHO $ttl_bienvenido; ?></font></h1></center>

<body>

<CENTER>
<form name='frm_procesos_productivos' target='operaciones' action='../modelo/controlador/ctrl_procesos_productivos.php' method='POST'>
			<input type='text' id='option' name='option'>
<table  title=" " width="1031" height="254" cellpadding="2">
<tr></tr>
<tr>
  <td width="21" height="36"><p> <?PHP ECHO $ttl_selec_proceso; ?>: </p></td>
  <td width="194">
  <select name="nombre_procesos"  title= <?php echo $ttl_selec_proceso;?>"  style="cursor:pointer" id="nombre_procesos">
    <option value='0'>:..</option>
    <?php
								$query='SELECT nombre_proceso FROM tipo_proceso';
								$result = $conex->Execute($query);
								while(!$result->EOF)
								{
									echo "<option value='".$result->fields['nombre_proceso']."'>".$result->fields['nombre_proceso']."</option>";
										$result->MoveNext();
										}
						?>
  </select></td>
  <td width="54">&nbsp;</td>
  <td width="61">
    <?PHP ECHO $ttl_fecha_inicio; ?>
  </td>
  <td width="232">
	<input title="<?php echo $title_fecha_inicio;?>" style="cursor:pointer" type="date" name="fecha_inicio" id="fecha_inicio" /></td>
  <td width="194">
	<label for="fecha_inicio"><?PHP ECHO $ttl_fecha_fin; ?><br /></label></td>
  <td width="229"><input  style="cursor:pointer" title="<?php echo $title_fecha_final;?>" type="date" name="fecha_finalizacion" id="fecha_finalizacion" />
	
	</tr>
  <td height="33">
  <label><?PHP ECHO $ttl_id_pila; ?><br /></label></td>
  <td >
	<input  type="text" name="id_de_pila" title="<?php echo $title_id_pila;?>" style="cursor:pointer" id="id_de_pila" /></td>
  <td>
	<select name="tipo_pila" title="<?php echo $title_tipo_pila;?>" style="cursor:pointer" id="tipo_pila">
		<option value='0'>:..</option>
			<?php
								$query='SELECT nombre_tipo_pila FROM tipo_pila';
								$result = $conex->Execute($query);
								while(!$result->EOF)
								{
									echo "<option value='".$result->fields['nombre_tipo_pila']."'>".$result->fields['nombre_tipo_pila']."</option>";
										$result->MoveNext();
										}
						?>
  </select></td>
  <td>
    <?PHP ECHO $ttl_id_cama; ?>
  </td>
  <td><input type="text" title="<?php echo $title_id_cama;?>" style="cursor:pointer" name="identificacion_de_cama" id="identificacion_de_cama" />
  <td><?PHP ECHO $ttl_humedad; ?>
  </td>
  <td><input type="text" title="<?php echo $title_humedad;?>" style="cursor:pointer" name="humedad" id="humedad" />
  </td>
 
</tr>
<tr>
  <td height="37"><label for="temperatura"><?PHP ECHO $ttl_temperatura; ?></label></td>
  <td><input type="text" title="<?php echo $title_temperatura;?>" style="cursor:pointer" name="temperatura" id="temperatura" /></td>
  <td><select name="medida_termica"  style="cursor:pointer" id="medida_termica">
    <option value='0'>:..</option>
    <?php
								$query='SELECT medida_termica FROM medida_termica';
								$result = $conex->Execute($query);
								while(!$result->EOF)
								{
									echo "<option value='".$result->fields['medida_termica']."'>".$result->fields['medida_termica']."</option>";
										$result->MoveNext();
										}
						?>
  </select></td>
  <td  valign="middle"><?PHP ECHO $ttl_ph; ?></td>
  <td><input type="text" title="<?php echo $title_ph;?>" style="cursor:pointer" name="ph" id="ph" /></td>
  <td><?PHP ECHO $tll_textura; ?></td>
  <td><input type="text" title="<?php echo $title_textura;?>" style="cursor:pointer"name="textura" id="textura" /></td>
<tr>
  <td><?PHP ECHO $ttl_cantida_terminada; ?></td>
  <td><input type="text" title="<?php echo $title_cantidad_terminada;?>" style="cursor:pointer" name="cantidad" id="cantidad" /></td>
  <td ><select name="tipo_cantidad" title="<?php echo $title_tipo_cantidad;?>" style="cursor:pointer" id="tipo_cantidad">
    <option value='0'>:..</option>
    <?php
								$query='SELECT unidad_medida FROM unidad_de_medida';
								$result = $conex->Execute($query);
								while(!$result->EOF)
								{
									echo "<option value='".$result->fields['unidad_medida']."'>".$result->fields['unidad_medida']."</option>";
										$result->MoveNext();
										}
						?>
  </select></td>
  <td><?PHP ECHO $ttl_color; ?></td>
  <td><input type="text" title="<?php echo $title_color;?>" style="cursor:pointer" name="color" id="color" /></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td height="33"><?PHP ECHO $ttl_fecha_ficha_tecnica; ?></td>
  <td><input type="file" style="width:190px;height:30px"  name="fecha_ficha_tecnica" title="<?php echo $title_fecha_ficha_tecnica;?>" style="cursor:pointer" id="fecha_ficha_tecnica"></td>
    
  <td>&nbsp;</td>
  <td height="64"><?PHP ECHO $ttl_olor; ?></td>
  <td><input type="text" title="<?php echo $title_olor;?>" style="cursor:pointer" name="olor" id="olor" /></td>
</tr>

<table>
<label for="observaciones"><center>
    <?PHP ECHO $tll_observaciones; ?>
  </center>
</label>
  <center>
    <textarea title="<?php echo $title_observaciones;?>" name="observaciones" id="observaciones" cols="45" rows="5"></textarea>
    <br><br>
	
					<button type='button' id='btn_guardar' name='btn_guardar' onclick='verificar("guardar");' title='<?php echo $title_btn_guardar;?>' style='width:20p% ;cursor:pointer;' >
					<?php echo $value_guardar;?>
					</button >
					<button type='button'  id='btn_actualizar' onclick='verificar("modificar");'  name='btn_actualizar' title='<?php echo $title_btn_actualizar;?>' style='width:20p% ;cursor:pointer;' >
					<?php echo $value_actualizar;?>
					</button >
					<button type='button' id='btn_buscar'  name='btn_buscar' title='<?php echo $title_btn_consultar;?>' style='width:20p%; cursor:pointer;' >
					<?php echo $value_consultar;?>
					</button >
					<button type='button' id='btn_cancelar' onclick='limpiar();' name='btn_cancelar' title='<?php echo $title_btn_cancelar;?>' style='width:20p%; cursor:pointer;' >
					<?php echo $value_cancelar;?>
					</button >
		
		<iframe name='operaciones' style='display:none' width='100%' height=''></iframe>
			<?php $conex->close(); 	?>
	</center>
  </table>
  </tr>
  </tr>
  </table>
  </form>
  </center>
</body>
</html>
