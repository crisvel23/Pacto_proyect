<?php
session_start();

$aux = $_SESSION['userRol'];

$aux2 = $_SESSION['asoId'];


if ($aux != 1) {
	if ($aux != 2) {
		header('location: index.php');
	}
}

?>


<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/SocioHeader.php'; ?>
<?php require('modal/usersSocioModal.php'); ?>

<div class="row">

	<div class="col-mx-12">

		<ol class="breadcrumb">
			<li><a href="asodashboard.php">Inicio</a></li>
			<li class="active">Administración</li>
		</ol>

		<div class="panel  panel-default">
			<div class="panel-heading">

				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de Socios</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">

				<div class="remove-messages"></div>


				<div class="div-action pull pull-right" style="padding-bottom:20px; padding-left:20px; ">
					<button class="btn btn-default button1" data-toggle="modal" id="addUsersModalBtn" data-target="#addUsersModal"> <i class="fas fa-plus"></i> Agregar Socios </button>
				</div> <!-- /div-action -->


				<div class="div-action pull pull-right" style="padding-bottom:20px; padding-left:20px;">
					<a class="btn btn-default button1" type="button" data-toggle="modal" id="editSocioModalBtn" data-target="#editSocioModal" onclick="editAsociacion(<?php echo $aux2; ?>)"> <i class="fas fa-tools"></i> Cambiar nombre asociación</a>
				</div> <!-- /div-action -->



				<div class="div-action pull pull-right" style="padding-bottom:20px;  ">
					<a class="btn btn-default button1" type="button" data-toggle="modal" id="editLogoModalBtn" data-target="#editLogoModal" onclick="editLogo(<?php echo $aux2; ?>)"> <i class="fas fa-image"></i> Cambiar logo asociación</a>
				</div> <!-- /div-action -->



				<table class="table  table-striped" id="manageUsersSocioTable">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Cédula</th>
							<th>Nombre Usuario</th>
							<th>Email</th>
							<th>Teléfono</th>
							<th>Celular</th>
							<th>Dirección</th>
							<th>Status</th>

							<th style="width:15%;">Opciones</th>

						</tr>
					</thead>
				</table>


				<!-- /table -->

			</div> <!-- /panel-body -->


		</div> <!-- /panel -->

		<div class="panel  panel-default">
			<div class="panel-heading">

				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de Categorías</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">

				<div class="remove-messages"></div>
				<div class="div-action pull pull-right" style="padding-bottom:20px; padding-left:20px;">
					<a class="btn btn-default button1" type="button" data-toggle="modal" id="cateModalBtn" data-target="#addCateModal"> <i class="fas fa-plus"></i> Agregar Categorías</a>
				</div> <!-- /div-action -->


				<div class="table2">

					<table class="table" id="manageCatTable" style="width:min-content; height:50px">
						<thead>
							<tr>
								<th>ID</th>
								<th>Categoría</th>
								<th>Descripción</th>
								<th style="width:15%;">Opciones</th>

							</tr>
						</thead>
					</table>

				</div>
			</div>
		</div> <!-- /col-md-12 -->

	</div> <!-- /col-md-12 -->
</div> <!-- /row -->






<script src="custom/js/usersSocio.js"></script>

<?php require_once 'includes/footer.php'; ?>