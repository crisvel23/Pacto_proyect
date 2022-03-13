<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$reunionesId = $_POST['reunionesId'];
 
//  $sql = "UPDATE brands SET brand_status = 2 WHERE brand_id = {$brandId}";
//  $sql = "SELECT REUNIONID FROM reunion WHERE REUNIONID = 21";

 if($reunionesId){

	$sql = "DELETE FROM reunion WHERE REUNIONID = {$reunionesId}";
   
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
	   $valid['messages'] = "Eliminado exitosamente";
	  /*  header ("Location:../reuniones.php");	 */			
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error no se ha podido eliminar";
	}
	
	
   
   $connect->close();
	echo json_encode($valid);

	
} 


