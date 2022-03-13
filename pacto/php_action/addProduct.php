<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$productId = $_POST['productId'];

if($productId) { 

 $sql = "UPDATE PRODUCTO SET STATUSPRODUCT=1  WHERE PRODUCTOID = {$productId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Añadido exitosamente";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error no se ha podido añadir";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST