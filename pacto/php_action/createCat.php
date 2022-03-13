<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$NOMCAT = $_POST['NOMCAT'];
    $DESCCAT = $_POST['DESCCAT']; 


	$sql1 = "INSERT INTO CATEGORIAPRODUCTO (NOMCAT, DESCCAT) 
	VALUES ('$NOMCAT', '$DESCCAT')";
	$EJECUTADO1=mysqli_query($connect,$sql1);


	if($EJECUTADO1) {
	 	$valid['success'] = true;
		$valid['messages'] = "Creado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido guardar";
	}


	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST