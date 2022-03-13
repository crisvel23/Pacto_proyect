<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

		$maqid = $_POST['editmaqid'];
        $TIPOMANID = $_POST['TIPOMANID'];
	    $NOMMAQ = $_POST['NOMMAQ'];
        $ESTADO = $_POST['ESTADO'];
		$MARCA = $_POST['MARCA'];
		$KILOM = $_POST['KILOM'];

	$sql = "INSERT INTO MANTENIMIENTOMAQUINARIA (TIPOMANID ,MAQUINARIAID ,FECHAMAN,DESCMAN,COSTOMAN,PROXIMOMAN) 
	VALUES ($TIPOMANID,$maqid,'$NOMMAQ','$ESTADO',0,'$MARCA')";

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