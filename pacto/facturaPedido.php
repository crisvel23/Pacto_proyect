<?php
session_start();
$aux = $_SESSION['userRol'];
if ($aux != 2) {
	header('location: index.php');
}
?>
<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/SocioHeader.php'; ?>

<?php

$ASOID = $_SESSION['asoId'];
$DETALLEID = $_POST['detallefactura'];

$sql = "SELECT 
	DETALLEFACTURA.PEDIDOSID AS PEDIDOID, 
	USUARIO.NOMBREAPEUSU AS NOMBREAPEUSU,
	USUARIO.CEDULAUSU AS CEDULAUSU,
	USUARIO.TELCUSU AS TELCUSU,
	USUARIO.TELCELUSU AS TELCELUSU,
	USUARIO.EMAILUSU AS EMAILUSU,
	USUARIO.DIRUSU AS DIRUSU,
	PRODUCTO.NOMPRODUCT AS NOMPRODUCT,
	DETALLEFACTURA.CANTIDAD AS CANTIDAD,
	PRODUCTO.PRECIOPRODUCT AS PRECIOPRODUCT, 
	PRODUCTO.PVPPRODUCT AS PVPPRODUCT,
	PEDIDOS.FECHAPEDIDO AS FECHAPEDIDO,
	ESTADOPEDIDO.NOMBREESPE AS NOMBREESPE,
	UNIDADES.NOMUNIDADES AS UNIDADES
	FROM DETALLEFACTURA, PEDIDOS, PRODUCTO, ASOCIACION, PERTENECEN, USUARIO ,ESTADOPEDIDO,UNIDADES
	WHERE DETALLEFACTURA.PEDIDOSID = PEDIDOS.PEDIDOSID  
	AND DETALLEFACTURA.PRODUCTOID = PRODUCTO.PRODUCTOID 
	AND PRODUCTO.ASOCIACIONID = ASOCIACION.ASOCIACIONID 
	AND PEDIDOS.USUARIOID = USUARIO.USUARIOID 
	AND PEDIDOS.ESTADOPEDIDOID=ESTADOPEDIDO.ESTADOPEDIDOID
	AND UNIDADES.UNIDADESID=PRODUCTO.UNIDADESID
	AND PRODUCTO.ASOCIACIONID = $ASOID
	AND PEDIDOS.STATUSPEDIDO = 1
	AND DETALLEFACTURA.PEDIDOSID=$DETALLEID
	GROUP BY PRODUCTO.PRODUCTOID";
$r = mysqli_query($connect, $sql) or die("Error al leer detalle ");


?>

<style>
	.datospedido {
		display: flex;
		justify-content: space-around;
	}

	.datospedido .page-header {
		padding-right: 20px;
	}
</style>


<div class="row">
	<div class="col-mx-12">

		<ol class="breadcrumb">
			<li><a href="dashboard.php">Inicio</a></li>
			<li class="active">Detalle</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de Detalle </div>


			</div> <!-- /panel-heading -->
			<div class="panel-body">


				<table class="table">
					<thead>
						<tr>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Unidades</th>
							<th>Precio</th>
							<th>PVP</th>

						</tr>
					</thead>
					<tbody>

						<?php

						while ($fila = $r->fetch_assoc()) {
							$NOMBREAPEUSU = $fila['NOMBREAPEUSU'];
							$TELCUSU = $fila['TELCUSU'];
							$TELCELUSU = $fila['TELCELUSU'];
							$EMAILUSU = $fila['EMAILUSU'];
							$DIRUSU = $fila['DIRUSU'];
							$FECHAPEDIDO = $fila['FECHAPEDIDO'];
							$CEDULAUSU = $fila['CEDULAUSU'];
							$LOGOASO = $fila['LOGOASO'];
							$PEDIDOSID = $fila['PEDIDOID'];
							$NOMPRODUCT = $fila['NOMPRODUCT'];
							$CANTIDAD = $fila['CANTIDAD'];
							$PVPPRODUCT = $fila['PVPPRODUCT'];
							$PRECIOPRODUCT = $fila['PRECIOPRODUCT'];
							$UNIDADES = $fila['UNIDADES'];

						?>
							<tr>
								<td><?php echo $NOMPRODUCT; ?></td>
								<td><?php echo $CANTIDAD; ?></td>
								<td><?php echo $UNIDADES; ?></td>
								<td><?php echo $PRECIOPRODUCT; ?></td>
								<td><?php echo $PVPPRODUCT; ?></td>

							</tr>
						<?php
						}
						?>

						<div class="datospedido">

							<div class="page-header">
								<h5 style="font-weight:bold">NOMBRE</h5>
								<p><?php echo $NOMBREAPEUSU; ?></p>
							</div>
							<div class="page-header">
								<h5 style="font-weight:bold">CÉDULA</h5>
								<p><?php echo $CEDULAUSU; ?></p>
							</div>
							<div class="page-header">
								<h5 style="font-weight:bold">TELÉFONO</h5>
								<p><?php echo $TELCUSU; ?></p>
							</div>
							<div class="page-header">
								<h5 style="font-weight:bold">CELULAR</h5>
								<p><?php echo $TELCELUSU; ?></p>
							</div>
							<div class="page-header">
								<h5 style="font-weight:bold">EMAIL</h5>
								<p><?php echo $EMAILUSU; ?></p>
							</div>
							<div class="page-header">
								<h5 style="font-weight:bold">DIRECCIÓN</h5>
								<p><?php echo $DIRUSU; ?></p>
							</div>
							<div class="page-header">
								<h5 style="font-weight:bold">FECHA</h5>
								<p><?php echo $FECHAPEDIDO; ?></p>
							</div>

						</div>

					</tbody>
				</table>
				<!-- /table -->

				<pre><h5>Editar</h5></pre>

				<form method="POST" action="factura.php">
					<?php
					$asociacion_id = $_SESSION['asoId'];
					$usuario_id = $_SESSION['userId'];

					$Sql = "SELECT * FROM ASOCIACION WHERE ASOCIACIONID=$asociacion_id ";
					$r = mysqli_query($connect, $Sql) or die("Error");
					mysqli_num_rows($r);
					while ($fila = mysqli_fetch_object($r)) {
						$ASONOM = $fila->NOMBREASO;
						$RUTA = $fila->LOGOASO;
						$SECTORASO = $fila->SECTORASO;
						$BARRIOASO = $fila->BARRIOASO;
						$PARROQUIAASO = $fila->PARROQUIAASO;
					} ?>

					<input type="text" value="<?php echo $RUTA ?>" style="display:none" name="LOGOASO">
					<input type="text" value="<?php echo $PEDIDOSID ?>" name="PEDIDOSID" style="display:none">
					<input type="text" value="<?php echo $DETALLEID ?>" name="DETALLEID" style="display:none">
					<input type="text" value="<?php echo $UNIDADES ?>" name="UNIDADES" style="display:none">
					<input class="form-control" type="text" value="<?php echo $ASONOM ?> " name="ASONOM" style="display:none">
					

					<div class="container" style="display: flex;justify-content:center">

						<div class="col1" style="padding-right: 30%; ">
							<label for="">Nombre y apellido: </label><input class="form-control" type="text" value="<?php echo $NOMBREAPEUSU ?>" name="NOMBREAPEUSU">
							<label for="">Cedula: </label><input class="form-control" type="text" value="<?php echo $CEDULAUSU ?>" name="CEDULAUSU">
							<label for="">Teléfono: </label><input class="form-control" type="text" value="<?php echo $TELCUSU ?>" name="TELCUSU">
							<label for="">Dirección: </label><input class="form-control" type="text" value="<?php echo $DIRUSU ?>" name="DIRUSU">
							<label for="">Fecha Pedido: </label><input class="form-control" type="text" value="<?php echo $FECHAPEDIDO ?>" name="FECHAPEDIDO">


						</div>

						<div class="col2" style="padding-right: 10px;  ">
							<label for="">Teléfono: </label><input class="form-control" type="text" value="<?php echo $TELCELUSU ?>" name="TELCELUSU">
							<label for="">Email: </label><input class="form-control" type="text" value="<?php echo $EMAILUSU ?>" name="EMAILUSU">
							<label for="">Parroquia: </label><input class="form-control" type="text" value="<?php echo $PARROQUIAASO ?>" name="PARROQUIAASO">
							<label for="">Sector: </label><input class="form-control" type="text" value="<?php echo $SECTORASO ?>" name="SECTORASO">
							<label for="">Barrio: </label><input class="form-control" type="text" value="<?php echo $BARRIOASO ?>" name="BARRIOASO">

						</div>

					</div>

					<div style="padding-top: 10px; padding-left: 10% " class=" col-md-offset-9"><button formtarget="_blank" type="submit" class="btn btn-primary float-left"><i class="fas fa-file-invoice"></i> Generar Factura</button> </div>


				</form>
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- <script src="custom/js/facturaAdmin.js"></script> -->



<?php require_once 'includes/footer.php'; ?>