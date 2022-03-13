<?php 
			session_start();
			$aux= $_SESSION['userRol'];
			if($aux!=4){
			
					header('location: index.php');
	
			}
	
?>
<?php require_once 'includes/headerCliente.php'; ?>
<?php require ('modal/carritoModal.php'); ?>

<div class="row">
	<div class="col-mx-12">

		<ol class="breadcrumb">
		  <li><a href="clidashboard.php">Inicio</a></li>		  
		  <li class="active">Usuarios</li>
		</ol>

		<div class="panel  panel-default">
			<div class="panel-heading" >
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de Productos</div>
				<div class=" col-md-offset-10"><a href="php_action/finalizarpedido.php" type="button" class="btn btn-primary float-left"><i class="fas fa-check"></i> Enviar Pedido</a> </div>

			</div> <!-- /panel-heading -->
			
			<div class="panel-body">

				<div class="remove-messages"></div>
					
				<table class="table  table-striped" id="manageCarritoTable">
					<thead >
						<tr>							
							<th>Producto</th>
							<th>Precio</th>
                            <th>PVP</th>
                            <th>Cantidad</th>
                            <th>Total</th>
							<th style="width:15%;">Eliminar del Pedido</th>
							
				
						</tr>
					</thead>
					<tbody></tbody>
					<tfoot>
						<tr style=" display:flex; justify-content:flex-end; padding-right:22%"  >
							
							<th style=" max-width:100%;">Total:</th>
							<th style=" max-width: 100%;"></th>
							<th style=" max-width: 100%;"></th>	
							<th style=" max-width: 50%;"></th>	
							
							
													
						</tr>
					</tfoot>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->






<script src="custom/js/carrito.js"></script>

<?php require_once 'includes/footer.php'; ?>