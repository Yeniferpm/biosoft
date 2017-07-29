<?php
include('../../include/vars.php');	//ruta relativa al directorio include
include('../etiquetas/esp/lbl_herramientas.php');
include('cabecera.php');
//session_start();
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
<title>herramientas</title>
		<link rel="shortcut icon" href="../../imagenes/sena icono.png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript">
										function verificar(var_recibida)
				{
					// alert('si');
					var seguir = true;
					var msj_concatenado = "Errores Encontrados <br> ";
					document.getElementById('option').value = var_recibida;
					if (document.frm_herramientas.codigo_herramientas.value==''){
						document.getElementById("div_msj").innerHTML += msj_concatenado + '* nombre de regional';
						seguir = false;
					}
					if (document.frm_herramientas.nombre_herramienta.value==''){
						document.getElementById("div_msj").innerHTML +=  '<br>* direccion regional';
						seguir = false;
					}
					if (document.frm_herramientas.id_unidad.value==''){
						document.getElementById("div_msj").innerHTML += '<br>* nombre unidad';
						seguir = false;
					}
				if (seguir == true)
					{
						frm_herramientas.submit();
					}	
				}
			// function enviar()
				// {
					// document.getElementById('option').value = "guardar";
					// frm_herramientas.submit();
				// }
			function modificar()
				{
					document.getElementById('option').value = "actualizar";
					frm_herramientas.submit();
					
				}		
			function soloNumeros(e)
				{
					var key = window.Event ? e.which : e.keyCode
					return ((key >= 48 && key <= 57)||(key == 8))
				}	
				function cancelar() 
					{
					document.frm_herramientas.codigo_herramientas.value= "";
					document.frm_herramientas.nombre_herramienta.value= "";
					document.frm_herramientas.id_unidad.value= "";
					}	
				function escribir_div_msj(msj_recibido)
					{
					// alert('limpiar');
					document.getElementById("div_msj").innerHTML = msj_recibido;
					}
		</script>
</head>

		<body class="herramientas">
			<form name='frm_herramientas' target='operaciones' action='../controlador/ctrl_herramientas.php' method='POST'>
			<input type='text' id='option' name='option' style="display:none;">
			
			<br>
			 <center> <h1><?php echo $ttl_pag;?></h1></center>
			
			<br />
			<center>
			<table width="200" border="0">
			  <tr>
				<td><?php echo $ttl_codigo;?></td>
				<td>
				  <input type="text" style="width:390;cursor:pointer" title='<?php echo $title_codigo;?>' name="codigo_herramientas" id="codigo_herramientas"  />
				</td>
			  </tr>
			  <tr>
				<td><?php echo $ttl_nombre;?></td>
				<td>
				  <input type="text" style="width:390;cursor:pointer" title='<?php echo $title_nombre;?>' name="nombre_herramienta" id="nombre_herramienta" />
				</td>
				</tr>
					<tr>
					<td><?php echo $ttl_unidad;?></td>
		<td>
      <select  style="width:390;cursor:pointer" title='<?php echo $title_unidad;?>' name="id_unidad" id="id_unidad">
	  <option value='0' >:.</option>
	
	<?php
			$query='SELECT unidad.id_unidad,unidad.nombre_unidad FROM unidad';
					$result = $conex->Execute($query);
					while (!$result->EOF)
			{
				echo "<option value='".$result->fields['id_unidad']."'>".$result->fields['nombre_unidad']."</option>";
				$result->MoveNext();
			} 
		?>	
      </select>
    </td>

					</td>
				  </tr>
				  
				   <tr>
					<td colspan='4' align='center'>
						<div id='div_msj' onmouseover='escribir_div_msj("");'>
						</div>
					</td>
				  </tr>
				</table> </center>
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