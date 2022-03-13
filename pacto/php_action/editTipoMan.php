<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$maqid = $_POST['editmaqid'];
    $NOMMAQ = $_POST['editNommaqName'];

	$sql = "UPDATE TIPOMANTENIMIENTO SET NOMBRETIP = '$NOMMAQ' WHERE TIPOMANID = $maqid";

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