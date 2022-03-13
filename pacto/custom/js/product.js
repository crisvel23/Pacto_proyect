var manageProductTable;

$(document).ready(function() {
	// top nav bar 
	$('#navProduct').addClass('active');
	// manage product data table
	manageProductTable = $('#manageProductTable').DataTable({
		'ajax': 'php_action/fetchProduct.php',
		'order': [],
		"scrollX": true,
	});

	// add product modal btn clicked
	$("#addProductModalBtn").unbind('click').bind('click', function() {
		// // product form reset
		$("#submitProductForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// submit product form
		$("#submitProductForm").unbind('submit').bind('submit', function() {

			// form validation
			var NOMPRODUCT = $("#NOMPRODUCT").val();
			var CATEGORIAID = $("#CATEGORIAID").val();
			var DESCRIPCIONPRODUCT = $("#DESCRIPCIONPRODUCT").val();
			var PRECIOPRODUCT = $("#PRECIOPRODUCT").val();
	
			var UNIDADESID = $("#UNIDADESID").val();
	
			if(NOMPRODUCT == "") {
				$("#NOMPRODUCT").closest('.center-block').after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#NOMPRODUCT').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#NOMPRODUCT").find('.text-danger').remove();
				// success out for form 
				$("#NOMPRODUCT").closest('.form-group').addClass('has-success');	  	
			}	// /else


			if(CATEGORIAID == "") {
				$("#CATEGORIAID").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#CATEGORIAID').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#CATEGORIAID").find('.text-danger').remove();
				// success out for form 
				$("#CATEGORIAID").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(DESCRIPCIONPRODUCT == "") {
				$("#DESCRIPCIONPRODUCT").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#DESCRIPCIONPRODUCT').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#DESCRIPCIONPRODUCT").find('.text-danger').remove();
				// success out for form 
				$("#DESCRIPCIONPRODUCT").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(PRECIOPRODUCT == "" ) {
				$("#PRECIOPRODUCT").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#PRECIOPRODUCT').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#PRECIOPRODUCT").find('.text-danger').remove();
				// success out for form 
				$("#PRECIOPRODUCT").closest('.form-group').addClass('has-success');	  	
			}	// /else

		
			
			if(UNIDADESID == "") {
				$("#UNIDADESID").closest('.center-block').after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#UNIDADESID').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#UNIDADESID").find('.text-danger').remove();
				// success out for form 
				$("#UNIDADESID").closest('.form-group').addClass('has-success');	  	
			}	// /else

	

			if(NOMPRODUCT && CATEGORIAID && DESCRIPCIONPRODUCT && PRECIOPRODUCT   && UNIDADESID ) {
				var form = $(this);
				// button loading
				$("#createProductBtn").button('loading');

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) {
						// button loadin
						$("#createProductBtn").button('reset');

						if(response.success == true) {
							// reload the manage member table 
							manageProductTable.ajax.reload(null, false);						

	  	  			// reset the form text
							$("#submitProductForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
	  	  			
	  	  			$('#add-product-messages').html('<div class="alert alert-success">'+
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
		}); // /submit product form

	}); // /add product modal btn clicked
	

	// remove product 	

}); // document.ready fucntion


function editProduct(productId = null) {
	if(productId) {
		// remove the added categories id 
		$("#editProductId").remove();
		// reset the form text
		$("#editProductForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-product-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-product-result').addClass('div-hide');
		//modal footer
		$(".editProductFooter").addClass('div-hide');		

		$.ajax({
			url: 'php_action/fetchSelectedProduct.php',
			type: 'post',
			data: {productId:productId},
			dataType: 'json',
			success:function(response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-product-result').removeClass('div-hide');
				//modal footer
				$(".editProductFooter").removeClass('div-hide');	
				// set the usuario name
				$("#editProductName").val(response.NOMPRODUCT);
				// set the rol 
				$("#editProductCat").val(response.CATEGORIAID );
                	// set the email
				$("#editProductDesc").val(response.DESCRIPCIONPRODUCT);
				// set the telefono
				$("#editProductPre").val(response.PRECIOPRODUCT);
                	// set the celular
				$("#editProductSto").val(response.STOCKPRODUCT);
				// set the contraseña
                	// set the direccion
				
				// add the categories id 
				$(".editProductFooter").after('<input type="hidden" name="editProductId" id="editProductId" value="'+response.PRODUCTOID+'" />');


				// submit of edit categories form
				$("#editProductForm").unbind('submit').bind('submit', function() {
					var NOMPRODUCT = $("#editProductName").val();
					var CATEGORIAID  = $("#editProductCat").val();
					var DESCRIPCIONPRODUCT = $("#editProductDesc").val();
					var PRECIOPRODUCT = $("#editProductPre").val();
					var STOCKPRODUCT = $("#editProductSto").val();
					
				
					

					if(NOMPRODUCT == "") {
						$("#editProductName").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editProductName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editProductName").find('.text-danger').remove();
						// success out for form 
						$("#editProductName").closest('.form-group').addClass('has-success');	  	
					}

					if(CATEGORIAID == "") {
						$("#editProductCat").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editProductCat').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editProductCat").find('.text-danger').remove();
						// success out for form 
						$("#editProductCat").closest('.form-group').addClass('has-success');	  	
					}

					if(DESCRIPCIONPRODUCT == "") {
						$("#editProductDesc").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editProductDesc').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editProductDesc").find('.text-danger').remove();
						// success out for form 
						$("#editProductDesc").closest('.form-group').addClass('has-success');	  	
					}

					if(PRECIOPRODUCT == "") {
						$("#editProductPre").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editProductPre').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editProductPre").find('.text-danger').remove();
						// success out for form 
						$("#editProductPre").closest('.form-group').addClass('has-success');	  	
					}
					if(STOCKPRODUCT == "") {
						$("#editProductSto").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editProductSto').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editProductSto").find('.text-danger').remove();
						// success out for form 
						$("#editProductSto").closest('.form-group').addClass('has-success');	  	
					}
				


					

					if(NOMPRODUCT && CATEGORIAID && DESCRIPCIONPRODUCT   && PRECIOPRODUCT && STOCKPRODUCT) {
						var form = $(this);
						// button loading
						$("#editProductBtn").button('loading');

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								// button loading
								$("#editProductBtn").button('reset');

								if(response.success == true) {
									// reload the manage member table 
									manageProductTable.ajax.reload(null, false);									  	  			
									
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-product-messages').html('<div class="alert alert-success">'+
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

function removeProduct(productId = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectedProduct.php',
		type: 'post',
		data: {productId: productId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removeProductBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeProductBtn").button('loading');

				$.ajax({
					url: 'php_action/removeProduct.php',
					type: 'post',
					data: {productId: productId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove categories btn
							$("#removeProductBtn").button('reset');
							// close the modal 
							$("#removeProductModal").modal('hide');
							// update the manage categories table
							manageProductTable.ajax.reload(null, false);
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
							$("#removeProductModal").modal('hide');

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


function addTienda(productId = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectedProduct.php',
		type: 'post',
		data: {productId: productId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#añadirProductBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#añadirProductBtn").button('loading');

				$.ajax({
					url: 'php_action/addProduct.php',
					type: 'post',
					data: {productId: productId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove categories btn
							$("#añadirProductBtn").button('reset');
							// close the modal 
							$("#añadirProductModal").modal('hide');
							// update the manage categories table
							manageProductTable.ajax.reload(null, false);
							// udpate the messages
							$('.añadir-messages').html('<div class="alert alert-success">'+
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
							$("#añadirProductModal").modal('hide');

 							// udpate the messages
							$('.añadir-messages').html('<div class="alert alert-success">'+
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