<!-- add users -->
<div class="modal fade" id="addUsersModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="form-horizontal" id="submitUsersForm" action="php_action/createSocioUsers.php" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Socios</h4>
				</div>
				<div class="modal-body">


					<div id="add-users-messages"></div>

					<div class="form-group">
						<label for="NOMBREAPEUSU" class="col-sm-4 control-label">Nombre de Socio : </label>

						<div class="col-sm-7">
							<input type="text" class="form-control" id="NOMBREAPEUSU" placeholder="Introduce Nombre y Apellido" name="NOMBREAPEUSU" autocomplete="off">
						</div>
					</div> <!-- /form-group-->

					<div class="form-group">
						<label for="NOMBREUSU" class="col-sm-4 control-label">Nickname : </label>

						<div class="col-sm-7">
							<input type="text" class="form-control" id="NOMBREUSU" placeholder="Introduce nombre de Usuario" name="NOMBREUSU" autocomplete="off">
						</div>
					</div> <!-- /form-group-->

					<div class="form-group">
						<label for="CEDULAUSU" class="col-sm-4 control-label">Cédula : </label>

						<div class="col-sm-7">
							<input type="text" class="form-control" id="CEDULAUSU" placeholder="Introduce cédula de Usuario" name="CEDULAUSU" autocomplete="off">
						</div>
					</div> <!-- /form-group-->


					<div class="form-group">
						<label for="EMAILUSU" class="col-sm-4 control-label">Email : </label>

						<div class="col-sm-7">
							<input type="email" class="form-control" id="EMAILUSU" placeholder="Introduce Email " name="EMAILUSU" autocomplete="off">
						</div>
					</div> <!-- /form-group-->

					<div class="form-group">
						<label for="CONTRAUSU" class="col-sm-4 control-label">Contraseña : </label>

						<div class="col-sm-7">
							<input type="password" class="form-control" id="CONTRAUSU" placeholder="Introduce Contraseña" name="CONTRAUSU" autocomplete="off">
						</div>
					</div> <!-- /form-group-->

					<!--  -------------------------------------------------------------------------------------------------------- -->

					<div class="form-group">
						<label for="CONTRAUSURE" class="col-sm-4 control-label">Repita Contraseña : </label>

						<div class="col-sm-7">
							<input type="password" class="form-control" id="CONTRAUSURE" placeholder="Introduce Contraseña Nuevamente" name="CONTRAUSURE" autocomplete="off">
						</div>
					</div> <!-- /form-group-->

					<!--  -------------------------------------------------------------------------------------------------------- -->
					<div class="form-group">
						<label for="TELCUSU" class="col-sm-4 control-label">Teléfono de Casa : </label>

						<div class="col-sm-7">
							<input type="text" class="form-control" id="TELCUSU" placeholder="Introduce teléfono de casa" name="TELCUSU" autocomplete="off">
						</div>
					</div> <!-- /form-group-->


					<div class="form-group">
						<label for="TELCELUSU" class="col-sm-4 control-label">Teléfono de Celular : </label>

						<div class="col-sm-7">
							<input type="text" class="form-control" id="TELCELUSU" placeholder="Introduce teléfono de celular" name="TELCELUSU" autocomplete="off">
						</div>
					</div> <!-- /form-group-->

					<div class="form-group">
						<label for="DIRUSU" class="col-sm-4 control-label">Dirección : </label>

						<div class="col-sm-7">
							<input type="text" class="form-control" id="DIRUSU" placeholder="Introduce dirección" name="DIRUSU" autocomplete="off">
						</div>
					</div> <!-- /form-group-->




				</div> <!-- /modal-body -->

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>

					<button type="submit" class="btn btn-primary" id="createUsersBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
				</div> <!-- /modal-footer -->
			</form> <!-- /.form -->
		</div> <!-- /modal-content -->
	</div> <!-- /modal-dailog -->
</div>
<!-- /add users -->


<!-- edit categories brand -->
<div class="modal fade" id="editUsersModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="form-horizontal" id="editUsersForm" action="php_action/editSocioUsers.php" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Editar Socios</h4>
				</div>
				<div class="modal-body">

					<div id="edit-socio-messages"></div>

					<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

					<div class="edit-socio-result">
						<div class="form-group">
							<label for="editUsersName" class="col-sm-4 control-label">Nombre de usuario : </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editUsersName" placeholder="Nombre de Completo" name="editUsersName" autocomplete="off">
							</div>
						</div> <!-- /form-group-->

						<div class="form-group">
							<label for="editUsersNomApe" class="col-sm-4 control-label">Nombre y Apellido : </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editUsersNomApe" placeholder="Nombre y Apellido" name="editUsersNomApe" autocomplete="off">
							</div>
						</div> <!-- /form-group-->

						<div class="form-group">
							<label for="editUsersCedula" class="col-sm-4 control-label">Cédula: </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editUsersCedula" placeholder="Cédula" name="editUsersCedula" autocomplete="off">
							</div>
						</div> <!-- /form-group-->


						<div class="form-group">
							<label for="editUsersEmail" class="col-sm-4 control-label">Email: </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editUsersEmail" placeholder="Email" name="editUsersEmail" autocomplete="off">
							</div>
						</div> <!-- /form-group-->


						<div class="form-group">
							<label for="editUsersTelf" class="col-sm-4 control-label">Teléfono de Casa : </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editUsersTelf" placeholder="Teléfono de Casa" name="editUsersTelf" autocomplete="off">
							</div>
						</div> <!-- /form-group-->


						<div class="form-group">
							<label for="editUsersTelc" class="col-sm-4 control-label">Teléfono de Celular : </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editUsersTelc" placeholder="Teléfono de Celular" name="editUsersTelc" autocomplete="off">
							</div>
						</div> <!-- /form-group-->


						<div class="form-group">
							<label for="editUsersDir" class="col-sm-4 control-label">Dirección : </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editUsersDir" placeholder="Dirección" name="editUsersDir" autocomplete="off">
							</div>
						</div> <!-- /form-group-->


						<div class="form-group">
							<label for="editUsersContra" class="col-sm-4 control-label">Contraseña : </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editUsersContra" placeholder="Contraseña :" name="editUsersContra" autocomplete="off">
							</div>
						</div> <!-- /form-group-->


						<div class="form-group">
							<label for="editUsersStatus" class="col-sm-4 control-label">Estado: </label>

							<div class="col-sm-7">
								<select class="form-control" id="editUsersStatus" name="editUsersStatus">
									<option value="1">Disponible</option>
									<option value="0">No disponible</option>
								</select>
							</div>
						</div> <!-- /form-group-->

					</div>
					<!-- /edit brand result -->

				</div> <!-- /modal-body -->

				<div class="modal-footer editUsersFooter">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>

					<button type="submit" class="btn btn-success" id="editUsersBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
				</div>
				<!-- /modal-footer -->
			</form>
			<!-- /.form -->
		</div>
		<!-- /modal-content -->
	</div>
	<!-- /modal-dailog -->
</div>
<!-- /categories brand -->


<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeUsersModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Eliminar Usuario</h4>
			</div>
			<div class="modal-body">
				<p>¿ Realmente deseas eliminar este registro ?</p>
			</div>
			<div class="modal-footer removeUsersFooter">
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
				<button type="button" class="btn btn-primary" id="removeUsersBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- ------------------------------------------------------------------------- -->

<!-- edit categories brand -->
<div class="modal fade" id="editSocioModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="form-horizontal" id="editSocioForm" action="php_action/editSocio.php" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Editar Asociación</h4>
				</div>
				<div class="modal-body">

					<div id="edit-socioaso-messages"></div>

					<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

					<div class="edit-socioaso-result">

						<div class="form-group">
							<label for="editAsoName" class="col-sm-4 control-label">Cambiar nombre de Asociación : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="editAsoName" placeholder="Nombre de la Asociación" name="editAsoName" autocomplete="off">
							</div>
						</div> <!-- /form-group-->



					</div> <!-- /edit brand result -->

				</div> <!-- /modal-body -->

				<div class="modal-footer editSociosFooter">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>

					<button type="submit" class="btn btn-success" id="editSocioBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
				</div>
				<!-- /modal-footer -->
			</form>
			<!-- /.form -->
		</div>
		<!-- /modal-content -->
	</div>
	<!-- /modal-dailog -->

</div>
<!-- /categories brand -->


<div class="modal fade" id="editLogoModal" tabindex="-1" role="dialog">

	<!------------ NO BORRAR ESTA SECCIÓN , SIN ESTA PARTE NO FUNCIONO LA FOTO---->
	<div class="modal-dialog">
		<div class="modal-content" style="display:none">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Editar Logo</h4>
			</div>
			<div class="modal-body">

				<form class="form-horizontal" id="editLogoForm" action="php_action/editLogo.php" method="POST" enctype="multipart/form-data">


					<div id="edit-logo-messages"></div>

					<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

					<div class="edit-logo-result">

						<div class="form-group">
							<label for="editAsoLogoImg" class="col-sm-4 control-label">Cambiar Logo de Asociación : </label>
							<div class="col-sm-7">
								<input type="file" class="form-control" id="editAsoLogoImg" name="editAsoLogoImg">
							</div>
						</div> <!-- /form-group-->

					</div> <!-- /edit brand result -->
			</div> <!-- /modal-body -->

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>

				<button type="submit" class="btn btn-success" autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
			</div>
			<!-- /modal-footer -->
			</form>
			<!-- /.form -->
		</div>
		<!------------ NO BORRAR ESTA SECCIÓN  ^^^^^^^^^^^ ---->

		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Editar Logo</h4>
				</div>

				<form class="form-horizontal" id="editLogoForm" action="php_action/editLogo.php" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div id="edit-logo-messages"></div>

						<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
							<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
							<span class="sr-only">Cargando...</span>
						</div>

						<div class="edit-logo-result">


							<div class="form-group">
								<div class="col-sm-12">
									<input accept=".jpg,.png,.jpeg" name="editAsoLogoImg" type="file" id="uploadImage" onchange="previewImage();" required>
								</div>
							</div>

							<div class="form-group">

								<div class="col-sm-12">
									<img id="uploadPreview" width="80%" src="../pacto/assests/images/logos/fondo.png" />
								</div>

							</div> <!-- /form-group-->

						</div>

						<div class="modal-footer ">
							<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>

							<button type="submit" class="btn btn-success">Guardar cambios</button>
						</div>
					</div>

			</div>

		</div>
		</form>
	</div>
</div>


<!-- edit categories brand -->
<div class="modal fade" id="addCateModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="form-horizontal" id="createCateForm" action="php_action/createCat.php" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Añadir categoría</h4>
				</div>
				<div class="modal-body">

					<div id="add-categoria-messages"></div>

					<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

					<div class="add-categoria-result">

						<div class="form-group">
							<label for="NOMCAT" class="col-sm-4 control-label">Insertar nombre de Categoría: </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="NOMCAT" placeholder="Nombre de la categoría" name="NOMCAT" autocomplete="off">
							</div>
						</div> <!-- /form-group-->

						<div class="form-group">
							<label for="DESCCAT" class="col-sm-4 control-label">Insertar descripción de Categoría: </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="DESCCAT" placeholder="Descripción de la categoría" name="DESCCAT" autocomplete="off">
							</div>
						</div> <!-- /form-group-->



					</div> <!-- /edit brand result -->

				</div> <!-- /modal-body -->

				<div class="modal-footer createCateFooter">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>

					<button type="submit" class="btn btn-success" id="createCateBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
				</div>
				<!-- /modal-footer -->
			</form>
			<!-- /.form -->
		</div>
		<!-- /modal-content -->
	</div>
	<!-- /modal-dailog -->

</div>
<!-- /categories brand -->

<!-- edit categories brand -->
<div class="modal fade" id="editCateModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="form-horizontal" id="editCateForm" action="php_action/editCategories.php" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Editar Categoría</h4>
				</div>
				<div class="modal-body">

					<div id="edit-cate-messages"></div>

					<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

					<div class="edit-cate-result">

						<div class="form-group">
							<label for="editCatName" class="col-sm-4 control-label">Cambiar nombre de Categoría : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="editCatName" placeholder="Editar Nombre" name="editCatName" autocomplete="off">
							</div>
						</div> <!-- /form-group-->

						<div class="form-group">
							<label for="editCatDesc" class="col-sm-4 control-label">Cambiar nombre de Categoría : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="editCatDesc" placeholder="Editar Descripción" name="editCatDesc" autocomplete="off">
							</div>
						</div> <!-- /form-group-->



					</div> <!-- /edit brand result -->

				</div> <!-- /modal-body -->

				<div class="modal-footer editCateFooter">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>

					<button type="submit" class="btn btn-success" id="editCateBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
				</div>
				<!-- /modal-footer -->
			</form>
			<!-- /.form -->
		</div>
		<!-- /modal-content -->
	</div>
	<!-- /modal-dailog -->

</div>
<!-- /categories brand -->



<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCateModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Eliminar Categoría</h4>
			</div>
			<div class="modal-body">
				<p>¿ Realmente deseas eliminar este registro ?</p>
			</div>
			<div class="modal-footer removeCateFooter">
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
				<button type="button" class="btn btn-primary" id="removeCateBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<script>
	function previewImage() {
		var reader = new FileReader();
		reader.readAsDataURL(document.getElementById('uploadImage').files[0]);
		reader.onload = function(e) {
			document.getElementById('uploadPreview').src = e.target.result;
		};


	}
</script>