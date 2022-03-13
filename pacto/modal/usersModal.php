<!-- add users -->
<div class="modal fade" id="addUsersModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="form-horizontal" id="submitUsersForm" action="php_action/createUsers.php" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Agregar usuarios</h4>
				</div>
				<div class="modal-body">


					<div id="add-users-messages"></div>

					<div class="form-group">
						<label for="NOMBREUSU" class="col-sm-4 control-label">Nombre de Usuario : </label>

						<div class="col-sm-7">
							<input type="text" class="form-control" id="NOMBREUSU" placeholder="Introduce nombre de Usuario" name="NOMBREUSU" autocomplete="off">
						</div>
					</div> <!-- /form-group-->


					<div class="form-group">
						<label for="CEDULAUSU" class="col-sm-4 control-label">Cédula de Usuario : </label>

						<div class="col-sm-7">
							<input type="text" class="form-control" id="CEDULAUSU" placeholder="Introduce cédula de Usuario" name="CEDULAUSU" autocomplete="off">
						</div>
					</div> <!-- /form-group-->


					<!--  -------------------------------------------------------------------------------------------------------- -->


					<div class="form-group">
						<label for="ASOSIACIONID" class="col-sm-4 control-label">Asociaciones : </label>
						<div class="col-sm-7">
							<select name="ASOSIACIONID" id="ASOSIACIONID" class="form-control">
								<option value="">-- Selecciona --</option>
								<?php $query = mysqli_query($connect, "SELECT NOMBREASO,ASOCIACIONID FROM ASOCIACION"); ?>
								<?php

								while ($asociacion = mysqli_fetch_array($query)) { ?>

									<option value='<?php echo $asociacion['ASOCIACIONID']; ?>'> <?php echo $asociacion['NOMBREASO']; ?></option><br>
								<?php

								}
								$connect->close();
								?>
							</select>
						</div>
					</div> <!-- /form-group-->


					<!--  -------------------------------------------------------------------------------------------------------- -->


					<div class="form-group">
						<label for="ROLID" class="col-sm-4 control-label">Rol : </label>

						<div class="col-sm-7">
							<select class="form-control" id="ROLID" name="ROLID">
								<option value="">-- Selecciona --</option>
								<option value="1">SUPER_ROLE</option>
								<option value="2">ADMIN_ROLE</option>
								<option value="3">CLIENTE_ROLE</option>
								<option value="4">SOCIO_ROLE</option>

							</select>
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

					<div class="form-group">
						<label for="NOMBREAPEUSU" class="col-sm-4 control-label">Nombre y Apellido : </label>

						<div class="col-sm-7">
							<input type="text" class="form-control" id="NOMBREAPEUSU" placeholder="Introduce nombre y apellido" name="NOMBREAPEUSU" autocomplete="off">
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

			<form class="form-horizontal" id="editUsersForm" action="php_action/editUsers.php" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Editar Usuarios</h4>
				</div>
				<div class="modal-body">

					<div id="edit-users-messages"></div>

					<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

					<div class="edit-users-result">
						<div class="form-group">
							<label for="editUsersName" class="col-sm-4 control-label">Nombre de Usuario : </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editUsersName" placeholder="Nombre de Usuario" name="editUsersName" autocomplete="off">
							</div>
						</div> <!-- /form-group-->

						<div class="form-group">
							<label for="editUsersRol" class="col-sm-4 control-label">Estado: </label>

							<div class="col-sm-7">
								<select class="form-control" id="editUsersRol" name="editUsersRol">
									<option value="">-- Selecciona --</option>
									<option value="1">SUPER_ROLE</option>
									<option value="2">ADMIN_ROLE</option>
									<option value="3">CLIENTE_ROLE</option>
									<option value="4">SOCIO_ROLE</option>
								</select>
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
							<label for="editUsersNomApe" class="col-sm-4 control-label">Nombre y Apellido : </label>

							<div class="col-sm-7">
								<input type="text" class="form-control" id="editUsersNomApe" placeholder="Nombre y Apellido" name="editUsersNomApe" autocomplete="off">
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