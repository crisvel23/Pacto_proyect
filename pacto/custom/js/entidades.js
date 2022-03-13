var manageBrandTable;

$(document).ready(function() {
	// top bar active
	$('#navBrand').addClass('active');
	
	// manage brand table
	manageBrandTable = $("#manageBrandTable").DataTable({
		'ajax': 'php_action/fetchEntidades.php',
		'order': []		
		
		
	});

	// submit brand form function
	$("#submitBrandForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			
 
		var nombre = $("#nombre").val();
		var tipo = $("#tipo").val();
		var direccion = $("#direccion").val();
		var telefono = $("#telefono").val();
		var pais = $("#pais").val();
		var ciudad = $("#ciudad").val();

		if(nombre == "") {
			$("#nombre").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#nombre').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#nombre").find('.text-danger').remove();
			// success out for form 
			$("#nombre").closest('.form-group').addClass('has-success');	  	
		}

		if(tipo == "") {
			$("#tipo").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#tipo').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#tipo").find('.text-danger').remove();
			// success out for form 
			$("#tipo").closest('.form-group').addClass('has-success');	  	
		}

		if(direccion == "") {
			$("#direccion").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#direccion').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#direccion").find('.text-danger').remove();
			// success out for form 
			$("#direccion").closest('.form-group').addClass('has-success');	  	
		}

		if(telefono == "") {
			$("#telefono").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#telefono').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#telefono").find('.text-danger').remove();
			// success out for form 
			$("#telefono").closest('.form-group').addClass('has-success');	  	
		}

		if(pais == "") {
			$("#pais").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#pais').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#pais").find('.text-danger').remove();
			// success out for form 
			$("#pais").closest('.form-group').addClass('has-success');	  	
		}

		if(ciudad == "") {
			$("#ciudad").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#ciudad').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#ciudad").find('.text-danger').remove();
			// success out for form 
			$("#ciudad").closest('.form-group').addClass('has-success');	  	
		}


		if(nombre && tipo && direccion && telefono && pais && ciudad) {
			var form = $(this);
			// button loading
			$("#createBrandBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createBrandBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						manageBrandTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitBrandForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-brand-messages').html('<div class="alert alert-success">'+
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
	}); // /submit brand form function

});

function editEntidades(entidadid = null) {
	if(entidadid) {
		// remove hidden brand id text
		$('#entidadid').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-brand-result').addClass('div-hide');
		// modal footer
		$('.editBrandFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSlectedEntidades.php',
			type: 'post',
			data: {entidadid : entidadid},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-brand-result').removeClass('div-hide');
				// modal footer
				$('.editBrandFooter').removeClass('div-hide');

				// setting the brand name value 
				$('#editNombre').val(response.NOMBREENT);
				$('#editTipo').val(response.TIPO);
				$('#editDireccion').val(response.DIRENT);
				$('#editTelefono').val(response.TELENT);
				$('#editPais').val(response.PAISID);
				$('#editCiudad').val(response.CIUENT);
				
				
				// brand id 
				$(".editBrandFooter").after('<input type="hidden" name="entidadid" id="entidadid" value="'+response.ENTIDADID+'" />');

				// update brand form 
				$('#editBrandForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var editNombre    = $('#editNombre').val();
					var editTipo      = $('#editTipo').val(); 
					var editDireccion = $('#editDireccion').val();
					var editTelefono  = $('#editTelefono').val();
					var editPais 	  = $('#editPais').val();
					var editCiudad    = $('#editCiudad').val();
					

					if(editNombre == "") {
						$("#editNombre").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editNombre').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editNombre").find('.text-danger').remove();
						// success out for form 
						$("#editNombre").closest('.form-group').addClass('has-success');	  	
					}
					if(editTipo == "") {
						$("#editTipo").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editTipo').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editTipo").find('.text-danger').remove();
						// success out for form 
						$("#editTipo").closest('.form-group').addClass('has-success');	  	
					}
					if(editDireccion == "") {
						$("#editDireccion").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editDireccion').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editDireccion").find('.text-danger').remove();
						// success out for form 
						$("#editDireccion").closest('.form-group').addClass('has-success');	  	
					}
					if(editTelefono == "") {
						$("#editTelefono").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editTelefono').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editTelefono").find('.text-danger').remove();
						// success out for form 
						$("#editTelefono").closest('.form-group').addClass('has-success');	  	
					}
					if(editPais == "") {
						$("#editPais").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editPais').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editPais").find('.text-danger').remove();
						// success out for form 
						$("#editPais").closest('.form-group').addClass('has-success');	  	
					}
					if(editCiudad == "") {
						$("#editCiudad").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editCiudad').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCiudad").find('.text-danger').remove();
						// success out for form 
						$("#editCiudad").closest('.form-group').addClass('has-success');	  	
					}

					

					if(editNombre && editTipo && editDireccion && editTelefono && editPais && editCiudad) {
						var form = $(this);

						// submit btn
						$('#editNombre').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editNombre').button('reset');

									// reload the manage member table 
									manageBrandTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-brand-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} // /if
									
							}// /success
						});	 // /ajax												
					} // /if

					return false;
				}); // /update brand form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit brands function
