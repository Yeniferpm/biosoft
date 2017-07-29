<?php 
header("Content-Type: text/html; charset=iso-8859-1");
// session_name($session_name);
session_start();
?>
<html>
	<head>
		<title>Recuperar Clave</title> 
		<link rel="stylessheet" type="tex/css" href="../../css/style.css"></link>
	<?PHP  	INCLUDE('../etiquetas/esp/lbl_restablecer.php');	
			INCLUDE('../../include/script_modelo.php');	?>
	</head>	
	<body> 
	<form name="fmr_restablecer" target="operaciones" method="POST" action="../controlador/ctrl_restablecer.php">
		<table style="margin:0 auto;" border=0; HEIGHT="200px" width="670px" bgcolor=#F9F9F9 cellpadding=0 cellspacing="0">
			<tr align="center">
				<td>
					<table style="margin:0 auto;" border=0  width="530px" gcolor=#ffffff  cellpadding="0"cellspacing="0" >					
						<tr>
							<td><?php echo $lbl_ingresa;?></td>
						</tr>
						<tr>
							<td><br>
								<input type="text" id="restablecer" name="restablecer" title="<?php echo $lbl_recuperar;?>" style= "width:300px">
							</td>	<br><br>
						</tr><br><br>	
						<tr>
							<td><br>
								<input type="submit" class="cuadro2" id="btn_restalecer" name="btn_restalecer" title="<?php echo $lbl_btn_r;?>" value="enviar" onclick=""() >
							</td>
						</tr>
					</table>
				</td>
			</tr>	
		</table>
	</form>
	</body>
</html>