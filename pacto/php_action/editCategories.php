<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

    $NOMCAT = $_POST['editCatName'];
    $DESCCAT = $_POST['editCatDesc']; 
    $catId = $_POST['editCateId']; 

	$sql = "UPDATE CATEGORIAPRODUCTO SET NOMCAT = '$NOMCAT',DESCCAT =  '$DESCCAT' WHERE CATEGORIAID =  $catId ";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST