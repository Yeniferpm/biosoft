<?php
include_once('../../include/vars.php');
header('Context-Type: text/html; charset='.$charset);
include('cabecera.php');
set_include_path(get_include_path() .PATH_SEPARATOR .$PathApp);
session_name($session_name);
// session_start();
include'../../herramientas/adodb5/adodb.inc.php';
include '../etiquetas/esp/lbl_lista_precios.php';
//************INICIO CONEXION BASE DE DATOS**********//
$conex=NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!$conex){
	echo "<script>Error...Al Conectar></script>";
	die($err_conn_db);
	exit;}
$query="select opcion, carpeta from lenguaje where opcion = '1'; ";
$result = $conex->Execute($query);
if ($result->fields['opcion']>0){ $_SESSION['nombre_carpeta'] = $result->fields['carpeta'];}
include_once '../etiquetas/'.$_SESSION['nombre_carpeta'].'/lbl_lista_precios.php';
?>
<html >
	<head>
	<title><?php echo $ttl_pag;?></title>
	<script type = 'text/javascript'>
	function verificar(var_recibida)
		{
			// alert ('aqui toy');
			var seguir = true;
			var msj_concatenado = "Errores Encontrados <br> ";
			document.getElementById('option').value = var_recibida;
			if (document.frm_lista_precios.id_precio.value=='0')
			{
				document.getElementById("id_precio").style.borderColor ="#F91009";
				document.getElementById("div_msj").innerHTML += msj_concatenado + '* id precio <br>';
				seguir = false;
			}
			if (document.frm_lista_precios.id_usuario.value=='0')
			{
				document.getElementById("id_usuario").style.borderColor= "#F91009";
				document.getElementById("div_msj").innerHTML += '* id usuario';
				seguir = false;
			}
			if (document.frm_lista_precios.cantidad_unitaria.value=='')
			{
				document.getElementById("cantidad_unitaria").style.borderColor= "#F91009";
				document.getElementById("div_msj").innerHTML += '* cantidad unitaria';
				seguir = false;
			}
			if (document.frm_lista_precios.precio_producto.value=='')
			{
				document.getElementById("precio_producto").style.borderColor= "#F91009";
				document.getElementById("div_msj").innerHTML += '* precio del producto';
				seguir = false;
			}
			if (document.frm_lista_precios.fecha_registro.value=='')
			{
				document.getElementById("fecha_registro").style.borderColor= "#F91009";
				document.getElementById("div_msj").innerHTML += '* fecha de registro';
				seguir = false;
			}
			if (document.frm_lista_precios.fecha_cierre.value=='')
			{
				document.getElementById("fecha_cierre").style.borderColor= "#F91009";
				document.getElementById("div_msj").innerHTML += '* fecha de cierre';
				seguir = false;
			}
			if (document.frm_lista_precios.id_unidad_medida.value=='0')
			{
				document.getElementById("unidad_medida").style.borderColor= "#F91009";
				document.getElementById("div_msj").innerHTML += '* unidad de medida';
				seguir = false;
			}
			if (document.frm_lista_precios.id_producto.value=='0')
			{
				document.getElementById("id_producto").style.borderColor= "#F91009";
				document.getElementById("div_msj").innerHTML += '* id del producto';
				seguir = false;
			}
			if (seguir == true)
			{
				frm_lista_precios.submit();
			}	
		}
	function modificar()
		{
			document.getElementById('option').value = "actualizar";
			frm_lista_precios.submit();
		}		
	function limpiar()
		{
			document.frm_lista_precios.id_precio.value='0';
			document.frm_lista_precios.id_usuario.value='0';
			document.frm_lista_prcios.cantidad_unitaria.value='';
			document.frm_lista_prcios.precio_producto.value='';
			document.frm_lista_prcios.fecha_registro.value='';
			document.frm_lista_prcios.fecha_cierre.value='';
			document.frm_lista_prcios.id_unidad_medida.value='0';
			document.frm_lista_prcios.id_producto.value='0';
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
			}
			else
			{
					//Mail incorrecto
					object.style.color="#f00";
				
			}
			function preview()
			{
			var div;
			var pathImagen;
				
				pathImage = document.getElementById("image");
				pathImage = pathImage.value;
				
				
			div = document.getElementById("div-preview");
			div.innerHTML = '<img src="' + pathImage + '" alt="preview" />';
			function checkear_extension(fichero)	{
			// definimos antes los métodos prever() y limpiar()
			(/.(gif|jpg|png)$/i.test(fichero.value)) ? prever() : limpiar();
			}
			// function limpiar()	{
			// f = document.getElementById("archivo");
			// nuevoFile = document.createElement("input");
			// nuevoFile.id = f.id;
			// nuevoFile.type = "file";
			// nuevoFile.name = "archivo";
			// nuevoFile.value = "";
			// nuevoFile.onchange = f.onchange;
			// nodoPadre = f.parentNode;
			// nodoSiguiente = f.nextSibling;
			// nodoPadre.removeChild(f);
			// (nodoSiguiente == null) ? nodoPadre.appendChild(nuevoFile):
			// nodoPadre.insertBefore(nuevoFile, nodoSiguiente);
// }
}
		}	
	</script>
	
	</head>	
	<body class="lista_precios" method="post" action="pagina.php" enctype="multipart form-data">
		<center>
			<form name='frm_lista_precios' target='operaciones' action='../controlador/ctrl_lista_precios.php' method='POST'>
				<input type='text' id='option' name='option' >
				<tr>
					
				</tr><br><br>
				<h1><font size="5" color="#00000"><?php echo $ttl_pag;?></font></h1><br>
				<table border="0" width='70%'>
				    <tr>
						<td><?php echo $id_precio;?></td>
						<td><input type="text"  id="id_precio" name="id_precio" title="ingrese id precio" style= "width:200px"/></td>
						<td><?php echo $id_usuarios;?></td>
						<td>
								<select type="text"  id='id_usuario' name='id_usuario' class="form-control"  title="id_usuario"  style="width:200px;cursor:pointer;"    onmouseover='escribir_div_msj("");'  > 
									<option value='0'>:..</option>
									<?php
										$query="SELECT n_documento,id_usuario FROM registro_usuario;";
										$result = $conex->Execute($query);
										while(!$result->EOF)
										{
											echo "<option value='".$result->fields['id_usuario']."'>".$result->fields['n_documento']."</option>";
											$result->MoveNext();
										}
									?>
								</select>
						</td>
					</tr>
					<tr>
						<td><?php echo $cantidad_unitaria;?></td>
						<td><input type="text"  id="cantidad_unitaria" name="cantidad_unitaria" title="ingrese cantidad unitaria" style= "width:200px"/></td>
						<td><?php echo $precio_producto;?></td>
						<td><input type="text"  id="precio_producto" name="precio_producto" title="ingrese precio de producto" style= "width:200px"/></td>
					</tr>	
					<tr>
						<td><?php echo $fecha_registro;?></td>
						<td><input type="text"  id="fecha_registro" name="fecha_registro" title="ingrese fecha de registro" style= "width:200px"/></td>
						<td><?php echo $fecha_cierre;?></td>
						<td><input type="text"  id="fecha_cierre" name="fecha_cierre" title="ingrese fecha de cierre" style= "width:200px"/></td>
					</tr>
					<tr>
						<td><?php echo $id_unidad_medida;?></td>
						<td><select type="text" id='id_unidad_medida' name='id_unidad_medida' class="form-control"  title='id_unidad_medida'  style="width:200px;cursor:pointer;"  onmouseover='escribir_div_msj("");'>
							<option value='0'></option >
							<?php
								$query="SELECT unidad_medida,id_unidad_medida FROM unidad_de_medida;";
								$result = $conex->Execute($query);
								while(!$result->EOF)
								{
									echo "<option value='".$result->fields['id_unidad_medida']."'>".$result->fields['unidad_medida']."</option>";
									$result->MoveNext();
								}
							?>
						</td>
						
						<td><?php echo $id_producto;?></td>
						<td><select type="text" id='id_producto' name='id_producto' class="form-control"  title='id_producto'  style="width:200px;cursor:pointer;"  onmouseover='escribir_div_msj("");' >
							<option value='0'></option >
							<?php
								$query="SELECT nombre_producto,id_producto FROM productos;";
								$result = $conex->Execute($query);
								while(!$result->EOF)
								{
									echo "<option value='".$result->fields['id_producto']."'>".$result->fields['nombre_producto']."</option>";
									$result->MoveNext();
								}
							?>
						</td>
					</tr>	
					<tr>
							<td colspan='4' align='center' >
								<div id='div_msj' onmouseover='escribir_div_msj("");'>
								</div>
							</td>
					</tr>
					<tr align="center">
						<td height="33">FOTO</td>
						<td><input type="file" name="inputFile" id="image" onchange="preview()" />
					</tr>
				</table><br><br>
				<table>
					<tr>
						<td colspan='4' align='center' >
							<button type='button' id='btn_guardar' name='btn_guardar' onclick='verificar("guardar");' title='GUARDAR' style='width:20p%' ><?php echo $value_guardar;?></button >
							<button type='button'  id='btn_actualizar' onclick="modificar ();" name='btn_actualizar' title='ACTUALIZAR' style='width:20p%' ><?php echo $value_actualizar;?></button >
							<button type='button' id='btn_buscar'  name='btn_buscar' title='CONSULTAR' style='width:20p%' ><?php echo $value_consultar;?></button >
							<button type='button' id='btn_limpiar'  name='btn_limpiar' title='LIMPIAR' style='width:20p%' onclick='limpiar();' ><?php echo $value_cancelar;?></button >
						</td>
					</tr>
				</table>
			</form>
			<iframe name='operaciones' style='display:yes' width='100%' height=''></iframe>
			<?php $conex->close(); 	?>
		</center>
		<div id="div-preview"></div>
	</body>
</html>

