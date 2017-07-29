<?php
require_once('../../include/config.php');
header("Content-Type: text/html; charset=".$arrayGlobalsParameters['CharSet']);
chdir($arrayGlobalsParameters['PathApp']);
session_name($arrayGlobalsParameters['SessionName']);
session_start();
include('modelo/etiquetas/lbl_ingresoUsuario.php');
//$_SESSION['IdUsuarioActivo'] = '1';
if (!$_SESSION['IdUsuarioActivo']){
	echo "No hay una session activa";
}
else if ($_SESSION['IdUsuarioActivo']){

//INICIO DE CONTENIDO DE MUDULO
//******************** Inicio Conexion a la DB ********************
include('include/conexion.php');
$conex = conectaBaseDatos($arrayGlobalsParameters['db_conf']);
//******************** Fin Conexion a la DB ********************

$var_date = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta 	http-equiv='Content-Type' content='text/html; charset=<?php echo $codificacion; ?>' />
		<title><?php echo $titulo_sitio; ?></title>
		<script type='text/javascript' src='<?php echo $_SESSION['DomainApp']; ?>/herramientas/jquery/js/jquery-1.8.2.js'></script>
		<link 	rel='stylesheet' type='text/css'  media='all' href='../../css/estilo0.css'></LINK>
		
		<!-- Bootstrap core CSS -->
		<link href='<?php echo $_SESSION['DomainApp']; ?>/js/bootstrap/dist/css/bootstrap.css' rel='stylesheet'>
		<link rel='stylesheet' href='<?php echo $_SESSION['DomainApp']; ?>/fonts/font-awesome-4/css/font-awesome.min.css'>
		
		<script>
			function ValidaEnvio(action) {
				var msgerror = "<?php echo $err_transac1; ?>\n<?php echo $err_transac2; ?>\n\n";
				var std = true;
				var er_numeros = /^([0-9])+$/

				if ($("#tipo_documento_usu").val() == 0) {
					msgerror = msgerror+"* Tipo de Documento\n";
					std=false;
				}

				if ($("#numero_documento_usu").val() == '') {
					msgerror = msgerror+"* Numero de documento\n";
					std=false;
				}
				else {
					if(!er_numeros.test($("#numero_documento_usu").val())) {
						msgerror = msgerror+"El valor ingresado como Numero de documento no es valido\n";
						std=false;
					}
				}

				if ($("#nombres_usu").val() == '') {
					msgerror = msgerror+"* Nombres\n";
					std=false;
				}

				if ($("#primer_apellido_usu").val() == '') {
					msgerror = msgerror+"* Primer Apellido\n";
					std=false;
				}

				if ($("#codigo_dpto").val() == 0) {
					msgerror = msgerror+"* Departamento\n";
					std=false;
				}

				if ($("#codigo_municipio").val() == 0) {
					msgerror = msgerror+"* Municipio\n";
					std=false;
				}

				if ($("#direccion_residencia_usu").val() == '') {
					msgerror = msgerror+"* Direccion\n";
					std=false;
				}

				if ($("#telefono_usu").val() == '') {
					msgerror = msgerror+"* Telefono\n";
					std=false;
				}

				if ($("#celular_usu").val() == '') {
					msgerror = msgerror+"* Celular\n";
					std=false;
				}

				if ($("#login").val() == '') {
					 msgerror = msgerror+"* Login\n";
					 std=false;
				}

				if ($("#estado_usu").val() == 0) {
					 msgerror = msgerror+"* Estado\n";
					 std=false;
				}

				if ($("#id_cargo").val() == 0) {
					 msgerror = msgerror+"* Cargo\n";
					 std=false;
				}

				if ($("#correo_usu").val() != '')
						{
							if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($("#correo_usu").val())) {		}
							else
								{
									msgerror = msgerror+"* El Dato ingresado como Correo no es valido\n";
									std=false;
								}
						}

				if (std == false) {
					alert(msgerror);
					return false;
				}
				else if (std == true) {
					$('#btn_ins').attr('disabled', true);
					$.post("../controlador/admin_Uusarios.php", {
						action:'<?php echo $_GET['action'] ?>',
						id_usu:'<?php echo $_GET['id_usu'] ?>',
						id_tipo:'<?php echo $_GET['tipo'] ?>',
						id_entidad:$("#id_entidad").val(),
						codigo_dpto:$("#codigo_dpto").val(),
						codigo_municipio:$("#codigo_municipio").val(),
						id_cargo:$("#id_cargo").val(),
						tipo_documento_usu:$("#tipo_documento_usu").val(),
						numero_documento_usu:$("#numero_documento_usu").val(),
						nombres_usu:$("#nombres_usu").val(),
						primer_apellido_usu:$("#primer_apellido_usu").val(),
						segundo_apellido_usu:$("#segundo_apellido_usu").val(),
						direccion_residencia_usu:$("#direccion_residencia_usu").val(),
						telefono_usu:$("#telefono_usu").val(),
						celular_usu:$("#celular_usu").val(),
						correo_usu:$("#correo_usu").val(),
						estado_usu:$("#estado_usu").val(),
						login:$("#login").val(),
						contrasena:$("#contrasena").val()
					}, function(data){
						if (data.Result == 'OK'){
							$('#btn_ins').attr('disabled', false);
							window.parent.$('#ventana1').dialog('close');
							window.parent.$('#LoadRecordsButton').click();
							alert(data.Message);
						}
						else{
							$('#btn_ins').attr('disabled', false);
							alert(data.Message);
						}
					}, 'json');
						return false;
					}
			}
//*********************************************************************************************************************
			$(document).ready(function(){
				$("#codigo_dpto").change(function () {
					$("#codigo_dpto option:selected").each(function () {
						$("#codigo_municipio").html("");

						if ($(this).val() == '0'){
							$("#codigo_municipio").html("<option value='0'>...</option>");
						}
						else {
							$.post("../controlador/admin_Uusarios.php", { action: 'carga_municipios', departamento: $(this).val() }, function(data){
								$("#codigo_municipio").html(data);
							});
						}
					});
				 });

				$("#numero_documento_usu").change(function () {
					var numero_documento_usu;
					numero_documento_usu=$(this).val();
					$.post("../controlador/admin_Uusarios.php", {
						action: 'verificaLogin',
						numero_documento_usu: numero_documento_usu
					}, function(data){
						if (data.Result == 'OK'){
							$("#login").val(numero_documento_usu);
							$("#divMsjVerificacionLogin").html("");
						}
						else{
							$("#divMsjVerificacionLogin").html(data.Message);
							$("#login").val("");
							$("#numero_documento_usu").focus();
						}
					}, 'json');

				 });
			});

			function EditaFoto(id_usu, opcion){
				if (id_usu!='')
						{
							if (opcion=='cargar')
								{
									ventana1('modelo/vista/admin_foto_usu.php?id_usu='+id_usu,500,120,'Cargar Foto Usuario');
								}
						}
					else
						{
							alert('no hay un usuario activo');
						}
					}

			function bloqueo(){
					document.act_usu.numero_documento_usu.disabled	=true;
					document.act_usu.tipo_documento_usu.disabled	=true;
					document.act_usu.id_cargo.disabled				=true;
					document.act_usu.login.disabled					=true;
					document.act_usu.estado_usu.disabled			=true;
				}
		</script>
	</head>
	<body oncontextmenu='return <?php echo $arrayGlobalsParameters['oncontextmenu']; ?>' onselectstart='return <?php echo $arrayGlobalsParameters['onselectstart']; ?>' ondragstart='return <?php echo $arrayGlobalsParameters['ondragstart']; ?>'>
		<?php
			$var_value="Guardar Registro";
			$var_readonly="readonly";
			if ($_GET['action']=='actualiza_usuario'){
					$var_value="Actualizar Registro";
					$var_readonly="readonly";
					$query="SELECT usuario.id_usu,	usuario.fecha_registro_usuario,	usuario.codigo_dpto, usuario.codigo_municipio,  usuario.id_entidad,
								usuario.id_cargo, usuario.tipo_documento_usu, usuario.numero_documento_usu,	usuario.login, usuario.estado_usu,
								usuario.correo_usu, usuario.celular_usu, usuario.telefono_usu, usuario.nombres_usu, usuario.direccion_residencia_usu, usuario.segundo_apellido_usu,
								usuario.primer_apellido_usu
							FROM $db.usuario
							WHERE (id_usu = '".$_GET['id_usu']."')";
					// echo "<br>".$query;
					$resultUsuario=$conex->Execute($query);
					$var_date=$resultUsuario->fields['fecha_registro_usuario'];
					if ($resultUsuario->recordcount()==0){
							echo "El usuario no existe";
							exit();
						}
				}
		?>
		<form name="act_usu" >
			<table width="80px" border="0" align="center" cellpadding="0" cellspacing="0" >
				<tr>
					<td colspan="2" align="center" class='etiqueta3'>
						<input type='hidden' 	id='id_usu' 		name='id_usu' 		value='<?php echo $_GET['id_usu']; ?>' 	>
						<input type='hidden' 	id='tipo' 			name='tipo' 		value='<?php echo $_GET['tipo']; ?>' >
						<input type='hidden' 	id='action' 		name='action' 		value='<?php echo $_GET['action']; ?>'  >
						<input type='hidden' 	id='id_entidad' 	name='id_entidad' 	value='<?php echo $_GET['id_entidad']; ?>'  >
						<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" >
							<tr>
								<td colspan="4" align="center" class='td_titulo'>DATOS PERSONALES</td>
							</tr>
							<tr>
								<td width="40%" class='etiqueta3'>Fecha Registro</td>
								<td width="40%" class='etiqueta3'>Tipo Documento</td>
								<td width="28%" class='cuadro' align="center" id='div_foto' rowspan="6">
									<img align="center" src='../../images/null.jpg'>
								</td>
							</tr>
							<tr>
								<td>
									<input id='fecha_registro_usuario'  name='fecha_registro_usuario' type='text' style="width:160px" title='Fecha de Registro' value ='<?php echo $var_date;?>' readonly>
								</td>
								<td>
									<select name="tipo_documento_usu" id="tipo_documento_usu" style="width:90%" class='campo' title='Tipo de documento' >
										<option value='0'>...</option>
										<?php
											foreach ($array_tipo_identificacion as $codigoArray => $valorArray) {
												if ($resultUsuario->fields['tipo_documento_usu'] == $codigoArray){ $selected="selected"; }
												else{ $selected=""; }

												echo "<option value='".$codigoArray."' $selected>".$valorArray."</option>";
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td  class='etiqueta3'>Numero Documento</td>
								<td class='etiqueta3' >Nombres</td>
							</tr>
							<tr>
								<td >
									<input id='numero_documento_usu' name='numero_documento_usu' type='text' style="width:160px" title='Numero documento' value='<?php echo $resultUsuario->fields['numero_documento_usu']; ?>' class='campo' >
									<div id='divMsjVerificacionLogin' class='textcolor' ></div>
								</td>
								<td>
									<input name="nombres_usu" id="nombres_usu" type='text' style="width:160px" title='Nombres'  class='campo' value ='<?php echo $resultUsuario->fields['nombres_usu'];?>' >
								</td>
							</tr>
							<tr>
								<td class='etiqueta3' >Primer Apellidos</td>
								<td class='etiqueta3' >Segundo Apellido</td>
							</tr>
							<tr>
								<td >
									<input name="primer_apellido_usu" id="primer_apellido_usu" type='text' style="width:160px" title='Primer Apellido'  class='campo' value ='<?php echo $resultUsuario->fields['primer_apellido_usu'];?>' >
								</td>
								<td >
									<input name="segundo_apellido_usu" id="segundo_apellido_usu" type='text' style="width:160px" title='Segundo Apellido'  class='campo' value ='<?php echo $resultUsuario->fields['segundo_apellido_usu'];?>' >
								</td>
							</tr>
							<tr>
								<td colspan="4" align="center" class='td_titulo'>DATOS DE RESIDENCIA Y CONTACTO</td>
							</tr>
							<tr>
								<td colspan="3" >
									<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
										<tr>
											<td class='etiqueta3'>Dapartamento</td>
											<td class='etiqueta3'>Municipio</td>
											<td class='etiqueta3' >Correo</td>
										</tr>
										<tr>
											<td width="30%" >
												<select title="Departamento" name="codigo_dpto" id="codigo_dpto" class='campo' style="width:135px" >
													<option value='0'>...</option>
													<?php
														$query="SELECT  codigo_dpto, nombre_dpto FROM dpto";
														$result=$conex->Execute($query);
														while (!$result->EOF){
															if ($resultUsuario->fields['codigo_dpto'] == $result->fields['codigo_dpto']){ $selected="selected"; }
															else{ $selected=""; }
															echo "<option value='".$result->fields[codigo_dpto]."' $selected>".$result->fields[nombre_dpto]."</option>";
															$result->MoveNext();
														}
													?>
												</select>
											</td>
											<td width="30%">
												<select title="Municipio" name="codigo_municipio" id="codigo_municipio" class='campo' style="width:135px" value ='<?php echo $resultUsuario->fields['codigo_municipio'];?>'>
													<?php
														if ($_GET['action']=='actualiza_usuario'){
															$query="SELECT  codigo_municipio, nombre_municipio FROM municipio
																	WHERE (codigo_dpto = '".$resultUsuario->fields['codigo_dpto']."')
																	order by nombre_municipio";
															$result=$conex->Execute($query);
															while (!$result->EOF){
																if ($resultUsuario->fields['codigo_municipio'] == $result->fields['codigo_municipio']){ $selected="selected"; }
																else{ $selected=""; }
																echo "<option value='".$result->fields['codigo_municipio']."' $selected>".$result->fields['nombre_municipio']."</option>";
																$result->MoveNext();
															}
														}
														else{
															echo "<option value='0'>...</option>";
														}
													?>
												</select>
											</td>
											<td colspan="2" >
												<input name="correo_usu" id="correo_usu" type='text' style="width:225px" title='Correo electronico'  class='campo' value ='<?php echo $resultUsuario->fields['correo_usu'];?>' >
											</td>
										</tr>
									</tabled>
								</td>
							</tr>
							<tr>
								<td colspan="3" class='etiqueta3'>Direccion</td>
							</tr>
							<tr>
								<td colspan="3" >
									<textarea rows="2" name="direccion_residencia_usu" id="direccion_residencia_usu" 
									style="width:530px" title='Direccion'  class='campo'><?php echo $resultUsuario->fields['direccion_residencia_usu']; ?></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="3" >
									<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
										<tr>
											<td class='etiqueta3' >Telefono(s)</td>
											<td class='etiqueta3' >Celular(s)</td>
										</tr>
										<tr>
											<td align="centar" width="50%" >
												<textarea rows="2"  name="telefono_usu" id="telefono_usu" style="width:250px" title='Telefono(s)'  class='campo' ><?php echo $resultUsuario->fields['telefono_usu']; ?></textarea>
											</td>
											<td  align="centar" width="50%">
												<textarea rows="2" name="celular_usu" id="celular_usu" style="width:265px" title='Celular(s)'  class='campo' ><?php echo $resultUsuario->fields['celular_usu'];?></textarea>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="3" align="center" class='td_titulo'>PERFILES DEL USUARIO</td>
							</tr>
							<tr>
								<td colspan="3" >
									<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
										<tr>
											<td class='etiqueta3' >Cargo</td>
											<td class='etiqueta3' >Usuario</td>
											<td class='etiqueta3' >Clave</td>
											<td class='etiqueta3' align="center">Estado</td>
										</tr>
										<tr>
											<td width="20%" >
											<?php if(($_SESSION['IdCargo'] == 1) or ($_SESSION['IdCargo'] == 3)) 
											{ ?>
												<select name="id_cargo" id="id_cargo" CLASS='campo' style="width:120px" title='Cargo' value ='<?php echo $resultUsuario->fields['id_cargo'];?>' >
													<option value='0'>...</option>
														<?php
															if($_SESSION['IdCargo']==1){
																	$query="SELECT 	id_cargo, sigla_cargo, descripcion_cargo, id_entidad
																			FROM 	$db.cargo";
															}else{
																	$query="SELECT 	id_cargo, sigla_cargo, descripcion_cargo, id_entidad
																			FROM 	$db.cargo
																			WHERE 	clase > 0 ";}
															$result=$conex->Execute($query);
															while 	(!$result->EOF){
																	if ($resultUsuario->fields['id_cargo'] == $result->fields['id_cargo']){ $selected="selected"; }
																	else{ $selected=""; }
																	echo "<option value='".$result->fields[id_cargo]."' $selected>".$result->fields[descripcion_cargo]."</option>";

															$result->MoveNext();}
														?>
												</select>
												<?php 
											} ?>	
											</td>
											<td  width="15%" >
												<input name="login" 	 id="login" type='text' style="width:140px" title='Nombre de Usuario' class='campo' value ='<?php echo $resultUsuario->fields['login'];?>' <?php echo $var_readonly; ?> <?php echo $var_bloqueada; ?> >
											</td>
											<td width="20%">
												<input name="contrasena" id="contrasena" type='password' style="width:120px" title='Calve'  class='campo' value ='<?php echo $resultUsuario->fields['contrasena'];?>' >
											</td>
											<td width="15%" align="center">
											<?php if(($_SESSION['IdCargo'] == 1) or ($_SESSION['IdCargo'] == 3)) 
											{ ?>
												<select name="estado_usu" id="estado_usu" style="width:90%" class='campo' title='Estado del usuario' class='campo' value ='<?php echo $resultUsuario->fields['estado_usu'];?>' <?php echo $var_ocultar; ?>>
													<option value ="0">...</option>
													<?php
														foreach ($array_estado as $codigoArray => $valorArray) {
															if ($resultUsuario->fields['estado_usu'] == $codigoArray){ $selected="selected"; }
															else{ $selected=""; }

															echo "<option value='".$codigoArray."' $selected>".$valorArray."</option>";
														}
													?>
												</select>
												<?php 
											} ?>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="4" valign='top' ><br>
						<table width='450px' border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td colspan='3' align='center'>
									<button valign='top' style='cursor:pointer;width:180px;height:25px;' type='button' title="Lista Facturas Ingresadas" name='btn_ins' id='btn_ins' class="boton_red" onclick="ValidaEnvio('<?php echo $_GET['action']; ?>');return false;">
										<img  height='15px' width='30px' ><i class="fa fa-floppy-o"></i> <?php echo $var_value; ?> 
									</button>
								</td>
								<td align='center'>
									<button valign='top' style='cursor:pointer;width:180px;height:25px;' type='button' title="Lista Facturas Ingresadas" name='btn_ins_ft' id='btn_ins_ft' class="boton_red" onclick="ValidaEnvio('<?php echo $_GET['action']; ?>');return false;" onclick="EditaFoto( ??????? , 'cargar');">
										<img  valign='top' width='30px' ><i class="fa fa-camera"></i> Cargar Foto
									</button>								
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
//******************** Cierre de  Conexion a la DB ********************
// if (($_GET['action']=='actualiza_usuario')){ echo "<script>bloqueo();</script>"; }
$conex->Close();
//******************** Cierre de  Conexion a la DB ********************
}
?>