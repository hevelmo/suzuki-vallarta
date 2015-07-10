<?php
	ob_start();
	$concesionaria = $_POST['step-2-concesionaria'];
	$modelo = $_POST['step-2-model'];
	$fecha = $_POST['step-2-date'];
	$nombre = $_POST['step-2-name'];
	$apellido = $_POST['step-2-lastname'];
	$mail = $_POST['step-2-email'];
	$telefono = $_POST['step-2-tel'];
	$noticias = $_POST['chk-newsletter'];

	if ($modelo =="swift-sport") {
		$auto = "Swift Sport";
		$image_modelo = "suzuki_swift-sport.png";
	} else if ($modelo =="swift") {
		$auto = "Swift";
		$image_modelo = "suzuki_swift.png";
	} else if ($modelo =="sx4-crossover") {
		$auto = "SX4 Crossover";
		$image_modelo = "suzuki_sx4-crossover.png";
	} else if ($modelo =="sx4-sedan") {
		$auto = "SX4 Sedán";
		$image_modelo = "suzuki_sx4-sedan.png";
	} else if ($modelo =="kizashi") {
		$auto = "Kizashi";
		$image_modelo = "suzuki_kizashi.png";
	} else if ($modelo =="grand-vitara") {
		$auto = "Grand Vitara";
		$image_modelo = "suzuki_grand-vitara.png";
	} else if ($modelo =="s-cross") {
		$auto = "S-Cross";
		$image_modelo = "suzuki_s-cross.png";
	}

	if (isset($noticias) && $noticias == "on") {
		$suscripcion = "Activado";

		$mail_origin = $mail;

		//$to = 'heriberto@medigraf.com.mx';
		$to = 'webmaster@medigraf.com.mx';
		$subject = "Agenda Prueba de Manejo - Suzuki Vallarta";

		$mensaje = "Asunto: Agenda Prueba de Manejo - Suzuki Vallarta"."\n\n";
			$mensaje .= "Nombre(s) : " .$nombre. "\n";
			$mensaje .= "Apellido(s) : " .$apellido. "\n";
			$mensaje .= "Correo Electrónico: " .$mail. "\n";
			$mensaje .= "Concesionaria : " .$concesionaria. "\n";

		$headers = "From: ". $nombre ." ". $apellido ."<" . $mail_origin . ">"."\r\n";

		$sent =  mail($to,$subject,$mensaje,$headers);
		if($sent) {
			echo 'Envio Correcto - Newsletter';
		} else {
			echo 'Fallo el Envio';
		}
	} else {
		$suscripcion = "Desactivado";
	}

	$mail_origin = $mail;

	//$to = 'heriberto@medigraf.com.mx';
	$to = 'mercadotecnia@suzuki-lm.com.mx';
	$subject = "Solicitud de prueba de manejo - Suzuki Vallarta "."\n\n";

	$message = "Asunto: Solicitud de prueba de manejo\n\n";
		$message .= "Nombre(s) : " .$nombre. "\n";
		$message .= "Apellido(s) : " .$apellido. "\n";
		$message .= "Correo Electrónico: " .$mail. "\n";
		$message .= "Telefono : " .$telefono. "\n";
		$message .= "Modelo : " .$auto. "\n";
		$message .= "Concesionaria: " .$concesionaria. "\n";
		$message .= "Fecha para prueba : " .$fecha. "\n";
		$message .= "Desea recibir noticias: " .$suscripcion. "\n";

	$headers = "From: ". $nombre ." ". $apellido ."<" . $mail_origin . ">"."\r\n";
	$headers .= "Bcc: ";

	$sent =  mail($to,$subject,$message,$headers);
	if($sent) {
		echo 'Envio Correcto Agendar Prueba de Manejo';
	} else {
		echo 'Fallo el Envio';
	}
	header("location: http://suzukivallarta.com.mx/");
?>
