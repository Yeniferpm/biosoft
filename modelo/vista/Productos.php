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
if (!conex){
	echo "<script>Error...Al Conectar></script>";
	die($err_conn_db);
	exit;}
include_once '../../modelo/etiquetas/Esp/lbl_productos.php';
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $ttl_pag;?></title>
</head>

<script type = "text/javascript">
			function verificar(var_recibida)
				{
					var seguir = true;
					var msj_concatenado = "Errores Encontrados <br> ";
					document.getElementById('option').value = var_recibida;
					if (document.frm_producto.tipo_producto.value=='0'){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '*Tipo de Producto <br>';
						seguir = false;
					}
					if (document.frm_producto.nombre_producto.value==''){

						document.getElementById("div_msj").innerHTML +=  '*Nombre de Producto <br>';
						seguir = false;
					}
					if (document.frm_producto.id_categoria.value=='0'){

						document.getElementById("div_msj").innerHTML +=  '*Categoria';
						seguir = false;
					}
					
				if (seguir == true)
					{
						frm_producto.submit();
					}	
				}

			function modificar()
				{
					document.getElementById('option').value = "actualizar";
					frm_producto.submit();
					
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
			function limpiar()
				{
					document.frm_producto.tipo_producto.value=' ';
					document.frm_producto.nombre_producto.value=' ';
					document.frm_producto.id_categoria.value=' ';
				}
			function escribir_div_msj(msj_recibido)
				{
					document.getElementById("div_msj").innerHTML = msj_recibido;
				}
					
		</script>

	<form name='frm_producto' target='operaciones' action='../../modelo/controlador/ctrl_producto.php' method='POST'>
			<input type='hidden' id='option' name='option'>
			
		<center><h1><?php echo $ttl_bienvenido;?></h1></center>
			<body>
	
			<br><br>	
		<center><table width="1063" height="37" cellpadding="2">
    
			<tr>
			<td width="312" height="31">
			<center>
				<?php echo $ttl_selec_tipo_producto;?>:
					<select style="cursor:pointer" title="<?php echo $ttl_selec_tipo_producto;?>" name="tipo_producto" id="tipo_producto">
          
								<option value='0'>:..</option>
									<?php
										$query='SELECT tipo_producto FROM tipo_producto';
										$result = $conex->Execute($query);
										while(!$result->EOF)
										{
											echo "<option value='".$result->fields['tipo_producto']."'>".$result->fields['tipo_producto']."</option>";
												$result->MoveNext();
										}
									?>
					</select>
			</center></td>
	  
			<td width="501">
				<center>
					<?php echo $ttl_nombre_producto;?>:
					<input title="<?php echo $title_nombre_producto;?>" style="cursor:pointer"type="text" onKeyPress="return soloLetras(event)" name="nombre_producto" id="nombre_producto" />
				</center></td>
			 <td width="238" height="31"><center>
					<?php echo $ttl_categoria_producto;?>:
				<select style="cursor:pointer" title="<?php echo $$ttl_categoria_producto;?>" name="id_categoria" id="id_categoria">
				  
		  <option value='0'>:..</option>
						<?php
								$query='SELECT categoria FROM categoria';
								$result = $conex->Execute($query);
								while(!$result->EOF)
								{
									echo "<option value='".$result->fields['categoria']."'>".$result->fields['categoria']."</option>";
										$result->MoveNext();
										}
						?>
		  </select>
      </center></td>
      </tr>
  </table>
  <br>
  <tr>
							<td colspan='4' align='center'>
								<div id='div_msj' onmouseover='escribir_div_msj("");'></div>
							</td>
						</tr>
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
					<button type='button' id='btn_limpiar' onclick='limpiar();' name='btn_limpiar' title='<?php echo $title_btn_limpiar;?>' style='width:20p%; cursor:pointer;' >
					<?php echo $value_limpiar;?>
					</button >
		
		<iframe name='operaciones' style='display:none' width='100%' height=''></iframe>
			<?php $conex->close(); 	?>

</form>		
</body>
</html>
