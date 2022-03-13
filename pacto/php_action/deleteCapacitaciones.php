<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$reunionid = $_GET['reunionid'];
 
//  $sql = "UPDATE brands SET brand_status = 2 WHERE brand_id = {$brandId}";
//  $sql = "SELECT REUNIONID FROM reunion WHERE REUNIONID = 21";
if($reunionid){

	$sql = "DELETE FROM reunion WHERE REUNIONID = {$reunionid}";
   
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
	   $valid['messages'] = "Eliminado exitosamente";
	   header ("Location:../capacitaciones.php");				
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error no se ha podido eliminar";
	}
	
	
   
   $connect->close();
	echo json_encode($valid);

	
}


// /if $_POST