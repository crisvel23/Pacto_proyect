
<?php require_once 'includes/SocioHeader.php'; ?>
<?php require_once 'modal/mantemodal.php'; ?>

<div class="row">
	<div class="col-mx-12">
		<ol class="breadcrumb">
		  <li><a href="asodashboard.php">Inicio</a></li>		  
		  <li class="active">Mantenimiento Maquinaria</li>
		  <li>
		  <?php $manid=$_GET["manid"];?>
		  <?php $query=mysqli_query($connect,"SELECT NOMBREMAQ FROM MAQUINARIASOCIO WHERE MAQUINARIAID=$manid");?> <?php 
						while ($entidad = mysqli_fetch_array($query)){ ?>
							<?php echo $entidad['NOMBREMAQ'];
						}
						?>
		</li>
		</ol>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Mantenimientos</div>
			</div> <!-- /panel-heading -->
			
			<div class="panel-body">
				<div class="remove-messages"></div>
				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addMaqModalBtn" data-target="#addMaqModal"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar Mantenimiento </button>
				</div> <!-- /div-action -->				

				<table class="table  table-striped" id="manageMaqTable">
					<thead>
						<tr>
							
							<th>Tipo Mantenimiento</th>						
							<th>Fecha de Mantenimiento</th>							
							<th>Descripción</th>
							<th>Costo $(USD)</th>
							<th>Proximo Mantenimiento</th>
							<th style="width:15%;">Opciones</th>
							
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<script>const prueba='<?php echo $manid;?>' </script>
<script src="custom/js/mantenimiento.js"></script>

<?php require_once 'includes/footer.php'; ?>
