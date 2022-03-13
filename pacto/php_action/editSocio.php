<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

	

if($_POST) {	
    $ASOID = $_SESSION['asoId'];
    $NOMBREASO = $_POST['editAsoName'];

	$sql = "UPDATE ASOCIACION SET NOMBREASO = '$NOMBREASO'  WHERE ASOCIACIONID = $ASOID ";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente. Aplicando cambios...";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST