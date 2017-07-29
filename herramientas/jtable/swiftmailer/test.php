<?php
require ('swift_required.php');

$message = Swift_Message::newInstance();
	$message = Swift_Message::newInstance();
	$message->setFrom('info@sweficiente.net');
	$message->setCharset('iso-8859-1');
	$message->setPriority('1');
	$message->setTo('jopehi37@hotmail.com');
	
	$message->setSubject('Prueba de correo');
	$message->setBody('Hola, este es el cuerpo de la prueba de correo', 'text/html');

	$transport = Swift_SmtpTransport::newInstance('hp88.hostpapa.com', '465', 'ssl');
	$transport->setUsername('info@sweficiente.net');
	$transport->setPassword('vmj790');
	$mailer = Swift_Mailer::newInstance($transport);

	if ($mailer->send($message)){
		echo "Mensaje Enviado";
	}
	else{
		echo "Pailas";
	}

?>