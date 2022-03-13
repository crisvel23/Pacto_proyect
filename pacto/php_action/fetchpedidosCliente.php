<?php

require_once 'core.php';


$sql = "SELECT 
PRODUCTOID,
ASOCIACION.NOMBREASO,
NOMPRODUCT,
CATEGORIAPRODUCTO.NOMCAT, 
DESCRIPCIONPRODUCT, 
PRECIOPRODUCT, 
PVPPRODUCT,
STOCKPRODUCT,
UNIDADES.NOMUNIDADES,
STATUSPRODUCT
FROM PRODUCTO,CATEGORIAPRODUCTO, ASOCIACION, UNIDADES
WHERE PRODUCTO.CATEGORIAID = CATEGORIAPRODUCTO.CATEGORIAID 
AND ASOCIACION.ASOCIACIONID=PRODUCTO.ASOCIACIONID
AND UNIDADES.UNIDADESID= PRODUCTO.UNIDADESID
AND PRODUCTO.STATUSPRODUCT=1";

$result = $connect->query($sql);

$output = array('data' => array());

if ($result->num_rows > 0) {

	// $row = $result->fetch_array();
	$activeProduct = "";


	while ($row = $result->fetch_array()) {
		$productId = $row[0];
		$pvp = $row[6];
		$pedido = '  
	 <style type="text/css">
		
		.inputcentrado {
			text-align: center
			}
		
		.espaciador {
			padding-bottom: 3px;
		}

	</style>

	<form class="form-horizontal" id="editclientePedidoForm" action="php_action/detallePedido.php" method="POST">

		<div class="row" >

			<div class="col-ms-12" >
				<input type="hidden" value="' . $productId . '" class="form-control" name="idProducto" id="idProducto" > 
				<input type="hidden" value="' . $pvp . '" class="form-control" name="idPVP" id="idPVP" > 
				<div class="espaciador">
					<input type="number" class="form-control inputcentrado" min="1" name="cantidadProducto" id="cantidadProducto" value="1" > 
				</div>
		
				<button class="btn btn-default " onclick="ejecutaAlerta()"> <i class="fas fa-plus"></i> Añadir al pedido</button>
			</div>

			
		</div>
		
	</form>	

	<script>
		function ejecutaAlerta(){
			alert ("Producto Añadido");
		}
	</script>
    ';


		$output['data'][] = array(
			$row[1],
			$row[2],
			$row[3],
			$row[4],
			$row[5],
			$row[6],
			$row[8],
			$pedido
		);
	} // /while 

} // if num_rows

$connect->close();

echo json_encode($output);
