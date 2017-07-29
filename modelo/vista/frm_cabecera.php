<?php
include_once('../../include/vars.php');
include_once('ctrl_acceso.php');
include_once('ctrl_lenguaje.php');
@header('Context-Type: text/html; charset='.$charset);
set_include_path(get_include_path().PATH_SEPARATOR .$PathApp);
@session_name($session_name);
@session_start();
if (!$conex){	echo '<script>Error... Al Conectar</script>';	}
else{
		include('../etiquetas/'.$_SESSION['nombre_carpeta'].'/lbl_login.php');
		?> 
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="content-type" content="text/html; charset=utf-8" />
				<link rel="shortcut icon" href="../../imagenes/logo_sena.png" />
				<title>BIOSOFT</title>
				<link rel="stylesheet" type="text/css" href="../../css/plantilla/css/reset.css" media="screen" />
				<link rel="stylesheet" type="text/css" href="../../css/plantilla/css/text.css" media="screen" />
				<link rel="stylesheet" type="text/css" href="../../css/plantilla/css/grid.css" media="screen" />
				<link rel="stylesheet" type="text/css" href="../../css/plantilla/css/layout.css" media="screen" />
				<link rel="stylesheet" type="text/css" href="../../css/plantilla/css/nav.css" media="screen" />
				<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
				<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
				<!-- BEGIN: load jquery -->
				<script src="../../css/plantilla/js/jquery-1.6.4.min.js" type="text/javascript"></script>
				<script type="text/javascript" src="../../css/plantilla/js/jquery-ui/jquery.ui.core.min.js"></script>
				<script src="../../css/plantilla/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
				<script src="../../css/plantilla/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
				<script src="../../css/plantilla/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
				<script src="../../css/plantilla/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
				<!-- END: load jquery -->
				<!-- BEGIN: load jqplot -->
				<link rel="stylesheet" type="text/css" href="../../css/jquery.jqplot.min.css" />
				<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
				<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/jquery.jqplot.min.js"></script>
				<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
				<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
				<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
				<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
				<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
				<!-- END: load jqplot -->
				
				<script src="../../css/plantilla/js/setup.js" type="text/javascript"></script>
				<script type="text/javascript">

					$(document).ready(function () {
						setupLeftMenu();
						setSidebarHeight();		
					});

					function salir(){
						window.location="../../index.php";
						document.getElementById("action").value = "salir";
						frm_salir.submit();	
					}
				</script>	
			</head>
			<body>
				<div class="container_12">
					<div class="grid_12 header-repeat">
						<div id="branding">
							<div class="floatleft">
								<img src="../../css/plantilla/img/logo_plantilla11.fw.png" alt="Logo" /></div>
							<div class="floatright">
								<div class="floatleft">
									<img src="../../css/plantilla/img/img-profile.jpg" alt="Profile Pic" />
								</div>					
								<div class="floatleft marginleft10">
									<ul class="inline-ul floatleft">                            
										<a>BIENVENIDO :
										<?php 	echo utf8_encode($_SESSION['usu_log']);
												echo "<br>".utf8_encode( $_SESSION['nombre_rol']);	
										?>									
										</a>
									</ul>                            
									<ul class="inline-ul floatleft">                            
										<form id='frm_salir' name='frm_salir' action='../../include/admin_session' method='post' target='operaciones' >
											<li><a onclick="salir('salir');"  style='cursor:pointer'  >Salir</a></li>
											<iframe name='operaciones'		  style='display:none' 	width='100%'height=''>
											</iframe>
										</form >
									</ul>                        
								</div>
							</div>
						</div>
					</div>
					<?php include('barra_horizontal.php'); ?>	
				</div>				
			</body>
		</html>
		<?php 
	}
?>
	