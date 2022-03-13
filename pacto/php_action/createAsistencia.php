<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

// $result = $connect->query($sql);
	// $reunionid     = 3;
	// $tiporeunionid = 1;
	$asistenciaid   = $_POST['asistenciaid'];
	$fechaAsis = date('Y-m-d',strtotime($_POST['fechaAsis']));
	$asisnoasis   = $_POST['asisnoasis'];
	

	$sql = "INSERT INTO diasasistencia ( FECHAASIS, ASISTENCIAID, DIASASISTENCIA) VALUES ('$fechaAsis', $asistenciaid, $asisnoasis )";


	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Creado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido guardar";
         echo 'No vale';
	}
	 

	$connect->close();

	echo json_encode( $valid );
 
 // /if $_POST