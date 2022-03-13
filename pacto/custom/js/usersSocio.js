var manageUsersSocioTable;

$(document).ready(function () {
	// active top navbar categories
	$('#navSocioUsers').addClass('active');

	manageUsersSocioTable = $('#manageUsersSocioTable').DataTable({
		'ajax': 'php_action/fetchSocioUsers.php',
		'order': [],
		"scrollX": true,
	}); // manage categories Data Table



	manageCatTable = $('#manageCatTable').DataTable({
		'ajax': 'php_action/fetchCat.php',
		'order': [],
		"scrollX": true,

	}); // manage categories Data Table 

	// on click on submit categories form modal
	$('#cateModalBtn').unbind('click').bind('click', function () {
		// reset the form text
		$("#createCateForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit categories form function
		$("#createCateForm").unbind('submit').bind('submit', function () {


			var NOMCAT = $("#NOMCAT").val();
			var DESCCAT = $("#DESCCAT").val();


			if (NOMCAT == "") {
				$("#NOMCAT").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#NOMCAT').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#NOMCAT").find('.text-danger').remove();
				// success out for form 
				$("#NOMCAT").closest('.form-group').addClass('has-success');
			}

			if (DESCCAT == "") {
				$("#DESCCAT").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#DESCCAT').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#DESCCAT").find('.text-danger').remove();
				// success out for form 
				$("#DESCCAT").closest('.form-group').addClass('has-success');
			}



			if (NOMCAT && DESCCAT) {
				var form = $(this);
				// button loading
				$("#createCateBtn").button('loading');

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success: function (response) {
						// button loading
						$("#createCateBtn").button('reset');

						if (response.success == true) {
							// reload the manage member table 
							manageCatTable.ajax.reload(null, false);

							// reset the form text
							$("#createCateForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');

							$('#add-categoria-messages').html('<div class="alert alert-success">' +
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

	$('#addUsersModalBtn').unbind('click').bind('click', function () {
		// reset the form text
		$("#submitUsersForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit categories form function
		$("#submitUsersForm").unbind('submit').bind('submit', function () {


			var NOMBREUSU = $("#NOMBREUSU").val();
			var EMAILUSU = $("#EMAILUSU").val();
			var TELCUSU = $("#TELCUSU").val();
			var TELCELUSU = $("#TELCELUSU").val();
			var CONTRAUSU = $("#CONTRAUSU").val();
			var DIRUSU = $("#DIRUSU").val();
			var NOMBREAPEUSU = $("#NOMBREAPEUSU").val();
			var CONTRAUSURE = $("#CONTRAUSURE").val();
			var CEDULAUSU = $("#CEDULAUSU").val();


			if (NOMBREUSU == "") {
				$("#NOMBREUSU").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#NOMBREUSU').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#NOMBREUSU").find('.text-danger').remove();
				// success out for form 
				$("#NOMBREUSU").closest('.form-group').addClass('has-success');
			}

			if (CEDULAUSU == "") {
				$("#CEDULAUSU").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#CEDULAUSU').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#CEDULAUSU").find('.text-danger').remove();
				// success out for form 
				$("#CEDULAUSU").closest('.form-group').addClass('has-success');
			}




			if (EMAILUSU == "") {
				$("#EMAILUSU").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#EMAILUSU').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#EMAILUSU").find('.text-danger').remove();
				// success out for form 
				$("#EMAILUSU").closest('.form-group').addClass('has-success');
			}

			if (TELCUSU == "") {
				$("#TELCUSU").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#TELCUSU').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#TELCUSU").find('.text-danger').remove();
				// success out for form 
				$("#TELCUSU").closest('.form-group').addClass('has-success');
			}

			if (TELCELUSU == "") {
				$("#TELCELUSU").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#TELCELUSU').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#TELCELUSU").find('.text-danger').remove();
				// success out for form 
				$("#TELCELUSU").closest('.form-group').addClass('has-success');
			}

			if (CONTRAUSU == "") {
				$("#CONTRAUSU").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#CONTRAUSU').closest('.form-group').addClass('has-error');

			} else {
				// remov error text field
				$("#CONTRAUSU").find('.text-danger').remove();
				// success out for form 
				$("#CONTRAUSU").closest('.form-group').addClass('has-success');
			}

			if (CONTRAUSU != CONTRAUSURE) {
				$("#CONTRAUSU").after('<p class="text-danger">Las contraseñas deben coincidir</p>');
				$('#CONTRAUSU').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#CONTRAUSU").find('.text-danger').remove();
				// success out for form 
				$("#CONTRAUSU").closest('.form-group').addClass('has-success');
			}

			if (CONTRAUSURE == "") {
				$("#CONTRAUSURE").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#CONTRAUSURE').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#CONTRAUSURE").find('.text-danger').remove();
				// success out for form 
				$("#CONTRAUSURE").closest('.form-group').addClass('has-success');
			}

			if (DIRUSU == "") {
				$("#DIRUSU").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#DIRUSU').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#DIRUSU").find('.text-danger').remove();
				// success out for form 
				$("#DIRUSU").closest('.form-group').addClass('has-success');
			}

			if (NOMBREAPEUSU == "") {
				$("#NOMBREAPEUSU").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#NOMBREAPEUSU').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#NOMBREAPEUSU").find('.text-danger').remove();
				// success out for form 
				$("#NOMBREAPEUSU").closest('.form-group').addClass('has-success');
			}


			if (NOMBREUSU && EMAILUSU && TELCUSU && TELCELUSU && CONTRAUSU && DIRUSU && NOMBREAPEUSU && CONTRAUSURE == CONTRAUSU) {
				var form = $(this);
				// button loading
				$("#createUsersBtn").button('loading');

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success: function (response) {
						// button loading
						$("#createUsersBtn").button('reset');

						if (response.success == true) {
							// reload the manage member table 
							manageUsersSocioTable.ajax.reload(null, false);

							// reset the form text
							$("#submitUsersForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');

							$('#add-users-messages').html('<div class="alert alert-success">' +
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
function editUsers(usersId = null) {
	if (usersId) {
		// remove the added categories id 
		$('#editUsersId').remove();
		// reset the form text
		$("#editUsersForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-socio-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-socio-messages').addClass('div-hide');
		//modal footer
		$(".editUsersFooter").addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedSocioUsers.php',
			type: 'post',
			data: {
				usersId: usersId
			},
			dataType: 'json',
			success: function (response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-socio-messages').removeClass('div-hide');
				//modal footer
				$(".editUsersFooter").removeClass('div-hide');
				// set the usuario name
				$("#editUsersName").val(response.NOMBREUSU);
				// set the rol 
				// set the email
				$("#editUsersEmail").val(response.EMAILUSU);
				// set the telefono
				$("#editUsersTelf").val(response.TELCUSU);
				// set the celular
				$("#editUsersTelc").val(response.TELCELUSU);
				// set the contraseña
				$("#editUsersContra").val(response.CONTRAUSU);
				// set the direccion
				$("#editUsersDir").val(response.DIRUSU);
				// set the nombreapellido
				$("#editUsersNomApe").val(response.NOMBREAPEUSU);
				// set the users status
				$("#editUsersStatus").val(response.STATUSUSU);
				// set the users status
				$("#editUsersCedula").val(response.CEDULAUSU);

				// add the categories id 
				$(".editUsersFooter").after('<input type="hidden" name="editUsersId" id="editUsersId" value="' + response.USUARIOID + '" />');


				// submit of edit categories form
				$("#editUsersForm").unbind('submit').bind('submit', function () {
					var NOMBREUSU = $("#editUsersName").val();
					var EMAILUSU = $("#editUsersEmail").val();
					var TELCUSU = $("#editUsersTelf").val();
					var TELCELUSU = $("#editUsersTelc").val();
					var CONTRAUSU = $("#editUsersContra").val();
					var DIRUSU = $("#editUsersDir").val();
					var NOMBREAPEUSU = $("#editUsersNomApe").val();
					var STATUSUSU = $("#editUsersStatus").val();
					var CEDULAUSU = $("#editUsersCedula").val();



					if (NOMBREUSU == "") {
						$("#editUsersName").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editUsersName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersName").find('.text-danger').remove();
						// success out for form 
						$("#editUsersName").closest('.form-group').addClass('has-success');
					}


					if (EMAILUSU == "") {
						$("#editUsersEmail").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editUsersEmail').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersEmail").find('.text-danger').remove();
						// success out for form 
						$("#editUsersEmail").closest('.form-group').addClass('has-success');
					}

					if (TELCUSU == "") {
						$("#editUsersTelf").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editUsersTelf').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersTelf").find('.text-danger').remove();
						// success out for form 
						$("#editUsersTelf").closest('.form-group').addClass('has-success');
					}

					if (TELCELUSU == "") {
						$("#editUsersTelc").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editUsersTelc').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersTelc").find('.text-danger').remove();
						// success out for form 
						$("#editUsersTelc").closest('.form-group').addClass('has-success');
					}

					if (CONTRAUSU == "") {
						$("#editUsersContra").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editUsersContra').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersContra").find('.text-danger').remove();
						// success out for form 
						$("#editUsersContra").closest('.form-group').addClass('has-success');
					}

					if (DIRUSU == "") {
						$("#editUsersDir").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editUsersDir').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersDir").find('.text-danger').remove();
						// success out for form 
						$("#editUsersDir").closest('.form-group').addClass('has-success');
					}

					if (NOMBREAPEUSU == "") {
						$("#editUsersNomApe").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editUsersNomApe').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersNomApe").find('.text-danger').remove();
						// success out for form 
						$("#editUsersNomApe").closest('.form-group').addClass('has-success');
					}

					if (STATUSUSU == "") {
						$("#editUsersStatus").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editUsersStatus').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersStatus").find('.text-danger').remove();
						// success out for form 
						$("#editUsersStatus").closest('.form-group').addClass('has-success');
					}

					if (CEDULAUSU == "") {
						$("#editUsersCedula").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editUsersCedula').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersCedula").find('.text-danger').remove();
						// success out for form 
						$("#editUsersCedula").closest('.form-group').addClass('has-success');
					}

					if (NOMBREUSU && EMAILUSU && TELCUSU && TELCELUSU && CONTRAUSU && DIRUSU && NOMBREAPEUSU && STATUSUSU && CEDULAUSU) {
						var form = $(this);
						// button loading
						$("#editUsersBtn").button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success: function (response) {
								// button loading
								$("#editUsersBtn").button('reset');

								if (response.success == true) {
									// reload the manage member table 
									manageUsersSocioTable.ajax.reload(null, false);

									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

									$('#edit-socio-messages').html('<div class="alert alert-success">' +
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
function removeUsers(usersId = null) {

	$.ajax({
		url: 'php_action/fetchSelectedUsers.php',
		type: 'post',
		data: {
			usersId: usersId
		},
		dataType: 'json',
		success: function (response) {

			// remove categories btn clicked to remove the categories function
			$("#removeUsersBtn").unbind('click').bind('click', function () {
				// remove categories btn
				$("#removeUsersBtn").button('loading');

				$.ajax({
					url: 'php_action/removeUsers.php',
					type: 'post',
					data: {
						usersId: usersId
					},
					dataType: 'json',
					success: function (response) {
						if (response.success == true) {
							// remove categories btn
							$("#removeUsersBtn").button('reset');
							// close the modal 
							$("#removeUsersModal").modal('hide');
							// update the manage categories table
							manageUsersSocioTable.ajax.reload(null, false);
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
							$("#removeUsersModal").modal('hide');

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

/*
---------------------------------------------------------------------*/

function editAsociacion(asoId = null) {
	if (asoId) {
		// remove the added categories id 
		$('#editAsoId').remove();
		// reset the form text
		$("#editSocioForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-socio-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-socioaso-result').addClass('div-hide');
		//modal footer
		$(".editSociosFooter").addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedAsoEdit.php',
			type: 'post',
			data: {
				asoId: asoId
			},
			dataType: 'json',
			success: function (response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-socioaso-result').removeClass('div-hide');
				//modal footer
				$(".editSociosFooter").removeClass('div-hide');
				// set the usuario name
				$("#editAsoName").val(response.NOMBREASO);

				// add the categories id 
				$(".editSociosFooter").after('<input type="hidden" name="editAsoId" id="editAsoId" value="' + response.ASOCIACIONID + '" />');


				// submit of edit categories form
				$("#editSocioForm").unbind('submit').bind('submit', function () {

					var NOMBREASO = $("#editAsoName").val();


					if (NOMBREASO == "") {
						$("#editAsoName").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editAsoName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editAsoName").find('.text-danger').remove();
						// success out for form 
						$("#editAsoName").closest('.form-group').addClass('has-success');
					}



					if (NOMBREASO) {
						var form = $(this);
						// button loading
						$("#editSocioBtn").button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success: function (response) {
								// button loading
								$("#editSocioBtn").button('reset');
								if (response.success == true) {

									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

									$('#edit-socioaso-messages').html('<div class="alert alert-success">' +
										'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
										'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
										'</div>');

									$(".alert-success").delay(500).show(10, function () {
										$(this).delay(3000).hide(10, function () {
											window.location.reload();
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


/*
---------------------------------------------------------------------*/
function editCate(catId = null) {
	if (catId) {
		// remove the added categories id 
		$('#editCateId').remove();
		// reset the form text
		$("#editCateForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-cate-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-cate-messages').addClass('div-hide');
		//modal footer
		$(".editCateFooter").addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedCate.php',
			type: 'post',
			data: {
				catId: catId
			},
			dataType: 'json',

			success: function (response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-cate-messages').removeClass('div-hide');
				//modal footer
				$(".editCateFooter").removeClass('div-hide');

				// set the usuario name
				$("#editCatName").val(response.NOMCAT);
				// set the rol 
				// set the email
				$("#editCatDesc").val(response.DESCCAT);
				// set the telefon

				// add the categories id 
				$(".editCateFooter").after('<input type="hidden" name="editCateId" id="editCateId" value="' + response.CATEGORIAID + '" />');


				// submit of edit categories form
				$("#editCateForm").unbind('submit').bind('submit', function () {
					var NOMCAT = $("#editCatName").val();
					var DESCCAT = $("#editCatDesc").val();


					if (NOMCAT == "") {
						$("#editCatName").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editCatName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCatName").find('.text-danger').remove();
						// success out for form 
						$("#editCatName").closest('.form-group').addClass('has-success');
					}


					if (DESCCAT == "") {
						$("#editCatDesc").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editCatDesc').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCatDesc").find('.text-danger').remove();
						// success out for form 
						$("#editCatDesc").closest('.form-group').addClass('has-success');
					}

					if (NOMCAT && DESCCAT) {
						var form = $(this);
						// button loading
						$("#editCateBtn").button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success: function (response) {
								// button loading
								$("#editCateBtn").button('reset');

								if (response.success == true) {
									// reload the manage member table 
									manageCatTable.ajax.reload(null, false);

									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

									$('#edit-cate-messages').html('<div class="alert alert-success">' +
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



function removeCate(catId = null) {
	$.ajax({
		url: 'php_action/fetchSelectedCate.php',
		type: 'post',
		data: {
			catId: catId
		},
		dataType: 'json',
		success: function (response) {

			// remove categories btn clicked to remove the categories function
			$("#removeCateBtn").unbind('click').bind('click', function () {
				// remove categories btn
				$("#removeCateBtn").button('loading');

				$.ajax({
					url: 'php_action/removeCat.php',
					type: 'post',
					data: {
						catId: catId
					},
					dataType: 'json',
					success: function (response) {
						if (response.success == true) {
							// remove categories btn
							$("#removeCateBtn").button('reset');
							// close the modal 
							$("#removeCateModal").modal('hide');
							// update the manage categories table
							manageCatTable.ajax.reload(null, false);
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
							$("#removeCateModal").modal('hide');

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