<?php require_once 'includes/Socioheader.php'; ?>
<?php include('modal/capacitacionesModal.php');?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="asodashboard.php">Inicio</a></li>		  
		  <li class="active">Capacitaciones</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de Capacitaciones</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>
				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<a href="matricula.php">
						<button class="btn btn-default button1" data-toggle="modal" data-target="#addBrandModel"><i class="fas fa-pen-square"></i> Inscripciones </button>
					</a>
					<a href="entidades.php">
						<button class="btn btn-default button1" data-toggle="modal" data-target="#addBrandModel">Entidades</button>
					</a>
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addBrandModel"><i class="glyphicon glyphicon-plus-sign"></i> Agregar Capacitacion</button>
					
				</div> <!-- /div-action -->				
				
				<table class="table  table-striped" id="manageBrandTable">
                    <thead>
                        <tr>
                            <th>Tema</th>
                            <th>Capacitador/es</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Hora Inicio</th>
                            <th>Hora Hora Fin</th>
                            <th>Entidad</th>
                            <th>Total Horas</th>
                            <th>Acta</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                   
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->




<script src="custom/js/capacitaciones.js"></script>

<?php require_once 'includes/footer.php'; ?>