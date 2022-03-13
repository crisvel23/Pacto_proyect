var manageAssociationsTable;

$(document).ready(function () {
	// active top navbar categories
	$('#navAssociations').addClass('active');

	manageAssociationsTable = $('#manageAssociationsTable').DataTable({
		'ajax': 'php_action/fetchAssociations.php',
		'order': [],
		"scrollX": true
	}); // manage categories Data Table

	// on click on submit categories form modal
	$('#addAssociationsModalBtn').unbind('click').bind('click', function () {
		// reset the form text
		$("#submitAssociationsForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit categories form function
		$("#submitAssociationsForm").unbind('submit').bind('submit', function () {

			var NOMBREASO = $("#NOMBREASO").val();
			var SECTORASO = $("#SECTORASO").val();
			var BARRIOASO = $("#BARRIOASO").val();
			var PARROQUIAASO = $("#PARROQUIAASO").val();

			var STATUSASO = $("#STATUSASO").val();



			if (NOMBREASO == "") {
				$("#NOMBREASO").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#NOMBREASO').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#NOMBREASO").find('.text-danger').remove();
				// success out for form 
				$("#NOMBREASO").closest('.form-group').addClass('has-success');
			}


			if (SECTORASO == "") {
				$("#SECTORASO").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#SECTORASO').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#SECTORASO").find('.text-danger').remove();
				// success out for form 
				$("#SECTORASO").closest('.form-group').addClass('has-success');
			}

			if (BARRIOASO == "") {
				$("#BARRIOASO").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#BARRIOASO').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#BARRIOASO").find('.text-danger').remove();
				// success out for form 
				$("#BARRIOASO").closest('.form-group').addClass('has-success');
			}

			if (PARROQUIAASO == "") {
				$("#PARROQUIAASO").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#PARROQUIAASO').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#PARROQUIAASO").find('.text-danger').remove();
				// success out for form 
				$("#PARROQUIAASO").closest('.form-group').addClass('has-success');
			}



			if (STATUSASO == "") {
				$("#STATUSASO").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#STATUSASO').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#STATUSASO").find('.text-danger').remove();
				// success out for form 
				$("#STATUSASO").closest('.form-group').addClass('has-success');
			}

			if (NOMBREASO && SECTORASO && BARRIOASO && PARROQUIAASO && STATUSASO) {
				var form = $(this);
				// button loading
				$("#createAssociationsBtn").button('loading');

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success: function (response) {
						// button loading
						$("#createAssociationsBtn").button('reset');

						if (response.success == true) {
							// reload the manage member table 
							manageAssociationsTable.ajax.reload(null, false);

							// reset the form text
							$("#submitAssociationsForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');

							$('#add-associations-messages').html('<div class="alert alert-success">' +
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
		}); // submit categories form function
	}); // /on click on submit categories form modal	

}); // /document

// edit categories function
// edit categories function
// /edit categories function // /edit categories function
function editAssociations(associationsId = null) {
	if (associationsId) {
		// remove the added categories id 
		$('#editAssociationsId').remove();
		// reset the form text
		$("#editAssociationsForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-associations-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-associations-result').addClass('div-hide');
		//modal footer
		$(".editAssociationsFooter").addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedAssociations.php',
			type: 'post',
			data: {
				associationsId: associationsId
			},
			dataType: 'json',
			success: function (response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-associations-result').removeClass('div-hide');
				//modal footer
				$(".editAssociationsFooter").removeClass('div-hide');

				// set the categories name
				$("#editAssociationsName").val(response.NOMBREASO);
				$("#editAssociationsSector").val(response.SECTORASO);
				$("#editAssociationsBarrio").val(response.BARRIOASO);
				$("#editAssociationsParroquia").val(response.PARROQUIAASO);

				$("#editAssociationsStatus").val(response.STATUSASO);
				// add the categories id 
				$(".editAssociationsFooter").after('<input type="hidden" name="editAssociationsId" id="editAssociationsId" value="' + response.ASOCIACIONID + '" />');


				// submit of edit categories form
				$("#editAssociationsForm").unbind('submit').bind('submit', function () {
					var NOMBREASO = $("#editAssociationsName").val();
					var SECTORASO = $("#editAssociationsSector").val();
					var BARRIOASO = $("#editAssociationsBarrio").val();
					var PARROQUIAASO = $("#editAssociationsParroquia").val();

					var STATUSASO = $("#editAssociationsStatus").val();


					if (NOMBREASO == "") {
						$("#editAssociationsName").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editAssociationsName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editAssociationsName").find('.text-danger').remove();
						// success out for form 
						$("#editAssociationsName").closest('.form-group').addClass('has-success');
					}

					if (SECTORASO == "") {
						$("#editAssociationsSector").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editAssociationsSector').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editAssociationsSector").find('.text-danger').remove();
						// success out for form 
						$("#editAssociationsSector").closest('.form-group').addClass('has-success');
					}
					if (BARRIOASO == "") {
						$("#editAssociationsBarrio").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editAssociationsBarrio').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editAssociationsBarrio").find('.text-danger').remove();
						// success out for form 
						$("#editAssociationsBarrio").closest('.form-group').addClass('has-success');
					}
					if (PARROQUIAASO == "") {
						$("#editAssociationsParroquia").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editAssociationsParroquia').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editAssociationsParroquia").find('.text-danger').remove();
						// success out for form 
						$("#editAssociationsParroquia").closest('.form-group').addClass('has-success');
					}

					if (STATUSASO == "") {
						$("#editAssociationsStatus").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editAssociationsStatus').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editAssociationsStatus").find('.text-danger').remove();
						// success out for form 
						$("#editAssociationsStatus").closest('.form-group').addClass('has-success');
					}



					if (NOMBREASO && SECTORASO && BARRIOASO && PARROQUIAASO && STATUSASO) {
						var form = $(this);
						// button loading
						$("#editAssociationsBtn").button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success: function (response) {
								// button loading
								$("#editAssociationsBtn").button('reset');

								if (response.success == true) {
									// reload the manage member table 
									manageAssociationsTable.ajax.reload(null, false);

									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

									$('#edit-associations-messages').html('<div class="alert alert-success">' +
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
				}); // /submit of edit categories form

			} // /success
		}); // /fetch the selected categories data

	} else {
		alert('Oops!! Refresh the page');
	}
} // /edit categories function





// remove categories function
function removeAssociations(associationsId = null) {

	$.ajax({
		url: 'php_action/fetchSelectedAssociations.php',
		type: 'post',
		data: {
			associationsId: associationsId
		},
		dataType: 'json',
		success: function (response) {

			// remove categories btn clicked to remove the categories function
			$("#removeAssociationsBtn").unbind('click').bind('click', function () {
				// remove categories btn
				$("#removeAssociationsBtn").button('loading');

				$.ajax({
					url: 'php_action/removeAssociations.php',
					type: 'post',
					data: {
						associationsId: associationsId
					},
					dataType: 'json',
					success: function (response) {
						if (response.success == true) {
							// remove categories btn
							$("#removeAssociationsBtn").button('reset');
							// close the modal 
							$("#removeAssociationsModal").modal('hide');
							// update the manage categories table
							manageAssociationsTable.ajax.reload(null, false);
							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">' +
								'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
								'</div>');

							$(".alert-success").delay(500).show(10, function () {
								$(this).delay(3000).hide(10, function () {
									$(this).remove();
								});
							}); // /.alert
						} else {
							// close the modal 
							$("#removeAssociationsModal").modal('hide');

							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">' +
								'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
								'</div>');

							$(".alert-success").delay(500).show(10, function () {
								$(this).delay(3000).hide(10, function () {
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