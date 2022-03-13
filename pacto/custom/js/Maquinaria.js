var manageMaqTable;

$(document).ready(function() {
	// active top navbar categories
	$('#navMaq').addClass('active');	

	manageMaqTable = $('#manageMaqTable').DataTable({
		'ajax' : 'php_action/fetchMaquinaria.php',
		'order': [],
	}); // manage categories Data Table

	// on click on submit categories form modal
	$('#addMaqModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$("#submitMaqForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');
		
		// submit categories form function
		$("#submitMaqForm").unbind('submit').bind('submit', function() {

			var ENTIDADID = $("#ENTIDADID").val();
        	var PERTENECEID = $("#PERTENECEID").val();
            var NOMMAQ = $("#NOMMAQ").val();
			var ESTADO = $("#ESTADO").val();
			var MARCA = $("#MARCA").val();
            var PLACA = $("#PLACA").val();
			var KILOM = $("#KILOM").val();
            var ORIGEN = $("#ORIGEN").val();
			var CAPACID = $("#CAPACID").val();
			var PLACA2='<?php SELECT PLACAMAQ FROM MAQUINARIASOCIO ?>'			

			if(NOMMAQ == "") {
				$("#NOMMAQ").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#NOMMAQ').closest('.form-group').addClass('has-error');
			}else {
				// remov error text field
				$("#NOMMAQ").find('.text-danger').remove();
				// success out for form 
				$("#NOMMAQ").closest('.form-group').addClass('has-success');	  	
			}

			if(ESTADO == "") {
				$("#ESTADO").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#ESTADO').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#ESTADO").find('.text-danger').remove();
				// success out for form 
				$("#ESTADO").closest('.form-group').addClass('has-success');	  	
			}

			if(MARCA == "") {
				$("#MARCA").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#MARCA').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#MARCA").find('.text-danger').remove();
				// success out for form 
				$("#MARCA").closest('.form-group').addClass('has-success');	  	
			}

			if(PLACA == "") {
				$("#PLACA").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#PLACA').closest('.form-group').addClass('has-error');
				//AQUI SE PUEDE AGREGAR UN ALERT
			} else {
				
				// remov error text field
				$("#PLACA").find('.text-danger').remove();
				// success out for form 
				$("#PLACA").closest('.form-group').addClass('has-success');	  	
			}

			if(KILOM == "") {
				$("#KILOM").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#KILOM').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#KILOM").find('.text-danger').remove();
				// success out for form 
				$("#KILOM").closest('.form-group').addClass('has-success');	  	
			}

			if(ORIGEN == "") {
				$("#ORIGEN").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#ORIGEN').closest('.form-group').addClass('has-error');
			}else {
				// remov error text field
				$("#ORIGEN").find('.text-danger').remove();
				// success out for form 
				$("#ORIGEN").closest('.form-group').addClass('has-success');	  	
			}

			if(CAPACID == "") {
				$("#CAPACID").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#CAPACID').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#CAPACID").find('.text-danger').remove();
				// success out for form 
				$("#CAPACID").closest('.form-group').addClass('has-success');	  	
			}
			


			if(NOMMAQ && ESTADO && MARCA && PLACA && KILOM && ORIGEN && CAPACID && ENTIDADID) {
				var form = $(this);
				// button loading
				$("#createMaqBtn").button('loading');
				

				$.ajax({
					
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',

					
					success:function(response) {
						// button loading
						$("#createMaqBtn").button('reset');

						if(response.success == true) {
							// reload the manage member table 
							manageMaqTable.ajax.reload(null, false);

	  	  			// reset the form text
							$("#submitMaqForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
							
	  	  			
	  	  			$('#add-maq-messages').html('<div class="alert alert-danger">'+
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
		}); // submit categories form function
	}); // /on click on submit categories form modal	
}); // /document


// edit categories function
function editMaq(maqid = null) {
	if(maqid) {
		// remove the added categories id 
		$('#editmaqid').remove();
		// reset the form text
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-users-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-users-result').addClass('div-hide');
		//modal footer
		$(".editMaqFooter").addClass('div-hide');		

		$.ajax({
			url: 'php_action/fetchSelectedMaq.php',
			type: 'post',
			data: {maqid: maqid},
			dataType: 'json',
			success:function(response) {
				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-users-result').removeClass('div-hide');
				//modal footer
				$(".editMaqFooter").removeClass('div-hide');

				$("#editNommaqName").val(response.NOMBREMAQ);
				$("#editEstado").val(response.ESTADOMAQ);
				$("#editMarca").val(response.MARCAMAQ);
				$("#editPlaca").val(response.PLACAMAQ);
				$("#editKilom").val(response.KILOMETRAJEMAQ);
				$("#editOrigen").val(response.ORIGENMAQ);
				$("#editCapacid").val(response.CAPACIDADMAQ);

				// add the categories id 
				$(".editMaqFooter").after('<input type="hidden" name="editmaqid" id="editmaqid" value="'+response.MAQUINARIAID+'" />');


				// submit of edit categories form
				$("#editMaqForm").unbind('submit').bind('submit', function() {
					// remove the error text
					$(".text-danger").remove();
					// remove the form error
				$('.form-group').removeClass('has-error').removeClass('has-success');
					var NOMMAQ = $("#editNommaqName").val();
					var ESTADO  = $("#editEstado").val();
					var MARCA = $("#editMarca").val();
					var PLACA = $("#editPlaca").val();
					var KILOM = $("#editKilom").val();
					var ORIGEN = $("#editOrigen").val();
					var CAPACID = $("#editCapacid").val();

					if(NOMMAQ == "") {
						$("#editNommaqName").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editNommaqName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editNommaqName").find('.text-danger').remove();
						// success out for form 
						$("#editNommaqName").closest('.form-group').addClass('has-success');	  	
					}

					if(ESTADO == "") {
						$("#editEstado").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editEstado').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editEstado").find('.text-danger').remove();
						// success out for form 
						$("#editEstado").closest('.form-group').addClass('has-success');	  	
					}

					if(MARCA == "") {
						$("#editMarca").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editMarca').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editMarca").find('.text-danger').remove();
						// success out for form 
						$("#editMarca").closest('.form-group').addClass('has-success');	  	
					}

					if(PLACA == "") {
						$("#editPlaca").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editPlaca').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editPlaca").find('.text-danger').remove();
						// success out for form 
						$("#editPlaca").closest('.form-group').addClass('has-success');	  	
					}

					if(KILOM == "") {
						$("#editKilom").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editKilom').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editKilom").find('.text-danger').remove();
						// success out for form 
						$("#editKilom").closest('.form-group').addClass('has-success');	  	
					}

					if(ORIGEN == "") {
						$("#editOrigen").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editOrigen').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editOrigen").find('.text-danger').remove();
						// success out for form 
						$("#editOrigen").closest('.form-group').addClass('has-success');	  	
					}

					if(CAPACID == "") {
						$("#editCapacid").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editCapacid').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCapacid").find('.text-danger').remove();
						// success out for form 
						$("#editCapacid").closest('.form-group').addClass('has-success');	  	
					}

					if(NOMMAQ && ESTADO && MARCA && PLACA && KILOM && ORIGEN && CAPACID) {
						var form = $(this);
						
						// button loading
						$("#editMaqBtn").button('loading');

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								// button loading
								$("#editMaqBtn").button('reset');

								if(response.success == true) {
									// reload the manage member table 
									manageMaqTable.ajax.reload(null, false);									  	  			
									
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-users-messages').html('<div class="alert alert-success">'+
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
function removeMaq(maqid = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectedMaq.php',
		type: 'post',
		data: {maqid: maqid},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removeMaqBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeMaqBtn").button('loading');

				$.ajax({
					url: 'php_action/deleteMaq.php',
					type: 'post',
					data: {maqid: maqid},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove categories btn
							$("#removeMaqBtn").button('reset');
							// close the modal 
							$("#removeMaqModal").modal('hide');
							// update the manage categories table
							manageMaqTable.ajax.reload(null, false);
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
							$("#removeMaqModal").modal('hide');

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









