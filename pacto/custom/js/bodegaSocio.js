var manageBodegaSocioTable;
// var managedetalleBodegaTable;

$(document).ready(function () {
	// top nav bar 
	$('#navBodega').addClass('active');
	// manage product data table
	manageBodegaSocioTable = $('#manageBodegaSocioTable').DataTable({
		'ajax': 'php_action/fetchBodegaSocio.php',
		'order': [],
		"scrollX": true,
	});

	// ruta = "php_action/fetchdetalleBodega.php";
	// detallebodega = "detallebodega=" + bodegaId;
	// url = ruta + "?" + detallebodega;

	// managedetalleBodegaTable = $('#managedetalleBodegaTable').DataTable({
	// 	'ajax': url,
	// 	'order': [],
	// 	"scrollX": true,
	// });

	// // add product modal btn clicked
	// $("#adddetalleBodegaModalBtn").unbind('click').bind('click', function () {
	// 	// // product form reset
	// 	$("#submitBodegaForm")[0].reset();

	// 	// remove text-error 
	// 	$(".text-danger").remove();
	// 	// remove from-group error
	// 	$(".form-group").removeClass('has-error').removeClass('has-success');

	// 	// submit product form
	// 	$("#submitdetalleBodegaForm").unbind('submit').bind('submit', function () {

	// 		// form validation

	// 		var NOMPRODUCT = $("#NOMPRODUCT").val();
	// 		var UNIDADESID = $("#UNIDADESID").val();
	// 		var STOCKBODEGA = $("#STOCKBODEGA").val();
	// 		var DESCRIPBODEGA = $("#DESCRIPBODEGA").val();
	// 		var PRECIOBODEGA = $("#PRECIOBODEGA").val();


	// 		if (NOMPRODUCT == "") {
	// 			$("#NOMPRODUCT").closest('.center-block').after('<p class="text-danger">Este campo es obligatorio</p>');
	// 			$('#NOMPRODUCT').closest('.form-group').addClass('has-error');
	// 		} else {
	// 			// remov error text field
	// 			$("#NOMPRODUCT").find('.text-danger').remove();
	// 			// success out for form 
	// 			$("#NOMPRODUCT").closest('.form-group').addClass('has-success');
	// 		} // /else

	// 		if (UNIDADESID == "") {
	// 			$("#UNIDADESID").after('<p class="text-danger">Este campo es obligatorio</p>');
	// 			$('#UNIDADESID').closest('.form-group').addClass('has-error');
	// 		} else {
	// 			// remov error text field
	// 			$("#UNIDADESID").find('.text-danger').remove();
	// 			// success out for form 
	// 			$("#UNIDADESID").closest('.form-group').addClass('has-success');
	// 		} // /else


	// 		if (STOCKBODEGA == "") {
	// 			$("#STOCKBODEGA").after('<p class="text-danger">Este campo es obligatorio</p>');
	// 			$('#STOCKBODEGA').closest('.form-group').addClass('has-error');
	// 		} else {
	// 			// remov error text field
	// 			$("#STOCKBODEGA").find('.text-danger').remove();
	// 			// success out for form 
	// 			$("#STOCKBODEGA").closest('.form-group').addClass('has-success');
	// 		} // /else


	// 		if (DESCRIPBODEGA == "") {
	// 			$("#DESCRIPBODEGA").after('<p class="text-danger">Este campo es obligatorio</p>');
	// 			$('#DESCRIPBODEGA').closest('.form-group').addClass('has-error');
	// 		} else {
	// 			// remov error text field
	// 			$("#DESCRIPBODEGA").find('.text-danger').remove();
	// 			// success out for form 
	// 			$("#DESCRIPBODEGA").closest('.form-group').addClass('has-success');
	// 		} // /else

	// 		if (PRECIOBODEGA == "") {
	// 			$("#PRECIOBODEGA").after('<p class="text-danger">Este campo es obligatorio</p>');
	// 			$('#PRECIOBODEGA').closest('.form-group').addClass('has-error');
	// 		} else {
	// 			// remov error text field
	// 			$("#PRECIOBODEGA").find('.text-danger').remove();
	// 			// success out for form 
	// 			$("#PRECIOBODEGA").closest('.form-group').addClass('has-success');
	// 		} // /else


	// 		if (NOMPRODUCT && UNIDADESID && STOCKBODEGA && DESCRIPBODEGA && PRECIOBODEGA) {
	// 			var form = $(this);
	// 			// button loading
	// 			$("#createdetalleBodegaBtn").button('loading');

	// 			$.ajax({
	// 				url: form.attr('action'),
	// 				type: form.attr('method'),
	// 				data: form.serialize(),
	// 				dataType: 'json',
	// 				success: function (response) {
	// 					// button loadin
	// 					$("#createdetalleBodegaBtn").button('reset');

	// 					if (response.success == true) {
	// 						// reload the manage member table 
	// 						managedetalleBodegaTable.ajax.reload(null, false);

	// 						// reset the form text
	// 						$("#submitdetalleBodegaForm")[0].reset();
	// 						// remove the error text
	// 						$(".text-danger").remove();
	// 						// remove the form error
	// 						$('.form-group').removeClass('has-error').removeClass('has-success');

	// 						$('#add-detalle-messages').html('<div class="alert alert-success">' +
	// 							'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
	// 							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
	// 							'</div>');

	// 						$(".alert-success").delay(500).show(10, function () {
	// 							$(this).delay(3000).hide(10, function () {
	// 								$(this).remove();
	// 							});
	// 						}); // /.alert
	// 					} // if

	// 				} // /success

	// 			}); // /ajax	
	// 		} // if

	// 		return false;
	// 	}); // /submit product form

	// }); // /add product modal btn clicked


	// // add product modal btn clicked
	// $("#addBodegaModalBtn").unbind('click').bind('click', function () {
	// 	// // product form reset
	// 	$("#submitBodegaForm")[0].reset();

	// 	// remove text-error 
	// 	$(".text-danger").remove();
	// 	// remove from-group error
	// 	$(".form-group").removeClass('has-error').removeClass('has-success');

	// 	// submit product form
	// 	$("#submitBodegaForm").unbind('submit').bind('submit', function () {

	// 		// form validation
	// 		var USUARIOIUD = $("#USUARIOIUD").val();
	// 		var FECHABODEGA = $("#FECHABODEGA").val();

	// 		if (USUARIOIUD == "") {
	// 			$("#USUARIOIUD").closest('.center-block').after('<p class="text-danger">Este campo es obligatorio</p>');
	// 			$('#USUARIOIUD').closest('.form-group').addClass('has-error');
	// 		} else {
	// 			// remov error text field
	// 			$("#USUARIOIUD").find('.text-danger').remove();
	// 			// success out for form 
	// 			$("#USUARIOIUD").closest('.form-group').addClass('has-success');
	// 		} // /else

	// 		if (FECHABODEGA == "") {
	// 			$("#FECHABODEGA").after('<p class="text-danger">Este campo es obligatorio</p>');
	// 			$('#FECHABODEGA').closest('.form-group').addClass('has-error');
	// 		} else {
	// 			// remov error text field
	// 			$("#FECHABODEGA").find('.text-danger').remove();
	// 			// success out for form 
	// 			$("#FECHABODEGA").closest('.form-group').addClass('has-success');
	// 		} // /else




	// 		if (USUARIOIUD && FECHABODEGA) {
	// 			var form = $(this);
	// 			// button loading
	// 			$("#createBodegaBtn").button('loading');

	// 			$.ajax({
	// 				url: form.attr('action'),
	// 				type: form.attr('method'),
	// 				data: form.serialize(),
	// 				dataType: 'json',
	// 				success: function (response) {
	// 					// button loadin
	// 					$("#createBodegaBtn").button('reset');

	// 					if (response.success == true) {
	// 						// reload the manage member table 
	// 						manageBodegaTable.ajax.reload(null, false);

	// 						// reset the form text
	// 						$("#submitBodegaForm")[0].reset();
	// 						// remove the error text
	// 						$(".text-danger").remove();
	// 						// remove the form error
	// 						$('.form-group').removeClass('has-error').removeClass('has-success');

	// 						$('#add-bodega-messages').html('<div class="alert alert-success">' +
	// 							'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
	// 							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
	// 							'</div>');

	// 						$(".alert-success").delay(500).show(10, function () {
	// 							$(this).delay(3000).hide(10, function () {
	// 								$(this).remove();
	// 							});
	// 						}); // /.alert
	// 					} // if

	// 				} // /success

	// 			}); // /ajax	
	// 		} // if

	// 		return false;
	// 	}); // /submit product form

	// }); // /add product modal btn clicked

	// // remove product 	

}); // document.ready fucntion

