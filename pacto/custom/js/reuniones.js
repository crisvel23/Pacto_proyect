var manageReunionesTable;
$(document).ready(function() {
	// active top navbar reuniones
	$('#navReuniones').addClass('active');	

	manageReunionesTable = $('#manageReunionesTable').DataTable({
		'ajax' : 'php_action/fetchReuniones.php',
		'order': [],
		"scrollX": true,
	}); // manage categories Data Table

	// on click on submit categories form modal
	$('#addReunionesModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$("#submitReunionesForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit categories form function
		$("#submitReunionesForm").unbind('submit').bind('submit', function() {

			var ReunionesTema = $("#ReunionesTema").val();
			var ReunionesTipo = $("#ReunionesTipo").val();
		
			var ReunionesFecha = $("#ReunionesFecha").val();
			var ReunionesHora = $("#ReunionesHora").val();
			var ReunionesHoraFin = $("#ReunionesHoraFin").val();
		
		



			if(ReunionesTema == "") {
				$("#ReunionesTema").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#ReunionesTema').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#ReunionesTema").find('.text-danger').remove();
				// success out for form 
				$("#ReunionesTema").closest('.form-group').addClass('has-success');	  	
			}	
			if(ReunionesTipo=="") {
				$("#ReunionesTipo").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#ReunionesTipo').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#ReunionesTipo").find('.text-danger').remove();
				// success out for form 
				$("#ReunionesTipo").closest('.form-group').addClass('has-success');	  	
			}
		
			if(ReunionesFecha == "") {
				$("#ReunionesFecha").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#ReunionesFecha').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#ReunionesFecha").find('.text-danger').remove();
				// success out for form 
				$("#ReunionesFecha").closest('.form-group').addClass('has-success');	  	
			}
			if(ReunionesHora == "") {
				$("#ReunionesHora").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#ReunionesHora').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#ReunionesHora").find('.text-danger').remove();
				// success out for form 
				$("#ReunionesHora").closest('.form-group').addClass('has-success');	  	
			}

			if(ReunionesHoraFin == "") {
				$("#ReunionesHoraFin").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#ReunionesHoraFin').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#ReunionesHoraFin").find('.text-danger').remove();
				// success out for form 
				$("#ReunionesHoraFin").closest('.form-group').addClass('has-success');	  	
			}



			if(ReunionesTema && ReunionesTipo  &&  ReunionesFecha && ReunionesHora && ReunionesHoraFin) {
				var form = $(this);
				// button loading
				$("#createReunionesBtn").button('loading');

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) {
						// button loading
						$("#createReunionesBtn").button('reset');

						if(response.success == true) {
							// reload the manage member table 
							manageReunionesTable.ajax.reload(null, false);						

	  	  			// reset the form text
							$("#submitReunionesForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
	  	  			
	  	  			$('#add-reuniones-messages').html('<div class="alert alert-success">'+
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

// edit Reuniones function
function editReuniones(reunionesId = null) {
	if(reunionesId) {
		// remove the added categories id 
		$('#editReunionesId').remove();
		// reset the form text
		$("#editReunionesForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-reuniones-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-reuniones-result').addClass('div-hide');
		//modal footer
		$(".editReunionesFooter").addClass('div-hide');		

		$.ajax({
			url: 'php_action/fetchSelectedReuniones.php',
			type: 'post',
			data: {reunionesId: reunionesId},
			dataType: 'json',
			success:function(response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-reuniones-result').removeClass('div-hide');
				//modal footer
				$(".editReunionesFooter").removeClass('div-hide');	

				// set the categories name
				$("#editReunionesTema").val(response.TEMAREU);

				$("#editReunionesFecha").val(response.FECHAINIREU);
				// add the categories id 
				$("#editReunionesHora").val(response.HORAREU);

				$("#editReunionesHoraFin").val(response.HORAFINREU);



				
				$(".editReunionesFooter").after('<input type="hidden" name="editReunionesId" id="editReunionesId" value="'+response.REUNIONID+'" />');
				


				// submit of edit categories form
				$("#editReunionesForm").unbind('submit').bind('submit', function() {
					
					var TEMAREU = $("#editReunionesTema").val();
					var FECHAINIREU = $("#editReunionesFecha").val();
					var HORAREU = $("#editReunionesHora").val();
					var HORAFINREU = $("#editReunionesHoraFin").val();

	

					if(TEMAREU == "") {
						$("#editReunionesTema").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editReunionesTema').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editReunionesTema").find('.text-danger').remove();
						// success out for form 
						$("#editReunionesTema").closest('.form-group').addClass('has-success');	  	
					}
					if(FECHAINIREU == "") {
						$("#editReunionesFecha").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editReunionesFecha').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editReunionesFecha").find('.text-danger').remove();
						// success out for form 
						$("#editReunionesFecha").closest('.form-group').addClass('has-success');	  	
					}
					if(HORAREU == "") {
						$("#editReunionesHora").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editReunionesHora').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editReunionesHora").find('.text-danger').remove();
						// success out for form 
						$("#editReunionesHora").closest('.form-group').addClass('has-success');	  	
					}
					if(HORAFINREU == "") {
						$("#editReunionesHoraFin").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editReunionesHoraFin').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editReunionesHoraFin").find('.text-danger').remove();
						// success out for form 
						$("#editReunionesHoraFin").closest('.form-group').addClass('has-success');	  	
					}

					if(TEMAREU && FECHAINIREU && HORAREU && HORAFINREU) {
						var form = $(this);
						// button loading
						$("#editReunionesBtn").button('loading');

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								// button loading
								$("#editReunionesBtn").button('reset');

								if(response.success == true) {
									// reload the manage member table 
									manageReunionesTable.ajax.reload(null, false);									  	  			
									
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-reuniones-messages').html('<div class="alert alert-success">'+
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
} // /edit reuniones function




// remove categories function
function removeReuniones(reunionesId = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectedReuniones.php',
		type: 'post',
		data: {reunionesId: reunionesId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removeReunionesBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeReunionesBtn").button('loading');

				$.ajax({
					url: 'php_action/removeReuniones.php',
					type: 'post',
					data: {reunionesId: reunionesId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove categories btn
							$("#removeReunionesBtn").button('reset');
							// close the modal 
							$("#removeReunionesModal").modal('hide');
							// update the manage categories table
							manageReunionesTable.ajax.reload(null, false);
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
							$("#removeReunionesModal").modal('hide');

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