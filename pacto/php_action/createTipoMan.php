<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

		
	    $NOMMAQ = $_POST['NOMMAQ'];

	$sql = "INSERT INTO TIPOMANTENIMIENTO (NOMBRETIP) VALUES ('$NOMMAQ')";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Creado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido guardar";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST