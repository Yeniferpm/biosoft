<?php
include('../../include/vars.php');
@header("Content-Type: text/html; charset=".$charset);
@session_name($session_name);
@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
    <link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
			<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
			<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/jquery.jqplot.min.js"></script>
			<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
			<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
			<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
			<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
			<script language="javascript" type="text/javascript" src="../../css/plantilla/js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
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
									<?php echo $_SESSION['usu_log'];?></a>
								</ul>                            
								<ul class="inline-ul floatleft">                            
									<form id='frm_salir' name='frm_salir' action='../../include/admin_session' method='post' target='operaciones' >
										<li><a onclick="salir('salir');" style='cursor:pointer'  >Salir</a></li>
										<iframe name='operaciones'	style='display:none' width='100%'height=''>
										</iframe>
									</form >
								</ul>                        
							</div>
						</div>
					</div>
				</div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="dashboard.html"><span>Dashboard</span></a> </li>
                <li class="ic-gallery dd"><a href="javascript:"><span>REGISTRO</span></a>
					 <ul>
						<li><a href="frm_regional.php">REGIONAL</a></li>
						<li><a href="centro.php">CENTROS</a></li>
						<li><a href="">AREAS</a></li>
						<li><a href="frm_unidades">UNIDADE</a></li>
						<li><a href="">PROGRAMA DE FORMACION</a></li>
						<li><a href="ficha.php">FICHAS</a></li>
						<li><a href="">USUARIOS</a></li>
						<li><a href="">ROL</a></li>
					</ul>
				</li>
                <li class=""><a href="frm_regional.php"><span>Typography</span></a></li>
				<li class="ic-charts"><a href="frm_areas.html"><span>Charts & Graphs</span></a></li>
                <li class="ic-grid-tables"><a href="grilla.php"><span>Data Table</span></a></li>
                <li class="ic-gallery dd"><a href="javascript:"><span>Image Galleries</span></a>
               		 <ul>
                        <li><a href="image-gallery.html">Pretty Photo</a> </li>
                        <li><a href="gallery-with-filter.html">Gallery with Filter</a> </li>
                    </ul>
                </li>
                <li class="ic-notifications"><a href="notifications.html"><span>Notifications</span></a></li>

            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
					<ul class="section menu">
						<li><a class="menuitem">CONOCENOS</a>
							<ul class="submenu">
								<li><a href="informacion.php">MISION</a> </li>
								<li><a href="">VISION </a> </li>
								<li><a href="">AREAS </a> </li>
							</ul>
						</li>
						<li><a class="menuitem">LIMPIAR</a></li>
					</ul>
                </div>
            </div>
        </div>
        <?php 
					include('informacion.php'); 
?>	
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
	<p>
		<img src="img/logo_pie.png" width='15px' height='15px'/>
		Sena Centro Agropecuario Regional Cauca - Proyecto Creado por el Tecnologo de ADSI - 1135869 CEAP 3 - 2017
	</p>
</div>
</body>
</html>
