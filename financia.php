<?php

	$modelo = $_POST['fr_model_car'];
	$price = $_POST['fr_car_price'];
	$engagement = $_POST['fr_car_engagement'];
	$mensualidad = $_POST['fr_car_monthly_payment'];
	$plazos = $_POST['fr_car_months'];
	$nombre = ucwords($_POST['hfu_name']);
	$apellido = ucwords($_POST['hfu_lastname']);
	$mail = $_POST['hfu_email'];
	$telefono = $_POST['hfu_tel'];
	$noticias = $_POST['funding-newsletter'];
	$prueba = $_POST['hfu_drive'];
	$concesionaria = $_POST['porra'];

	/*if ($concesionaria == 'lopez-mateos') {
		$concesionaria = 'Suzuki López Mateos';
	} elseif ($concesionaria == 'vallarta') {
		$concesionaria = 'Suzuki Vallarta';
	} elseif ($concesionaria == 'colima') {
		$concesionaria = 'Suzuki Colima';
	} elseif ($concesionaria == 'morelia') {
		$concesionaria = 'Suzuki Morelia';
	}*/

	/*if ($prueba === "Sí deseas manejarlo") {
		$telefono;
	} else if ($prueba === "No deseas manejarlo") {
		$telefono = "No se agrego telefono";
	}*/

	if (isset($noticias) && $noticias == "on") {
		$suscripcion = "Activado";

		$from = $mail;
		$encabezados = "From:".$nombre."<" .$from. ">"; //optional headerfields
		$mensaje = "Asunto: Financiamiento Newsletter - Suzuki Vallarta.\n\n";
		$mensaje .= "Nombre(s): "  .$nombre. "\n";
		$mensaje .= "Apellido(s): " .$apellido. "\n";
		$mensaje .= "Correo Electrónico: " .$mail. "\n";
		$mensaje .= "Concesionaria: " .$concesionaria. "\n";
		mail('webmaster@medigraf.com.mx', 'Financiamiento Newsletter - Suzuki Vallarta', $mensaje, $encabezados) or die('¡Error!');
		//mail('heriberto@medigraf.com.mx', 'Financiamiento Newsletter - Suzuki Vallarta', $mensaje, $encabezados) or die("¡Error!");
	} else {
		$suscripcion = "Desactivado";
	}

	$from = $mail;
	$encabezados = "From:".$nombre."<" .$from. ">"; //optional headerfields
	$mensaje = "Asunto: Financiamiento - Solicitud de la pagina de internet Suzuki Vallarta para cotizar.\n\n";
	$mensaje .= "Modelo: " .$modelo. "\n";
	$mensaje .= "Precio: " .$price. "\n";
	$mensaje .= "Enganche: " .$engagement. "\n";
	$mensaje .= "Mensualidad: " .$mensualidad. "\n";
	$mensaje .= "Plazos: " .$plazos. "\n";
	$mensaje .= "Nombre(s): "  .$nombre. "\n";
	$mensaje .= "Apellido(s): " .$apellido. "\n";
	$mensaje .= "Correo Electrónico: " .$mail. "\n";
	$mensaje .= "Concesionaria: " .$concesionaria. "\n";
	$mensaje .= "Telefono: " .$telefono. "\n";
	$mensaje .= "Desea realizar prueba de manejo : " .$prueba. "\n";
	$mensaje .= "Desea recibir noticias: " .$suscripcion. "\n";
	mail('mercadotecnia@suzuki-lm.com.mx', 'Financiamiento - Solicitud de la pagina de internet Suzuki Vallarta para cotizar.', $mensaje, $encabezados) or die('¡Error!');
	//mail('cold_space@hotmail.com', 'Financiamiento - Solicitud de la pagina de internet Suzuki Vallarta para cotizar.', $mensaje, $encabezados) or die("¡Error!");
    header ("Location: http://suzukivallarta.com.mx/");
?>
