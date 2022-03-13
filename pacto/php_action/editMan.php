<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$maqid = $_POST['editmaqid']; 	

    $NOMMAQ = $_POST['editNommaqName'];
    $ESTADO = $_POST['editEstado']; 
    $MARCA = $_POST['editMarca'];  
    $KILOM = $_POST['editKilom'];

 /*  $NOMMAQ = "2021-12-12";
    $ESTADO = "hola"; 
    $MARCA = "2022-12-12";  
    $KILOM = 1234;*/  

	$sql = "UPDATE MANTENIMIENTOMAQUINARIA 
    SET FECHAMAN = '$NOMMAQ', DESCMAN =  '$ESTADO',COSTOMAN =  '$KILOM', PROXIMOMAN = '$MARCA' WHERE MANTENIMIENTOID = $maqid ";

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