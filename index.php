<?php
include_once('include/vars.php');
include_once('include/ctrl_acceso.php');
include_once('include/ctrl_lenguaje.php');
header('Context-Type: text/html; charset='.$charset);
set_include_path(get_include_path().PATH_SEPARATOR .$PathApp);
@session_name($session_name);
@session_start();
if (!$conex){	echo '<script>Error...Al Conectar</script>';	}
else
	{
		if (strlen($_SESSION['nombre_carpeta'])	> 0)
			{ 
				if($_SESSION['nombre_carpeta'] == 'esp' ) { $var_dato = 0;}
				if($_SESSION['nombre_carpeta'] == 'eng' ) { $var_dato = 1;}
				include_once 'modelo/etiquetas/'.$_SESSION['nombre_carpeta'].'/lbl_login.php';
				?>
				<!DOCTYPE html>
				<html>
					<head>
						<meta charset="utf-8">
						<title>BIOFABRICA</title>
						<!-- Google Fonts -->
						<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
						<!--}
						<link rel="stylesheet" href="css/css_index/animate.css">
						<!-- Custom Stylesheet -->
						<link rel="stylesheet" href="css/css_index/style.css">
						<script type='text/javascript'>
							function enviar()
								{		
									var er_numeros = /^([0-9])+$/
									var seguir=true;
									document.frm_acceso.action.value = "login"; 
									if (document.frm_acceso.n_documento.value== ''){
									document.getElementById('n_documento').style.borderColor = '#0000B2';
									seguir=false;
									}
									if (document.frm_acceso.clave.value== ''){
									document.getElementById('clave').style.borderColor = '#0000B2';
									seguir=false;
									}
									if (seguir==true)
										{
											frm_acceso.submit();
											return true;	
										}						
										{
											document.getElementById('action').value = "";
											document.getElementById('n_documento').value= "";
											document.getElementById('clave').value= "";												
										}	
								}		
							function nueva_credencial()
								{
									location.href='recuperar'
								}
								
							function limpiar()
								{
									// document.getElementById('action').value='espanol';
									// frm_acceso.submit();
									// location.reloand(indext.php);
								}
								
							function espanol ()
								{
									
									document.getElementById('action').value='espanol';
									frm_acceso.submit();
									location.reloand(index.php);
								}
								
							function ingles ()
								{
									
									document.getElementById('action').value='ingles';
									frm_acceso.submit();
									location.reloand(index.php);
								}
								
							function escribir_div_msj(msj_recibido)
								{
									document.getElementById('div_msj').innerHTML = msj_recibido;
								}	
								
							function msj_controlador(msj_recibo)
								{
									document.getElementById('msj_login').value= "<h2><span><B>"+msj_recibo+"</h2></span><B>";
									document.getElementById('msj_login').style.color='#FF0000';					
								}
						</script>
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
					</head>
					<body>
						<div class="container">
							<form  name="frm_acceso" action="include/admin_session.php" class="box login" method="POST" target='operaciones' >
								<input type='hidden' id='action' name="action"/>
								<div class="top">
									<h1 id="title" class="hidden"><span id="logo">BIOFABRICA </span></h1>
								</div>
								<div class="login-box animated fadeInUp">
									<div class="box-header">
										<h2>INICIO DE SESION</h2>
									</div>
									<label for="username" >USUARIO</label>
									<br>
									<input type="text" title="usuario" id="n_documento" name="n_documento" class="form-control" >
									<br>
									<label for="password">CLAVE</label>
									<br>
									<input type="password" title="ingrese clave" id="clave" name="clave" class="form-control">
									<br>
									<button type="button" class="log-btn"  value='<?Php echo $value_Entrar;?>' title='<?Php echo $value_Entrar;?>' style='cursor:pointer' onclick='enviar();'>ENTRAR</button>
									<button type="button" class="link" href="modelo/vista/restablecer.php">NUEVA CLAVE</button>
									<br>								
									<label><img src='imagenes/bandera_colombia.png' width='12px' height='13px'></label>
										<input  type='radio' id='lenguaje' name="lenguaje" title="espanol" style='cursor:pointer' onclick='espanol ()'; />
									<label><img src='imagenes/bandera_usa.png' width='12px' height='13px'></label>
										<input   type='radio' id='lenguaje' name="lenguaje" title="lenguaje" style='cursor:pointer' onclick='ingles ()'; /></a></td>
								</div>
							</form>	
						</div>
						<iframe name='operaciones' style="display:yes;" width='100%' height=''></iframe>
						<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
					</body>
				</html>
				<?php
			}
		else 
			{
				echo "<script>alert('ERROR....! NO EXISTE LEGUAJE SELECCIONADO....!');</script>";
			}			
	} 
?>