<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());


if($_POST){
	$entidadid = $_POST['entidadid'];

    $nombre    =  $_POST['editNombre'];
	$tipo 	   =  $_POST['editTipo'];
	$direccion = $_POST['editDireccion'];
	$telefono  = $_POST['editTelefono'];
	$pais 	   =  $_POST['editPais'];
	$ciudad    =  $_POST['editCiudad'];

//UPDATE entidad SET PAISID = 1, NOMBREENT = 'EPN', DIRENT = '12 de Oct', TELENT = '12345', CIUENT='Quito', TIPO = 'Universidad' WHERE ENTIDADID = 4
	$sql = "UPDATE entidad SET PAISID = $pais, NOMBREENT = '$nombre', DIRENT = '$direccion', TELENT = '$telefono', CIUENT='$ciudad', TIPO = '$tipo' WHERE ENTIDADID = {$entidadid}";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";	
        // header ("Location:../entidades.php");
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
}// /if $_POST