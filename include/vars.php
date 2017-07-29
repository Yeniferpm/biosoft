<?php
	$charset 		= "utf-8";							//codificacion de lenguaje
	$PathApp 		= "http://localhost/bio/";			//nombre sesion
	$UrlApp 		= "http://localhost/bio";			//nombre sesion
	$VirtualDir 	= "/bio";							//nombre sesion
	$session_name 	= "bio";							//nombre sesion
	$driver_db 		= "mysqlt";							//driver database
	$host_db 		= "localhost";						//servidor mysql
	$db 			= "biosoft";  						//DB Mysql
	$user_db 		= "root";							//usuario mysql
	$pass_db 		= "root";						//contrasena usuario mysql

	$debug_db 		= false; 				    		//Debug para manejo de sql
	$debug_app 		= 'yes';				   			//Debug para aplicacion
	$frm_fecha1 	='%Y-%m-%d';						//formato de fecha corta
	$frm_fecha2 	='%Y-%m-%d %H:%M';					//formato de fecha con hora
	$frm_hora 		='24';								//formato de hora
	$var_asunto		='RCA - USUARIO REGISTRADO ';
	
	/////PARAMETROS/////
	$var_subj		="Clave Nueva";
	$var_from		="";
	$var_asunto		="BIOFABRICA- USUARIO REGISTRADO - CONFIRMACION DE DATOS - ";
	$var_tipo		="text/html";
	$var_cupo=40;
	$var_tipo_g='Generada';
	$var_tipo_a='Actualizada';
	$var_d = 1;
	$var_d = 100;
	$var_registrarse="";
	////////////////////
	
	//ARREGLO DE ESTADOS
	$var_class		=0;
	$array_estado[1]="Activo";
	$array_estado[0]="Inactivo";
?>
