<?php
include_once('../../include/vars.php'); //ruta relativa al directorio include
header('Context-Type: text/html; charset='.$charset);
include('frm_cabecera.php');
set_include_path(get_include_path() .PATH_SEPARATOR .$PathApp);
session_name($session_name);
session_start();
include'../../herramientas/adodb5/adodb.inc.php';
//************INICIO CONEXION BASE DE DATOS**********//
$conex=NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!conex){
	echo "<script>Error...Al Conectar></script>";
	die($err_conn_db);
	exit;}
#include_once '../etiquetas/esp/lbl_unidades.php';
?>

<html>
<head>
		<title>centro</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript">
										function verificar(var_recibida)
				{
					// alert('si');
					var seguir = true;
					var msj_concatenado = "Errores Encontrados <br> ";
					document.getElementById('option').value = var_recibida;
					if (document.frm_centro.id_centro.value==''){
						// document.getElementById("codigo_centro").style.borderColor ="#F91009";
						document.getElementById("div_msj").innerHTML += msj_concatenado + '* nombre de codigo';
						seguir = false;
					}
					if (document.frm_centro.nombre_centro.value==''){
						// document.getElementById("nombre_centro").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML +=  '<br>* nombre centro';
						seguir = false;
					}
					if (document.frm_centro.telefono_centro.value==''){
						// document.getElementById("telefono_centro").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* telefono centro';
						seguir = false;
					}
					if (document.frm_centro.direccion_centro.value==''){
						// document.getElementById("direccion_centro").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* direccion centro';
						seguir = false;
					}
					if (document.frm_centro.correo_centro.value==''){
						// document.getElementById("correo_centro").style.borderColor= "#F91009";
						document.getElementById("div_msj").innerHTML += '<br>* correo centro';
						seguir = false;
					}if (document.frm_centro.codigo_regional.value==''){
						// document.getElementById("codigo_regional").style.borderColor= "#F91009";
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
			function soloNumeros(e)
				{
					var key = window.Event ? e.which : e.keyCode
					return ((key >= 48 && key <= 57)||(key == 8))
				}	
				function cancelar() {
										document.frm_centro.codigo_centro.value= "";
										document.frm_centro.nombre_centro.value= "";										
										document.frm_centro.telefono_centro.value= "";
										document.frm_centro.direccion_centro.value= "";
										document.frm_centro.correo_centro.value= "";
										document.frm_centro.codigo_regional.value= "";
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
<input type='hidden' id='option' name='option' style="display:yes;">
<br><br><br><br><br><br><br><br><br><br><br><br>
<center> <h1>CENTRO</h1></center>
<center>
<table width="900" border="0" colspan="4">
  <br>
  <tr>
    <td width="50"> CODIGO</td>
    <td width="144">
      <input type="text" name="codigo_centro" id="codigo_centro" />
    </td>
	<td> CODIGO REGIONAL </td>
    <td width="800">
    
      <select name="id_regional" id="id_regional"style="width:390">
	  <option value='0' >:.</option>
											<?php
												$query='SELECT regional.id_regional, regional.nombre_regional FROM regional';
														$result = $conex->Execute($query);
														while (!$result->EOF)
												{
													echo "<option value='".$result->fields['id_regional']."'>".$result->fields['id_regional']." ".$result->fields['nombre_regional']."</option>";
													$result->MoveNext();
												} 
											?>	
      </select>
    </td>
  </tr>
  <tr>
    <td>NOMBRE </td>
    <td>
      <input type="text" name="nombre_centro" id="nombre_centro" />
	  <td width="900">DIRECCION</td>
    <td width="0">
      <input style="width:390"type="text" name="direccion_centro" id="direccion_centro" />
    </td>
  </tr>
  <tr>
    <td>TELEFONO</td>
    <td>
      <input type="text" name="telefono_centro" id="telefono_centro" />
    </td>
    <td>CORREO</td>
    <td width="5">
      <input style="width:390" type="text" name="correo_centro" id="correo_centro" />
    </td>
  </tr>
  <tr>
	<td colspan='4' align='center'>
		<div id='div_msj' onmouse='escribir_div_msj("");'>
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
							<button type='button'  id='btn_actualizar' onclick="modificar ();" name='btn_actualizar' title='' style='width:20p%' >
								ACTUALIZAR
							</button >
							<button type='button' id='btn_buscar'  name='btn_buscar' title='' style='width:20p%' >
								CONSULTAR
							</button >
							<button type='button' id='btn_cancelar'  name='btn_cancelar' title='' style='width:20p%' onclick='cancelar();' >
								LIMPIAR
							</button >
						</td>
					</tr>
<iframe name='operaciones' style='display:none' width='100%' height=''></iframe>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<?php $conex->close();	
				include('pie_pag.php');
			?>
		</center>
	</body>
</html>