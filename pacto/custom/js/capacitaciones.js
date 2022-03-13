var manageBrandTable;
$(document).ready(function() {
	// top bar active
	$('#navCapacitaciones').addClass('active');
	
	// manage brand table
	manageBrandTable = $("#manageBrandTable").DataTable({
		'ajax': 'php_action/fetchCapacitaciones.php',
		'order': []		
		
		
	});
	//getEntidades


	// submit brand form function
	$("#submitBrandForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var temareu = $("#temareu").val();
		var fechainireu = $("#fechainireu").val();
		var fechafinreu = $("#fechafinreu").val();
		var horareu = $("#horareu").val();
		var horafinreu = $("#horafinreu").val();
		var entidadid = $("#entidadid").val();
		var horacapacitacion = $("#horacapacitacion").val();
		var acta = $("#acta").val();
		var capacitador = $("#capacitador").val();

		if(temareu == "") {
			$("#temareu").after('<p class="text-danger">Este campo es obligatorio</p>');
			$('#temareu').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#temareu").find('.text-danger').remove();
			// success out for form 
			$("#temareu").closest('.form-group').addClass('has-success');	  	
		}

		if(fechainireu == "") {
			$("#fechainireu").after('<p class="text-danger">Este campo es obligatorio</p>');

			$('#fechainireu').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#fechainireu").find('.text-danger').remove();
			// success out for form 
			$("#fechainireu").closest('.form-group').addClass('has-success');	  	
		}

		if(fechafinreu == "") {
			$("#fechafinreu").after('<p class="text-danger">Este campo es obligatorio</p>');

			$('#fechafinreu').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#fechafinreu").find('.text-danger').remove();
			// success out for form 
			$("#fechafinreu").closest('.form-group').addClass('has-success');	  	
		}
		if(horareu == "") {
			$("#horareu").after('<p class="text-danger">Este campo es obligatorio</p>');

			$('#horareu').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#horareu").find('.text-danger').remove();
			// success out for form 
			$("#horareu").closest('.form-group').addClass('has-success');	  	
		}
		if(horafinreu == "") {
			$("#horafinreu").after('<p class="text-danger">Este campo es obligatorio</p>');

			$('#horafinreu').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#horafinreu").find('.text-danger').remove();
			// success out for form 
			$("#horafinreu").closest('.form-group').addClass('has-success');	  	
		}
		if(entidadid == "") {
			$("#entidadid").after('<p class="text-danger">Este campo es obligatorio</p>');

			$('#entidadid').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#entidadid").find('.text-danger').remove();
			// success out for form 
			$("#entidadid").closest('.form-group').addClass('has-success');	  	
		}
		if(horacapacitacion == "") {
			$("#horacapacitacion").after('<p class="text-danger">Este campo es obligatorio</p>');

			$('#horacapacitacion').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#horacapacitacion").find('.text-danger').remove();
			// success out for form 
			$("#horacapacitacion").closest('.form-group').addClass('has-success');	  	
		}
		if(acta == "") {
			$("#acta").after('<p class="text-danger">Este campo es obligatorio</p>');

			$('#acta').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#acta").find('.text-danger').remove();
			// success out for form 
			$("#acta").closest('.form-group').addClass('has-success');	  	
		}
		if(capacitador == "") {
			$("#capacitador").after('<p class="text-danger">Este campo es obligatorio</p>');

			$('#capacitador').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#capacitador").find('.text-danger').remove();
			// success out for form 
			$("#capacitador").closest('.form-group').addClass('has-success');	  	
		}


		if(temareu && fechainireu && fechafinreu && horareu && horafinreu && entidadid && horacapacitacion && acta && capacitador) {
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


 // /edit brands function

function editCapacitaciones(reunionid = null) {
	console.log(reunionid);
	if(reunionid) {
		// remove hidden brand id text
		$('#reunionid').remove();

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
			url: 'php_action/fetchSelectedCapaciotaciones.php',
			type: 'post',
			data: {reunionid : reunionid},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-brand-result').removeClass('div-hide');
				// modal footer
				$('.editBrandFooter').removeClass('div-hide');

				// setting the brand name value 
				$('#editTemareu').val(response.TEMAREU);
				$('#editFechainireu').val(response.FECHAINIREU);
				$('#editFechafinreu').val(response.FECHAFINREU);
				$('#editHorareu').val(response.HORAREU);
				$('#editHorafinreu').val(response.HORAFINREU);
				$('#editEntidadid').val(response.ENTIDADID);
				$('#editHoracapacitacion').val(response.HORAS);
				$('#editActa').val(response.ACTA);
				$('#editStatusreuid').val(response.STATUSREUID);
				$('#ediCapacitador').val(response.CAPACITADOR);
				
				
				// brand id 
				$(".editBrandFooter").after('<input type="hidden" name="reunionid" id="reunionid" value="'+response.REUNIONID+'" />');

				// update brand form 
				$('#editBrandForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var editTemareu    = $('#editTemareu').val();
					var editFechainireu      = $('#editFechainireu').val(); 
					var editFechafinreu = $('#editFechafinreu').val();
					var editHorareu  = $('#editHorareu').val();
					var editHorafinreu 	  = $('#editHorafinreu').val();
					var editEntidadid    = $('#editEntidadid').val();

					var editHoracapacitacion    = $('#editHoracapacitacion').val();
					var editActa    = $('#editActa').val();
					var editStatusreuid    = $('#editStatusreuid').val();
					var ediCapacitador    = $('#ediCapacitador').val();
					

					if(editTemareu == "") {
						$("#editTemareu").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editTemareu').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editTemareu").find('.text-danger').remove();
						// success out for form 
						$("#editTemareu").closest('.form-group').addClass('has-success');	  	
					}
					if(editFechainireu == "") {
						$("#editFechainireu").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editFechainireu').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editFechainireu").find('.text-danger').remove();
						// success out for form 
						$("#editFechainireu").closest('.form-group').addClass('has-success');	  	
					}
					if(editFechafinreu == "") {
						$("#editFechafinreu").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editFechafinreu').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editFechafinreu").find('.text-danger').remove();
						// success out for form 
						$("#editFechafinreu").closest('.form-group').addClass('has-success');	  	
					}
					if(editHorareu == "") {
						$("#editHorareu").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editHorareu').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editHorareu").find('.text-danger').remove();
						// success out for form 
						$("#editHorareu").closest('.form-group').addClass('has-success');	  	
					}
					if(editHorafinreu == "") {
						$("#editHorafinreu").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editHorafinreu').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editHorafinreu").find('.text-danger').remove();
						// success out for form 
						$("#editHorafinreu").closest('.form-group').addClass('has-success');	  	
					}
					if(editEntidadid == "") {
						$("#editEntidadid").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editEntidadid').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editEntidadid").find('.text-danger').remove();
						// success out for form 
						$("#editEntidadid").closest('.form-group').addClass('has-success');	  	
					}


					if(editHoracapacitacion == "") {
						$("#editHoracapacitacion").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editHoracapacitacion').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editHoracapacitacion").find('.text-danger').remove();
						// success out for form 
						$("#editHoracapacitacion").closest('.form-group').addClass('has-success');	  	
					}
					if(editActa == "") {
						$("#editActa").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editActa').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editActa").find('.text-danger').remove();
						// success out for form 
						$("#editActa").closest('.form-group').addClass('has-success');	  	
					}
					if(editStatusreuid == "") {
						$("#editStatusreuid").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editStatusreuid').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editStatusreuid").find('.text-danger').remove();
						// success out for form 
						$("#editStatusreuid").closest('.form-group').addClass('has-success');	  	
					}
					
					if(ediCapacitador == "") {
						$("#ediCapacitador").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#ediCapacitador').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#ediCapacitador").find('.text-danger').remove();
						// success out for form 
						$("#ediCapacitador").closest('.form-group').addClass('has-success');	  	
					}

					

					if(editTemareu && editFechainireu && editFechafinreu && editHorareu && editHorafinreu && editEntidadid && editHoracapacitacion && editActa && editStatusreuid && ediCapacitador) {
						var form = $(this);

						// submit btn
						$('#editTemareu').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editTemareu').button('reset');

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
