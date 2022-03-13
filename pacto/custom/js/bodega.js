var manageBodegaTable;
var managedetalleBodegaTable;

$(document).ready(function () {
	// top nav bar 
	$('#navBodega').addClass('active');
	// manage product data table
	manageBodegaTable = $('#manageBodegaTable').DataTable({
		'ajax': 'php_action/fetchBodega.php',
		'order': [],
		"scrollX": true,
	});

	ruta = "php_action/fetchdetalleBodega.php";
	detallebodega = "detallebodega=" + bodegaId;
	url = ruta + "?" + detallebodega;

	managedetalleBodegaTable = $('#managedetalleBodegaTable').DataTable({
		'ajax': url,
		'order': [],
		"scrollX": true,
	});

	// add product modal btn clicked
	$("#adddetalleBodegaModalBtn").unbind('click').bind('click', function () {
		// // product form reset
		$("#submitBodegaForm")[0].reset();

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// submit product form
		$("#submitdetalleBodegaForm").unbind('submit').bind('submit', function () {

			// form validation

			var NOMPRODUCT = $("#NOMPRODUCT").val();
			var UNIDADESID = $("#UNIDADESID").val();
			var STOCKBODEGA = $("#STOCKBODEGA").val();
			var DESCRIPBODEGA = $("#DESCRIPBODEGA").val();
			var PRECIOBODEGA = $("#PRECIOBODEGA").val();


			if (NOMPRODUCT == "") {
				$("#NOMPRODUCT").closest('.center-block').after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#NOMPRODUCT').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#NOMPRODUCT").find('.text-danger').remove();
				// success out for form 
				$("#NOMPRODUCT").closest('.form-group').addClass('has-success');
			} // /else

			if (UNIDADESID == "") {
				$("#UNIDADESID").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#UNIDADESID').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#UNIDADESID").find('.text-danger').remove();
				// success out for form 
				$("#UNIDADESID").closest('.form-group').addClass('has-success');
			} // /else


			if (STOCKBODEGA == "") {
				$("#STOCKBODEGA").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#STOCKBODEGA').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#STOCKBODEGA").find('.text-danger').remove();
				// success out for form 
				$("#STOCKBODEGA").closest('.form-group').addClass('has-success');
			} // /else


			if (DESCRIPBODEGA == "") {
				$("#DESCRIPBODEGA").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#DESCRIPBODEGA').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#DESCRIPBODEGA").find('.text-danger').remove();
				// success out for form 
				$("#DESCRIPBODEGA").closest('.form-group').addClass('has-success');
			} // /else

			if (PRECIOBODEGA == "") {
				$("#PRECIOBODEGA").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#PRECIOBODEGA').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#PRECIOBODEGA").find('.text-danger').remove();
				// success out for form 
				$("#PRECIOBODEGA").closest('.form-group').addClass('has-success');
			} // /else


			if (NOMPRODUCT && UNIDADESID && STOCKBODEGA && DESCRIPBODEGA && PRECIOBODEGA) {
				var form = $(this);
				// button loading
				$("#createdetalleBodegaBtn").button('loading');

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success: function (response) {
						// button loadin
						$("#createdetalleBodegaBtn").button('reset');

						if (response.success == true) {
							// reload the manage member table 
							managedetalleBodegaTable.ajax.reload(null, false);

							// reset the form text
							$("#submitdetalleBodegaForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');

							$('#add-detalle-messages').html('<div class="alert alert-success">' +
								'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
								'</div>');

							$(".alert-success").delay(500).show(10, function () {
								$(this).delay(3000).hide(10, function () {
									$(this).remove();
								});
							}); // /.alert
						} // if

					} // /success

				}); // /ajax	
			} // if

			return false;
		}); // /submit product form

	}); // /add product modal btn clicked


	// add product modal btn clicked
	$("#addBodegaModalBtn").unbind('click').bind('click', function () {
		// // product form reset
		$("#submitBodegaForm")[0].reset();

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// submit product form
		$("#submitBodegaForm").unbind('submit').bind('submit', function () {

			// form validation
			var USUARIOIUD = $("#USUARIOIUD").val();
			var FECHABODEGA = $("#FECHABODEGA").val();

			if (USUARIOIUD == "") {
				$("#USUARIOIUD").closest('.center-block').after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#USUARIOIUD').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#USUARIOIUD").find('.text-danger').remove();
				// success out for form 
				$("#USUARIOIUD").closest('.form-group').addClass('has-success');
			} // /else

			if (FECHABODEGA == "") {
				$("#FECHABODEGA").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#FECHABODEGA').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#FECHABODEGA").find('.text-danger').remove();
				// success out for form 
				$("#FECHABODEGA").closest('.form-group').addClass('has-success');
			} // /else




			if (USUARIOIUD && FECHABODEGA) {
				var form = $(this);
				// button loading
				$("#createBodegaBtn").button('loading');

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success: function (response) {
						// button loadin
						$("#createBodegaBtn").button('reset');

						if (response.success == true) {
							// reload the manage member table 
							manageBodegaTable.ajax.reload(null, false);

							// reset the form text
							$("#submitBodegaForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');

							$('#add-bodega-messages').html('<div class="alert alert-success">' +
								'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
								'</div>');

							$(".alert-success").delay(500).show(10, function () {
								$(this).delay(3000).hide(10, function () {
									$(this).remove();
								});
							}); // /.alert
						} // if

					} // /success

				}); // /ajax	
			} // if

			return false;
		}); // /submit product form

	}); // /add product modal btn clicked

	// remove product 	

}); // document.ready fucntion



function editdetalleBodega(detbodegaId = null) {
	if(detbodegaId) {
		// remove the added categories id 
		$("#editdetalleBodegaId").remove();
		// reset the form text
		$("#editdetalleBodegaForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-detalleBodega-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-detalleBodega-result').addClass('div-hide');
		//modal footer
		$(".editdetalleBodegaFooter").addClass('div-hide');		

		$.ajax({
			url: 'php_action/fetchSelecteddetalleBodega.php',
			type: 'post',
			data: {detbodegaId: detbodegaId},
			dataType: 'json',
			success:function(response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-detalleBodega-result').removeClass('div-hide');
				//modal footer
				$(".editdetalleBodegaFooter").removeClass('div-hide');	
				// set the usuario name

				$("#editdetalleBodegaName").val(response.PRODUCTOID);
				// set the rol 
				$("#editdetalleBodegaUnidades").val(response.UNIDADESID );
                	// set the email
				$("#editdetalleBodegaStock").val(response.STOCKBODEGA);
				// set the telefono
				$("#editdetalleBodegaDesc").val(response.DESCRIPBODEGA);
                	// set the celular
				$("#editdetalleBodegaPrecio").val(response.PRECIOBODEGA);
				// set the contraseña
                	// set the direccion

				// add the categories id 
				$(".editdetalleBodegaFooter").after('<input type="hidden" name="editdetalleBodegaId" id="editdetalleBodegaId" value="'+response.DETBODEGAID+'" />');


				// submit of edit categories form
				$("#editdetalleBodegaForm").unbind('submit').bind('submit', function() {
					var PRODUCTOID = $("#editdetalleBodegaName").val();
					var UNIDADESID  = $("#editdetalleBodegaUnidades").val();
					var DESCRIPBODEGA = $("#editdetalleBodegaDesc").val();
					var STOCKBODEGA = $("#editdetalleBodegaStock").val();
					var PRECIOBODEGA = $("#editdetalleBodegaPrecio").val();




					if(PRODUCTOID == "") {
						$("#editdetalleBodegaName").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editdetalleBodegaName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editdetalleBodegaName").find('.text-danger').remove();
						// success out for form 
						$("#editdetalleBodegaName").closest('.form-group').addClass('has-success');	  	
					}

					if(UNIDADESID == "") {
						$("#editdetalleBodegaUnidades").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editdetalleBodegaUnidades').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editdetalleBodegaUnidades").find('.text-danger').remove();
						// success out for form 
						$("#editdetalleBodegaUnidades").closest('.form-group').addClass('has-success');	  	
					}

					if(DESCRIPBODEGA == "") {
						$("#editdetalleBodegaDesc").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editdetalleBodegaDesc').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editdetalleBodegaDesc").find('.text-danger').remove();
						// success out for form 
						$("#editdetalleBodegaDesc").closest('.form-group').addClass('has-success');	  	
					}

					if(STOCKBODEGA == "") {
						$("#editdetalleBodegaStock").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editdetalleBodegaStock').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editdetalleBodegaStock").find('.text-danger').remove();
						// success out for form 
						$("#editdetalleBodegaStock").closest('.form-group').addClass('has-success');	  	
					}

					if(PRECIOBODEGA == "") {
						$("#editdetalleBodegaPrecio").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editdetalleBodegaPrecio').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editdetalleBodegaPrecio").find('.text-danger').remove();
						// success out for form 
						$("#editdetalleBodegaPrecio").closest('.form-group').addClass('has-success');	  	
					}




					if(PRODUCTOID && UNIDADESID && DESCRIPBODEGA && STOCKBODEGA  && PRECIOBODEGA ) {
						var form = $(this);
						// button loading
						$("#editdetalleBodegatBtn").button('loading');

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								// button loading
								$("#editdetalleBodegaBtn").button('reset');

								if(response.success == true) {
									// reload the manage member table 
									managedetalleBodegaTable.ajax.reload(null, false);									  	  			

									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

			  	  			$('#edit-detalleBodega-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								}  // if

							} // /success
						}); // /ajax	
					} // if


					return false;
				}); // /submit of edit categories form

			} // /success
		}); // /fetch the selected categories data

	} else {
		alert('Oops!! Refresh the page');
	}
} // /edit categories function

// remove categories function




function removedetalleBodega(detbodegaId = null) {

	$.ajax({
		url: 'php_action/fetchSelecteddetalleBodega.php',
		type: 'post',
		data: {detbodegaId: detbodegaId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removedetalleBodegaBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removedetalleBodegaBtn").button('loading');

				$.ajax({
					url: 'php_action/removedetalleBodega.php',
					type: 'post',
					data: {detbodegaId: detbodegaId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove categories btn
							$("#removedetalleBodegaBtn").button('reset');
							// close the modal 
							$("#removedetalleBodegaModal").modal('hide');
							// update the manage categories table
							managedetalleBodegaTable.ajax.reload(null, false);				
							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} else {
 							// close the modal 
							$("#removedetalleBodegaModal").modal('hide');

 							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} // /else


					} // /success function
				}); // /ajax function request server to remove the categories data
			}); // /remove categories btn clicked to remove the categories function

		} // /response
	}); // /ajax function to fetch the categories data
} // remove categories function


// function addTienda(productId = null) {

// 	$.ajax({
// 		url: 'php_action/fetchSelectedProduct.php',
// 		type: 'post',
// 		data: {productId: productId},
// 		dataType: 'json',
// 		success:function(response) {			

// 			// remove categories btn clicked to remove the categories function
// 			$("#añadirProductBtn").unbind('click').bind('click', function() {
// 				// remove categories btn
// 				$("#añadirProductBtn").button('loading');

// 				$.ajax({
// 					url: 'php_action/addProduct.php',
// 					type: 'post',
// 					data: {productId: productId},
// 					dataType: 'json',
// 					success:function(response) {
// 						if(response.success == true) {
//  							// remove categories btn
// 							$("#añadirProductBtn").button('reset');
// 							// close the modal 
// 							$("#añadirProductModal").modal('hide');
// 							// update the manage categories table
// 							manageProductTable.ajax.reload(null, false);
// 							// udpate the messages
// 							$('.añadir-messages').html('<div class="alert alert-success">'+
// 	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
// 	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
// 		          '</div>');

// 	  	  			$(".alert-success").delay(500).show(10, function() {
// 								$(this).delay(3000).hide(10, function() {
// 									$(this).remove();
// 								});
// 							}); // /.alert
//  						} else {
//  							// close the modal 
// 							$("#añadirProductModal").modal('hide');

//  							// udpate the messages
// 							$('.añadir-messages').html('<div class="alert alert-success">'+
// 	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
// 	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
// 		          '</div>');

// 	  	  			$(".alert-success").delay(500).show(10, function() {
// 								$(this).delay(3000).hide(10, function() {
// 									$(this).remove();
// 								});
// 							}); // /.alert
//  						} // /else


// 					} // /success function
// 				}); // /ajax function request server to remove the categories data
// 			}); // /remove categories btn clicked to remove the categories function

// 		} // /response
// 	}); // /ajax function to fetch the categories data
// } // remove categories function