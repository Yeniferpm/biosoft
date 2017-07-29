<?php
include_once('../../include/vars.php');//ruta relativa
header('Context-Type: text/html; charset=' $charset);
set_include_path(get_include_path()PATH_SEPARATOR. $PathApp);
session_name($session_name);
session_start();
include'../../herramientas/adodb5/adodb.inc.php';
//**********inicio conexion base de datos*******//
$conex=NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if(!conex){
	echo"<script>Error...al conectar</script>"
	die($err_conn_db);
	exit;}
include_once'../etiquetas/esp/lbl_ficha.php';
?>
<html>
	<head>
		<title><?php echo $ttl_bienvenido;?></title>
		<link rel="stylesheet" href="../../css/css_Biofabrica/style.css" type="text/css">
		<script type="text/javascript">
				function verificar(var_recibida)
				{
					var seguir = true;
					var msj_concatenado = "Errores encontrados<br>";
					document.getElementById('option').value = var_recibida;
					if (document.frm_ventas.fecha.value==''){
						document.getElementById("div_msj").innerHTML +=  '*Fecha';
						seguir = false;
					}
						if (document.frm_ventas.id_ventas.value==''){
						document.getElementById("div_msj").innerHTML += msj_concatenado+ '*Numero ventas';
						seguir = false;
					}
					if (document.frm_ventas.id_cantidad_producto.value=='0'){
						document.getElementById("div_msj").innerHTML +=  '*Cantidad Producto Disponible';
						seguir = false;
					}
					if (document.frm_ventas.id_producto.value=='0'){
						document.getElementById("div_msj").innerHTML +=  '*Nombre Producto';
						seguir = false;
					}
					if (document.frm_ventas.cantidad_ventas.value==''){
						document.getElementById("div_msj").innerHTML +=  '*Cantidad Producto';
						seguir = false;
					}
					if (document.frm_ventas.unidad_medida.value=='0'){
						document.getElementById("div_msj").innerHTML +=  '*Unidad Medida';
						seguir = false;
					}
					if (document.frm_ventas.id_precio.value=='0'){
						document.getElementById("div_msj").innerHTML +=  '*Precio Producto';
						seguir = false;
					}
					if (document.frm_ventas.total_apagar.value==''){
						document.getElementById("div_msj").innerHTML +=  '*Total a Pagar';
						seguir = false;
					}
					if (document.frm_ventas.n_documento.value=='0'){
						document.getElementById("div_msj").innerHTML += '*Responsable Venta';
						seguir = false;
					}
					
					if (document.frm_ventas.recibe.value==''){
						document.getElementById("div_msj").innerHTML +='*Recibe';
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
		<script type="text/javascript" src="../../calendario-jquery/calendario_dw/jquery-1.4.4.min.js"></script>			<script type="text/javascript" src="../../calendario-jquery/calendario_dw/calendario_dw.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			$(".campofecha").calendarioDW();
			})
			}
		</script>
	</head>
	<body class="ventas">
		<center>
		<form>
		<table>
		<tr>
		<td><?php echo $ttl_id_venta; ?><td>
		<td><input type="text" id="id_ventas" name="id_ventas" class="form-control" title="<?php echo $title_?>"><td>
		</tr>
		</table>
		</form>
	</body>
</html>