<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

// $result = $connect->query($sql);
	// $reunionid     = 3;
	// $tiporeunionid = 1;
	$nombre =  $_POST['nombre'];
	$tipo =  $_POST['tipo'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$pais =  $_POST['pais'];
	$ciudad =  $_POST['ciudad'];

    /**
	 * INSERT INTO `entidad` (`ENTIDADID`, `PAISID`, `NOMBREENT`, `DIRENT`, `TELENT`, `CIUENT`, `tipo`) VALUES (NULL, '1', 'UCE', 'Seminario', '2095188', 'Quito', 'Universidad');
	 */

	$sql = "INSERT INTO entidad (PAISID, NOMBREENT, DIRENT, TELENT, CIUENT, tipo) VALUES ( $pais,'$nombre','$direccion', '$telefono','$ciudad','$tipo')";


	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Creado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido guardar";
         echo 'No vale';
	}
	 

	$connect->close();

	echo json_encode( $valid );
 
 // /if $_POST