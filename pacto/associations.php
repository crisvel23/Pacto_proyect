<?php 
		session_start();
		$aux= $_SESSION['userRol'];
		if($aux!=1){
			header('location: index.php');
		}
	

?>

<?php require_once 'includes/header.php'; ?>
<?php require ('modal/associationsModal.php'); ?>

<div class="row">
	<div class="col-mx-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Inicio</a></li>		  
		  <li class="active">Asociaciones</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de Asociaciones</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addAssociationsModalBtn" data-target="#addAssociationsModal"> <i class="fas fa-plus"></i> Agregar Asociaciones </button>
				</div> <!-- /div-action -->				
				
				<table class="table table-striped" id="manageAssociationsTable">
					<thead>
						<tr>							
							<th>Asociacion</th>
							<th>Sector</th>
                            <th>Barrio</th>
							<th>Parroquia</th>
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





<script src="custom/js/associations.js"></script>

<?php require_once 'includes/footer.php'; ?>