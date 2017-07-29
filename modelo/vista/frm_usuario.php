<?php
include_once('../../include/vars.php');
header('Context-Type: text/html; charset='.$charset);
set_include_path(get_include_path() .PATH_SEPARATOR .$PathApp);
session_name($session_name);
// session_start();
include'../../herramientas/adodb5/adodb.inc.php';
//************INICIO CONEXION BASE DE DATOS**********//
$conex=NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
// if (!conex){
	// echo "<script>Error...Al Conectar></script>";
	// die($err_conn_db);
	// exit;}
include_once '../etiquetas/ESP/lbl_registro_usuario.php';
?>
<html>
	<head>
		<title><?php echo $ttl_bienvenido; ?></title>
		<script type='text/javascript' src='/proyecto_modelo/herramientas/jquery/jquery-1.8.2.js'></script>
	<script type = "text/javascript">
		$(document).ready(function (){
				$('#nombre_rol').change(function(){
					if($('#nombre_rol').val() == '2' )
					{  $('#codigo_ficha').attr('disabled', 'disabled') && $('#nombre_estado').attr('disabled', 'disabled'); }
					else if(($('#nombre_rol').val() == '1' ))
					{   $('#codigo_ficha').removeAttr("disabled") && $('#nombre_estado').removeAttr("disabled"); }
				});				
			});
		
	</script>

		</script>
		<script type = "text/javascript">
			function verificar (var_recibida)
			{
				var seguir = true;
				var msj_concatenado = "Errores Encontrados <br> ";
				document.getElementById('option').value=var_recibida;
				if (document.frm_usuario.codigo_ficha.value=='0'){
					document.getElementById("div_msj").innerHTML += msj_concatenado+'*numero de ficha<br>';
					seguir = false;
				}
				if (document.frm_usuario.nombre_rol.value=='0'){
					document.getElementById("div_msj").innerHTML += '*Rol<br>';
					seguir = false;
				}
				if (document.frm_usuario.nombre_estado.value=='0'){
					document.getElementById("div_msj").innerHTML += '*Estado<br>';
					seguir = false;
				}
				if (document.frm_usuario.nombres.value==''){
					document.getElementById("div_msj").innerHTML += '*Nombres<br>';
					seguir = false;
				}
				if (document.frm_usuario.apellidos.value==''){
					document.getElementById("div_msj").innerHTML += '*Apellidos<br>';
					seguir = false;
				}
				if (document.frm_usuario.nombre_tipo_documento.value=='0'){
					document.getElementById("div_msj").innerHTML += '*Tipo documento<br>';
					seguir = false;
				}
				if (document.frm_usuario.n_documento.value==''){
					document.getElementById("div_msj").innerHTML += '*Numero documento<br>';
					seguir = false;
				}
				if (document.frm_usuario.celular.value==''){
					document.getElementById("div_msj").innerHTML += '*Celular<br>';
					seguir = false;
				}
				if (document.frm_usuario.correo_usuario.value==''){
					document.getElementById("div_msj").innerHTML += '*Correo electronico<br>';
					seguir = false;
				}
				if (document.frm_usuario.clave.value==''){
					document.getElementById("div_msj").innerHTML += '*Clave<br>';
					seguir = false;
				}
				if (seguir==true)
					{
					frm_usuario.submit();
	
					}
			}
				function validateMail(correo_usuario)
					{
					//Creamos un objeto 
					object=document.getElementById(correo_usuario);
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
			/* function enviar()
			{
				document.getElementById('option').value = "guardar";
				frm_usuario.submit();
			} */
			function modificar(){
				document.getElementById('option').value = "actualizar";
				frm_usuario.submit();
				
			}
			function soloLetras(evt){ 

							evt = (evt) ? evt : event; 
								var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : 
								((evt.which) ? evt.which : 0)); 
							if (charCode > 31 && (charCode < 64 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode > 32) && (charCode > 241 || charCode < 209)) 
							{ 
									// alert("Solo se permiten letras en este campo.");
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
			function limpiar ()
				{
					document.frm_usuario.reset();
					document.frm_usuario.btn_actualizar.disabled=true;
					document.frm_usuario.btn_eliminar.disabled=true;
					document.frm_usuario.btn_guardar.disabled=false;
					document.frm_usuario.btn_consultar.disabled=false;
					document.getElementById("codigo_ficha").className = '';
					document.getElementById("nombre_rol").className = '';
					document.getElementById("nombre_estado").className = '';
					document.getElementById("nombres").className = '';
					document.getElementById("apellidos").className = '';
					document.getElementById("nombre_tipo_documento").className = '';
					document.getElementById("n_documento").className = '';
					document.getElementById("celular").className = '';
					document.getElementById("correo_usuario").className = '';
					document.getElementById("clave").className = '';
					
				}
			function escribir_div_msj(msj_recibido)
				{
					// alert('limpiar');
					document.getElementById("div_msj").innerHTML = msj_recibido;
				}									
		</script>
	</head>
	<body class="usuario">
		<center>
			<form name='frm_usuario' target='operaciones' action='../controlador/ctrl_grilla_usuario.php' method='POST'>
				<input type='hidden' id='option' name='option'>
				<h1><font size="10" color="#00000" align='center'><?php echo $ttl_pag;?></FONT></h1>
				<table border="0">
					<tr>
						<td><?php echo $rol_usuario; ?></td>
						<td>
							<select type="text" class="form-control" id='nombre_rol' name='nombre_rol' title='<?php echo $title_rol_usuario; ?>' required="" style="width:245px; cursor:pointer;" />
								<option value='0'>:..</option>                                                                                                   
								<?php                         
									$query="SELECT rol.id_rol, nombre_rol FROM rol;";
									$result = $conex->Execute($query);
									while(!$result->EOF)
									{
										echo "<option value='".$result->fields['id_rol']."'>".$result->fields['nombre_rol']."</option>";
										$result->MoveNext();
									}
								?>
							</select>
						</td>
						<td><?php echo $numero_ficha_usuario; ?></td>
						<td>
							<select type='text' class='form-control' id='codigo_ficha' name='codigo_ficha' required="" style="width:245px; cursor:pointer;"/>
								<option value='0'>:..</option>
								<?php
									$query="SELECT ficha.codigo_ficha FROM ficha;";
									$result = $conex->Execute($query);
									while(!$result->EOF)
									{
										echo "<option value='".$result->fields['codigo_ficha']."'>".$result->fields['codigo_ficha']."</option>";
										$result->MoveNext();
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><?php echo $estado_usuario; ?></td>
						<td>
							<select type='text' class='form-control' id='nombre_estado' name='nombre_estado' title='<?php echo $title_estado_usuario;?>' required="" style="width:245px; cursor:pointer;" />
								<option value='0'>:..</option>
								<?php
									$query="SELECT estado.id_estado, nombre_estado FROM estado;";
									$result = $conex->Execute($query);
									while(!$result->EOF)
									{
										echo "<option value='".$result->fields['id_estado']."'>".$result->fields['nombre_estado']."</option>";
										$result->MoveNext();
									}
								?>
							</select>
						</td>						
						<td><?php echo $nombre_usuario;?></td>
						<td><input type='text' class='form-control' onkeypress=" return soloLetras(event)" maxlength='100' id='nombres' name='nombres'  title='<?php echo $title_nombre_usuario;?>' required="" style="width:245px; cursor:pointer;" /></td>
					</tr>
					<tr>
						<td><?php echo $apellido_usuario;?></td>
						<td><input type='text' class='form-control' onkeypress=" return soloLetras(event)" id='apellidos' maxlength='100' name='apellidos'   title='<?php echo $title_apellido_usuario;?>' required="" style="width:245px; cursor:pointer;"></td>
						<td><?php echo $tipo_documento_usuario;?></td>
						<td>
							<select type='text' class='form-control' id='nombre_tipo_documento' name='nombre_tipo_documento' title='<?php echo $title_tipo_documento_usuario;?>' required="" style="width:245px; cursor:pointer;" />
								<option value="0">:..</option>
								<?php
									$query="SELECT tipo_documento.id_tipo_documento, nombre_tipo_documento FROM tipo_documento;";
									$result = $conex->Execute($query);
									while(!$result->EOF)
									{
										echo "<option value='".$result->fields['id_tipo_documento']."'>".$result->fields['nombre_tipo_documento']."</option>";
										$result->MoveNext();
									}
								?>
							</select>
						</td>						
					</tr>
					<tr>
						<td><?php echo $numero_documento_usuario;?></td>
						<td><input type='text' class='form-control' onkeypress=" return soloNumeros(event)" maxlength='30' id='n_documento' name='n_documento'  title='<?php echo $title_numero_documento_usuario;?>' required="" style="width:245px; cursor:pointer;"></td>
						<td><?php echo $celular_usuario;?></td>
						<td><input type='text' class='form-control' onkeypress=" return soloNumeros(event)" maxlength='20' id='celular' name='celular'  title='<?php echo $title_celular_usuario;?>' required="" style="width:245px; cursor:pointer;" ></td>
					</tr>
					<tr>
						<td><?php echo $correo_electronico_usuario;?></td>
						<td><input type='text' class='form-control' onKeyUp="javascript:validateMail('correo_us')" maxlength='100' id='correo_usuario' onkeypress='return validateMail(correo_usuario)' name='correo_usuario'  title='<?php echo $title_correo_electronico_usuario;?>' required="" style="width:245px; cursor:pointer;"></td>
						<td><?php echo $clave_usuario;?></td>
						<td><input type='password' class='form-control' id='clave' maxlength='100' name='clave' title='<?php echo $title_clave_usuario;?>' required="" style="width:245px; cursor:pointer;"></td>
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
							<button type='button' id='btn_guardar' name='btn_guardar' onclick='verificar("guardar");' title='<?php echo $title_btn_guardar;?>' style='width:20p%; cursor:pointer;' >
							<?php echo $value_guardar;?>
							</button >
						</td>
					</tr>
				</table>
			</form>
			<iframe name='operaciones' style='display:none' width='100%' height=''></iframe>
			<?php $conex->close(); ?>
		</center>
	</body>
</html>
