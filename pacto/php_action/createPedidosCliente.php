<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$USUARIOID=$_SESSION['userId'];
    
	$NOMPRODUCT = $_POST['NOMPRODUCT'];
    $CATEGORIAID = $_POST['CATEGORIAID']; 
    $DESCRIPCIONPRODUCT = $_POST['DESCRIPCIONPRODUCT']; 
    $PRECIOPRODUCT = $_POST['PRECIOPRODUCT']; 
    $STOCKPRODUCT = $_POST['STOCKPRODUCT']; 
    $LUGARCONSUMOID = $_POST['LUGARCONSUMOID']; 
  
	

	$sql = "INSERT INTO PRODUCTO (
		CATEGORIAID,
		PERTENECENID,
		LUGARCONSUMOID,
		NOMPRODUCT,
		DESCRIPCIONPRODUCT,
		PRECIOPRODUCT,
		STOCKPRODUCT,
		PVPPRODUCT
	) 
		VALUES (
			$CATEGORIAID,
			$USUARIOID,
			$LUGARCONSUMOID,
			'$NOMPRODUCT',
			'$DESCRIPCIONPRODUCT',
			$PRECIOPRODUCT,
			$STOCKPRODUCT ,
			($PRECIOPRODUCT+($PRECIOPRODUCT*0.12))
		)";

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