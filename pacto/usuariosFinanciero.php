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
			<li class="active">Financiero</li>
		</ol>

		<div class="panel  panel-default">
			   <div class="panel-heading">

				  <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Sistema Caja de Ahorros</div>
			   </div> <!-- /panel-heading -->

			<div class="panel-body">

				  <div class="remove-messages"></div>


				  <div class="div-action pull pull-right" style="padding-bottom:20px; padding-left:20px; ">
					<button class="btn btn-default button1" data-toggle="modal" id="addUsersModalBtn" data-target="#addUsersModal"> <i class="fas fa-users"></i> Agregar Socios </button>
				  </div> <!-- /div-action -->


				  <div class="div-action pull pull-right" style="padding-bottom:20px; padding-left:20px; ">
					<button class="btn btn-default button1" > <a href="aportacionesFinanciero.php">  <i class="fas fa-credit-card"></i> Aportes (socios)</a>
				  </div> <!-- /div-action -->



				  <div class="div-action pull pull-right" style="padding-bottom:20px; padding-left:20px; ">
					<button class="btn btn-default button1" > <a href="prestamosFinanciero.php"> <i class="fas fa-money-bill-alt"></i> Préstamos (socios)</a>
				  </div> <!-- /div-action -->

				  <div class="div-action pull pull-right" style="padding-bottom:20px; padding-left:20px; ">
					<button class="btn btn-default button1" > <a href="contabilidadFinanciero.php"> <i class="fas fa-money-bill-alt"></i> Contabilidad (socios)</a>
				  </div> <!-- /div-action -->

				  <table class="table  table-striped" id="manageUsersSocioTable">
                      <h3>Socios Registrados </h3>
					  <thead>
                        
						<tr>
							<th>Nombre y Apellido</th>
							<th>Cédula</th>
							<th>Usuario</th>
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


	</div> <!-- /col-md-12 -->
</div> <!-- /row -->  




<script src="custom/js/usersSocio.js"></script>

<?php require_once 'includes/footer.php'; ?>