<?php 
			session_start();
			$aux= $_SESSION['userRol'];
			if($aux!=4){
					header('location: index.php');

			}
	
?>

<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/headerCliente.php'; ?>
<?php require_once 'modal/productModal.php'; ?>

<div class="row">
	<div class="col-mx-12">

		<ol class="breadcrumb">
		  <li><a href="clidashboard.php">Inicio</a></li>		  
		  <li class="active">Productos</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading" > <i class="glyphicon glyphicon-edit"></i> Listado de Productos </div>
				<div class=" col-md-offset-10"><a href="carrito.php" type="button" class="btn btn-primary float-left"><i class="fas fa-shopping-cart"></i> Confirmar Pedido</a> </div>
			
				
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>	  		
				
				<table class="table  table-striped" id="managepedidosClienteTable">
					<thead>
						<tr>						
							<th>Asociación</th>		
							<th>Producto</th>
							<th>Categoría</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th>PVP</th>
							<th>Unidad</th>
							<th style="width:16%;">Cantidad</th>
							
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->






<script src="custom/js/pedidosCliente.js"></script>

<?php require_once 'includes/footer.php'; ?>