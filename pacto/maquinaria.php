
<?php require_once 'includes/SocioHeader.php'; ?>
<?php require_once 'modal/MaquinariaModal.php'; ?>

<div class="row">
	<div class="col-mx-12">
		<ol class="breadcrumb">
		  <li><a href="asodashboard.php">Inicio</a></li>		  
		  <li class="active">Maquinaria</li>
		</ol>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de Maquinaria</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<div class="remove-messages"></div>
				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addMaqModalBtn" data-target="#addMaqModal"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar Maquinaria </button>
				</div> <!-- /div-action -->				
				
				<table class="table  table-striped" id="manageMaqTable">
					<thead>
						<tr>
							<th>Nombre Entidad</th>	
							<th>Placa</th>						
							<th>Nombre</th>
							<th>Estado</th>
							<th>Marca</th>
							<th>Kilometraje</th>
							<th>Origen</th>
							<th>Capacidad</th>
							<th style="width:15%;">Opciones</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<script src="custom/js/Maquinaria.js"></script>

<?php require_once 'includes/footer.php'; ?>