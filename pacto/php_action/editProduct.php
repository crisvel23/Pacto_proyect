<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['editProductId'];
	
	$NOMPRODUCT = $_POST['editProductName'];
    $CATEGORIAID = $_POST['editProductCat']; 
    $DESCRIPCIONPRODUCT = $_POST['editProductDesc']; 
    $PRECIOPRODUCT = $_POST['editProductPre']; 
	$STOCKPRODUCT = $_POST['editProductSto'];

				
	$sql = "UPDATE PRODUCTO SET 
	NOMPRODUCT = '$NOMPRODUCT', 
	CATEGORIAID = $CATEGORIAID, 
	DESCRIPCIONPRODUCT = '$DESCRIPCIONPRODUCT', 
	PRECIOPRODUCT = $PRECIOPRODUCT,
	STOCKPRODUCT = $STOCKPRODUCT,


	PVPPRODUCT = ($PRECIOPRODUCT+($PRECIOPRODUCT*0.12)) WHERE  PRODUCTOID =$productId";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
