<?php

require_once 'core.php';
$aso_Id = $_SESSION['asoId'];

$sql = "SELECT 
PRODUCTOID,
UNIDADES.UNIDADESID,

NOMPRODUCT,
UNIDADES.NOMUNIDADES,
CATEGORIAPRODUCTO.NOMCAT, 
DESCRIPCIONPRODUCT, 
PRECIOPRODUCT, 
PVPPRODUCT,
STOCKPRODUCT,
STATUSPRODUCT
FROM PRODUCTO,CATEGORIAPRODUCTO,ASOCIACION,UNIDADES
WHERE PRODUCTO.CATEGORIAID = CATEGORIAPRODUCTO.CATEGORIAID 
AND UNIDADES.UNIDADESID=PRODUCTO.UNIDADESID
AND ASOCIACION.ASOCIACIONID = $aso_Id";

$result = $connect->query($sql);

$output = array('data' => array());

if ($result->num_rows > 0) {

	// $row = $result->fetch_array();
	$activeProduct = "";
	$activeBodega = "";

	while ($row = $result->fetch_array()) {
		$productId = $row[0];
		// active 


		if ($row[9] ==1 ) {
			// activate member

			$activeBodega = "<label class='label label-success'>En Tienda</label>";
		} else {
			// deactivate member
			$activeBodega = "<label class='label label-danger'>En Bodega</label>";
		} // /else

		if ($row[8] > 0) {
			// activate member
			$activeProduct = "<label class='label label-success'>Disponible</label>";

		} else {
			// deactivate member
			$activeProduct = "<label class='label label-danger'>No disponible</label>";
		
		} // /else

		$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct(' . $productId . ')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct(' . $productId . ')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
		<li><a type="button" data-toggle="modal" data-target="#añadirProductModal" id="añadirProductModalBtn" onclick="addTienda(' . $productId . ')"> <i class="fas fa-plus"></i> Añadir a la tienda</a></li>       

	  </ul>
	</div>';

		$output['data'][] = array(
		
			$row[2],
			$row[3],
			$row[4],
			$row[5],
			$row[6],
			$row[7],
			$row[8],

			$activeBodega,
			$activeProduct,
			$button
		);
	} // /while 

} // if num_rows

$connect->close();

echo json_encode($output);
