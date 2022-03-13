<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
    $usuarioid = $_POST['usuarioid'];
	$reunionid = $_POST['reunionid'];

	$sql = "INSERT INTO asistencia (USUARIOID, REUNIONID) 
	VALUES ($usuarioid, $reunionid)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Matriculado exitosamente";	
        // header ("Location:../capacitaciones.php");	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido guardar";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST