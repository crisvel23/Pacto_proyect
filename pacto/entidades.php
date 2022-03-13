<?php require_once 'includes/Socioheader.php'; ?>
<?php include('modal/entidadesModal.php');?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Inicio</a></li>		  
		  <li class="active">Entidades</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de Entidades</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <a href="capacitaciones.php">
                        <button class="btn btn-default button1"><i class="fas fa-arrow-circle-left"></i> Regresar</button>
                    </a>
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addBrandModel"><i class="glyphicon glyphicon-plus-sign"></i> Agregar Entidades</button>
				</div> <!-- /div-action -->				
				
				<table class="table  table-striped" id="manageBrandTable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Pais</th>
                            <th>Ciudad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                   
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->




<script src="custom/js/entidades.js"></script>

<?php require_once 'includes/footer.php'; ?>