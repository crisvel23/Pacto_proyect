<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$maqid = $_POST['maqid'];
 
if($maqid){

 $sql = "DELETE FROM MAQUINARIASOCIO WHERE MAQUINARIAID = {$maqid}";
   
 if($connect->query($sql) === TRUE) {
	$valid['success'] = true;
    $valid['messages'] = "Eliminado exitosamente";
		
 } else {
	$valid['success'] = false;
	$valid['messages'] = "Error no se ha podido eliminar. Existen mantenimientos creados";
 }	
   
	$connect->close();

	echo json_encode($valid);

}