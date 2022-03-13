<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$entidadid = $_GET['entidadid'];
 
//  $sql = "UPDATE brands SET brand_status = 2 WHERE brand_id = {$brandId}";
//  $sql = "SELECT REUNIONID FROM reunion WHERE REUNIONID = 21";
if($entidadid){

	$sql = "DELETE FROM entidad WHERE ENTIDADID = {$entidadid}";
   
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
	   $valid['messages'] = "Eliminado exitosamente";
	   header ("Location:../entidades.php");				
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error no se ha podido eliminar";
	}
	
	
   
   $connect->close();
	echo json_encode($valid);

	
}


// /if $_POST