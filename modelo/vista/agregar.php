<?php
/*-----------------------
Autor: Obed Alvarado
http://www.obedalvarado.pw
Fecha: 27-02-2016
Version de PHP: 5.6.3
----------------------------*/
	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', 'root', 'biosoft');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['nombre_area'])){
			$errors[] = "area vacío";
		} else if (empty($_POST['nombre_programa'])){
			$errors[] = "Programa Formacion vacío";
		} else if (empty($_POST['codigo_ficha'])){
			$errors[] = "Ficha vacío";
		}   else if (
			!empty($_POST['nombre_area']) && 
			!empty($_POST['nombre_programa']) &&
			!empty($_POST['codigo_ficha'])
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$area=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_area"],ENT_QUOTES)));
		$programa=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_programa"],ENT_QUOTES)));
		$ficha=mysqli_real_escape_string($con,(strip_tags($_POST["codigo_ficha"],ENT_QUOTES)));
		
		$sql="INSERT INTO ficha (codigo_ficha, id_programa, id_area) VALUES ('".$codigo."','".$programa."','".$ficha."')";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Los datos han sido guardados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>