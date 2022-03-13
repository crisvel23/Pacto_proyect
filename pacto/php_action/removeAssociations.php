<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$associationsId = $_POST['associationsId'];

if($associationsId) { 

 $sql = "UPDATE ASOCIACION SET STATUSASO = 0 WHERE ASOCIACIONID = {$associationsId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Eliminado exitosamente";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error no se ha podido eliminar";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST