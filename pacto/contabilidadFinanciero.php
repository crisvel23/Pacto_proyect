<?php
session_start();

$aux = $_SESSION['userRol'];

$aux2 = $_SESSION['asoId'];


if ($aux != 1) {
	if ($aux != 2) {
		header('location: index.php');
	}
}

?>


<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/SocioHeader.php'; ?>
<?php require('modal/usersSocioModal.php'); ?>

<div class="row">

	<div class="col-mx-12">

		   <ol class="breadcrumb">
			 <li><a href="asodashboard.php">Inicio</a></li>
			 <li class="active">Financiero</li>
		   </ol>

        <div class="panel  panel-default">
		        <div class="panel-heading">

		          <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Contabilidad de los Socios</div>
			    </div> 

		</div> <!-- /panel -->












    </div> <!-- /col-md-12 -->
</div> <!-- /row -->



<script src="custom/js/usersSocio.js"></script>

<?php require_once 'includes/footer.php'; ?>