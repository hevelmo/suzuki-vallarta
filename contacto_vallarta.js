$(document).ready(function() {

	$('.form_contact_vallarta').submit(function(e) {
		e.preventDefault();
		var data = $(this).serializeArray();
		$.ajax({
			url: 'contacto.php',
			type: 'post',
			data: data,
			beforeSend: function () {
				setTimeout(function() {
					$("#reply_contacto").hide("");
				}, 3000);
				$("#respuesta").html("<img src='images/template/ajax-loader.gif' style='width: 20px; height: 20px; position: relative; top: 527px; left: -118px;'>");
			},
			success: function () {
				setTimeout(function() {
					$('#reply_contacto').html("<aside class='replyOk'><div class='ico_Ok'></div><p class='msndialog'>Tus se han enviado</p></aside>");
					setTimeout(function() {
						window.location.href = '/';
					}, 3000);
				}, 2000);
			},
			error: function () {
				setTimeout(function() {
					$('#reply_contacto').html("<aside class='replyError'><div class='ico_Error'></div><p class='msndialog'>No se ha podido enviar el registro</p></aside>");
				}, 3000);
			}
		})
		.always(function() {
			setTimeout(function() {
				$("#respuesta").hide("");
			}, 3000);
		});
	});

});


