<?php
	ob_start();
	$concesionaria = $_POST['concesionaria'];
	$nombre = ucwords($_POST['name']);
	$apellido = ucwords($_POST['lastname']);
	$mail = $_POST['email'];
	$depa = $_POST['departamento'];
	$carro = $_POST['car'];
	$mnsj = $_POST['message'];
	$noticias = $_POST['news'];

	if ($depa == "ventas") {
		$depto = "Ventas";
	} else if ($depa == "servicio") {
		$depto = "Servicio";
	} else if ($depa == "refacciones") {
		$depto = "Refacciones / Accesorios";
	} else if ($depa == "mercadotecnia") {
		$depto = "Mercadotecnia";
	} else {
		$depto = "Otros";
	}
	if ($carro =="swift-sport") {
		$auto = "Swift Sport";
		$image_modelo = "suzuki_swift-sport.png";
	} else if ($carro =="swift") {
		$auto = "Swift";
		$image_modelo = "suzuki_swift.png";
	} else if ($carro =="sx4-crossover") {
		$auto = "SX4 Crossover";
		$image_modelo = "suzuki_sx4-crossover.png";
	} else if ($carro =="sx4-sedan") {
		$auto = "SX4 Sedán";
		$image_modelo = "suzuki_sx4-sedan.png";
	} else if ($carro =="kizashi") {
		$auto = "Kizashi";
		$image_modelo = "suzuki_kizashi.png";
	} else if ($carro =="grand-vitara") {
		$auto = "Grand Vitara";
		$image_modelo = "suzuki_grand-vitara.png";
	} else if ($carro =="s-cross") {
		$auto = "S-Cross";
		$image_modelo = "suzuki_s-cross.png";
	}

	if (isset($noticias) && $noticias == "on") {
		$suscripcion = "Activado";
		var_dump($_POST);
		$mail_origin = $mail;
		//$to = 'heriberto@medigraf.com.mx';
		$to = 'webmaster@medigraf.com.mx';
		$subject = "Contacto - Noticias y promociones - Suzuki Vallarta";
		$mensaje = "Asunto: Contacto - Noticias y promociones - Suzuki Vallarta"."\n\n";
			$mensaje .= "Nombre(s) : " .$nombre. "\n";
			$mensaje .= "Apellido(s) : " .$apellido. "\n";
			$mensaje .= "Correo Electrónico: " .$mail. "\n";
			$mensaje .= "Concesionaria : " .$concesionaria. "\n";
		$headers = "From: ". $nombre ." ". $apellido ."<" . $mail_origin . ">"."\r\n";
		$sent =  mail($to,$subject,$mensaje,$headers);
		if($sent) {
			echo 'Envio Correcto';
		} else {
			echo 'Fallo el Envio';
		}
	} else {
		$suscripcion = "Desactivado";
	}
	var_dump($_POST);
	$mail_origin = $mail;
	//$to = 'cold_space@hotmail.com';
	$to = 'mercadotecnia@suzuki-lm.com.mx';
	$subject = "Contacto - Mensaje dirigido al departamento de ".$depto."\n\n";
	$message = "Asunto: Contacto - Mensaje dirigido al departamento de ".$depto."\n\n";
		$message .= "Nombre(s): " .$nombre. "\n";
		$message .= "Apellido(s): " .$apellido. "\n";
		$message .= "Correo Electrónico: " .$mail. "\n";
		$message .= "Departamento: " .$depto. "\n";
		$message .= "Vehículo: " .$auto. "\n";
		$message .= "Concesionaria: " .$concesionaria. "\n";
		$message .= "Desea recibir noticias: " .$suscripcion. "\n\n\n";
		$message .= "Mensaje: "."\n\n" .$mnsj. "\n";
	$headers = "From: ". $nombre ." ". $apellido ."<" . $mail_origin . ">"."\r\n";
	$sent =  mail($to,$subject,$message,$headers);
	if($sent) {
		echo 'Envio Correcto';
	} else {
		echo 'Fallo el Envio';
	}
	header ("location: http://suzukivallarta.com.mx/");
?>
