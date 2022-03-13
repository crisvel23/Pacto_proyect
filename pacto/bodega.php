<?php
session_start();
$aux = $_SESSION['userRol'];

if ($aux != 2) {
	if ($aux != 3) {
		header('location: index.php');
	}
}

?>
<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/SocioHeader.php'; ?>
<?php require_once 'modal/bodegaModal.php'; ?>


<div class="row">
	<div class="col-mx-12">

		<ol class="breadcrumb">
			<li><a href="asodashboard.php">Inicio</a></li>
			<li class="active">Bodega</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Bodega</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">



				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addBodegaModalBtn" data-target="#addBodegaModal"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar Entrega </button>
				</div> <!-- /div-action -->

				<table class="table  table-striped" id="manageBodegaTable">
					<thead>
						<tr>
							<th>Nombre Socio</th>
							<th>Fecha</th>
							<th style="width:15%;">Opciones</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->




<script src="custom/js/bodega.js"></script>

<?php require_once 'includes/footer.php'; ?>