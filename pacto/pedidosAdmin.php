<?php 
			session_start();
			$aux= $_SESSION['userRol'];
			if($aux!=2){
					header('location: index.php');

			}
?>
<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/SocioHeader.php'; ?>




<div class="row">
	<div class="col-mx-12">

		<ol class="breadcrumb">
		  <li><a href="asodashboard.php">Inicio</a></li>		  
		  <li class="active">Pedidos</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading" > <i class="glyphicon glyphicon-edit"></i> Listado de pedidos </div>

			

				
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>	  		
				
				<table class="table  table-striped" id="managepedidosAdminTable">
					<thead>
						<tr>						
							<th>Nombre y Apellido</th>
							<th>Fecha Pedido</th>							
							<!-- <th>Estado Pedido</th> -->
							<th>Acciones</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->






 <script src="custom/js/pedidosAdmin.js"></script> 

<?php require_once 'includes/footer.php'; ?>