<?php
session_start();
$aux = $_SESSION['userRol'];

if ($aux != 3) {

    header('location: index.php');
}

?>
<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/headerSocio.php'; ?>
<?php require_once 'modal/productModal.php'; ?>


<div class="row">
	<div class="col-mx-12">

		<ol class="breadcrumb">
			<li><a href="socdashboard.php">Inicio</a></li>
			<li class="active">Hojas de Campo</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Semana de Trabajo</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">



				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<a class="btn btn-default button1" href="php_action/crearHoja.php"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar Hoja de Campo </a>
				</div> <!-- /div-action -->

				<table class="table  table-striped" id="manageHojaTable">
					<thead>
						<tr>
							<th>Hoja de Campo(ID)</th>
							<th># Semana</th>
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






<script src="custom/js/hoja.js"></script>

<?php require_once 'includes/footer.php'; ?>