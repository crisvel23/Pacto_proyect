<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$usersId = $_POST['usersId'];

if($usersId) { 

 $sql = "UPDATE usuario SET STATUSUSU = 0 WHERE USUARIOID = {$usersId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Eliminado exitosamente";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error no se ha podido eliminar";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POSTperw