<?php require_once 'includes/Socioheader.php'; ?>
<?php include('modal/matriculaModal.php');?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Inicio</a></li>		  
		  <li class="active">Usuarios Inscritos</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Inscribir </div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <a href="capacitaciones.php">
                        <button class="btn btn-default button1"><i class="fas fa-arrow-circle-left"></i> Regresar</button>
                    </a>
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addBrandModel"><i class="glyphicon glyphicon-plus-sign"></i> Inscribir Usuario </button>
				</div> <!-- /div-action -->				
				
				<table class="table  table-striped" id="manageBrandTable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>CI</th>
                            <th>Capacitacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                   
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->




<script src="custom/js/matricula.js"></script>

<?php require_once 'includes/footer.php'; ?>