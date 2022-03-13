<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$catId = $_POST['catId']; 
 $sql = "DELETE FROM CATEGORIAPRODUCTO WHERE CATEGORIAID=$catId";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Eliminado exitosamente";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error no se ha podido eliminar";
 }
 
 $connect->close();

 echo json_encode($valid);
 
