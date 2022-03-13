
<?php require_once 'includes/header.php'; ?>
<?php require ('modal/directivasModal.php'); ?>

<div class="row">
	<div class="col-mx-12 ">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Inicio</a></li>		  
		  <li class="active">Directivas</li>
		</ol>

		<div class="panel  panel-default">
			<div class="panel-heading" >
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de Directivas</div>
			</div> <!-- /panel-heading -->
			
			<div class="panel-body">

				<div class="remove-messages"></div>
				
			
				<div class="div-action pull pull-right" style="padding-bottom:20px; ">
					<button class="btn btn-default button1" data-toggle="modal" id="addDirectivasModalBtn" data-target="#addDirectivasModal" > <i class="fas fa-plus"></i> Agregar Directiva </button>
				</div> <!-- /div-action -->		
						

				<table class="table table-striped" id="manageDirectivasTable">
					<thead  class="thead-dark">
						<tr>							
							<th>Nombre</th>
							<th>Asociación</th>
							<th>Cargo</th>
                            <th>Período</th>
							<th style="width:15%;">Opciones</th>
							
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->





<script src="custom/js/directivas.js"></script>

<?php require_once 'includes/footer.php'; ?>