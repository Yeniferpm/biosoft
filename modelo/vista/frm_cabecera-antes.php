
<?php
include('../../include/vars.php');
// header("Content-Type: text/html; charset="utf-8");
set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
session_name($session_name);
session_start();
include ('../../herramientas/adodb5/adodb.inc.php');
//******************** Inicio Conexion a la DB ********************
$conex = NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!$conex) {
	echo "<br>Error... Al conectar<br>";
	die($err_conn_db);
	exit;
}
?>
<html>
	<head>
		<title>BIOFABRICA</title>
		<link rel="shortcut icon" href="../../imagenes/sena icono.png"/>
		<link href='../../css/css_Biofabrica/style.css' rel='stylesheet'>
		<script type='text/javascript' language='javascript' >
			function salir(){
				window.location="../../index.php";
				document.getElementById("action").value = "salir";
				frm_salir.submit();	
			}
		</script>
	</head>
	<body>
		<form name='frm_salir' action='../../include/admin_session.php' method='POST' >
			<img src="../../imagenes/biofabrica.png" width='100%' height='25%' align='left'>
				<tr>
					<?php 
						include('../../include/menu.php');
					?>
				</tr>
		</form>
	</body>			
<html>