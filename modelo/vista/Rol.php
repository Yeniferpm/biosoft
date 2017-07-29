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
// if (!conex){
	// echo "<script>Error...Al Conectar></script>";
	// die($err_conn_db);
	// exit;}
include_once '../../modelo/etiquetas/Esp/lbl_rol.php';
?>
<html>
<title><?php echo $ttl_pag;?></title>
<head>
<script type = "text/javascript">
			function verificar(var_recibida)
				{
					var seguir = true;
					var msj_concatenado = "Errores Encontrados <br> ";
					document.getElementById('option').value = var_recibida;
					if (document.frm_rol.nombre_rol.value==''){

						document.getElementById("div_msj").innerHTML += msj_concatenado + '*Nombre Rol';
						seguir = false;
					}
					
				if (seguir == true)
					{
						frm_rol.submit();
					}	
				}

			function modificar()
				{
					document.getElementById('option').value = "actualizar";
					frm_rol.submit();
					
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
					document.frm_rol.nombre_rol.value=' ';
				}
			function escribir_div_msj(msj_recibido)
				{
					document.getElementById("div_msj").innerHTML = msj_recibido;
				}
					
		</script>		
	

</head>
	<form name='frm_rol' target='operaciones' action='../../modelo/controlador/ctrl_rol.php' method='POST'>
			<input type='hidden' id='option' name='option'>
		<h1>
		<center><?php echo $ttl_bienvenido;?></center></h1>
		<body class="rol">

			
	<center>
			
		<?php echo $ttl_ingreso_rol;?>  : <input onkeypress="return soloLetras(event)" type="text" id="nombre_rol" name="nombre_rol"  title='<?php echo $title_nombre_rol;?>' required="" style="width:245px; cursor:pointer;" onmouseover='escribir_div_msj("");'  />	
			</p>
			<tr>
							<td colspan='4' align='center'>
								<div id='div_msj' onmouseover='escribir_div_msj("");'></div>
							</td>
						</tr>
			<br>	
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
	
	</center>
	
	</body>
	
</form>
</html>
