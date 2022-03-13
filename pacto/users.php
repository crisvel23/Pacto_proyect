 <?php 	
		session_start();
		$aux= $_SESSION['userRol'];
		if($aux!=1){
				header('location: index.php');
		}

?>

<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<?php require ('modal/usersModal.php'); ?>

<div class="row">
	<div class="col-mx-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Inicio</a></li>		  
		  <li class="active">Usuarios</li>
		</ol>

		<div class="panel  panel-default">
			<div class="panel-heading" >
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de usuarios</div>
			</div> <!-- /panel-heading -->
			
			<div class="panel-body">

				<div class="remove-messages"></div>
				
			
				<div class="div-action pull pull-right" style="padding-bottom:20px; ">
					<button class="btn btn-default button1" data-toggle="modal" id="addUsersModalBtn" data-target="#addUsersModal" > <i class="fas fa-plus"></i> Agregar Usuarios </button>
				</div> <!-- /div-action -->		
						

				<table class="table table-striped" id="manageUsersTable">
					<thead >
						<tr>							
							<th>Usuario</th>
							<th>Rol(Id)</th>
							<th>Rol</th>
                            <th>Email</th>
							<th>Teléfono</th>
                            <th>Celular</th>
							<th>Contraseña</th>
                            <th>Dirección</th>
                            <th>Nombre</th>
                            <th>Cédula</th>
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






<script src="custom/js/users.js"></script>

<?php require_once 'includes/footer.php'; ?>