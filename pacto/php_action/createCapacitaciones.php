<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

// $result = $connect->query($sql);
	// $reunionid     = 3;
	// $tiporeunionid = 1;
	$entidadid   = $_POST['entidadid'];
	$temareu     = $_POST['temareu'];//
	$fechainireu = date('Y-m-d',strtotime($_POST['fechainireu']));//
	// $fechainireu   = $_POST['fechainireu'];//
	// $fechafinreu   = $_POST['fechafinreu'];//
	$fechafinreu = date('Y-m-d',strtotime($_POST['fechafinreu']));//
	// $horareu     = date('H-i',strtotime($_POST['horareu']));//
	// $horafinreu  = date('H-i',strtotime($_POST['horafinreu']));//
	$horareu       	  = $_POST['horareu'];//
	$horafinreu    	  = $_POST['horafinreu'];//
	$horacapacitacion = $_POST['horacapacitacion'];//
	$acta             = $_POST['acta'];//
	$capacitador             = $_POST['capacitador'];//
	// $acta          = $_POST['acta'];
    /**
	 * INSERT INTO reunion (TIPOREUNIONID, ENTIDADID, TIPOREU, FECHAINIREU, HORAREU, TEMAREU, FECHAFINREU, HORAFINREU, ACTA) VALUES ( 1, 1, '1' , 'Lunes', 'Nohche', 'TEMA1', 'MARTES', 'TARDE','');
	 */

	 /**
	  * INSERT INTO `reunion`(`REUNIONID`, `TIPOREUNIONID`, `ENTIDADID`, `STATUSREUID`, `FECHAINIREU`, `HORAREU`, `TEMAREU`, `FECHAFINREU`, `HORAFINREU`, `TIPOREU`, `ACTA`, `HORAS`) 
	  *VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]')
	  */

	// $sql = "INSERT INTO reunion (FECHAINIREU, HORAREU, TEMAREU, FECHAFINREU, HORAFINREU, ENTIDADID, ACTA, CAPACITACION_STATUS, TIPOREU) VALUES ( '$fechainireu', '$horareu', '$temareu', '$fechafinreu', '$horafinreu',$entidadid,'',1,1)";
	$sql = "INSERT INTO reunion (TIPOREUNIONID, ENTIDADID, STATUSREUID, FECHAINIREU, HORAREU, TEMAREU, FECHAFINREU, HORAFINREU, TIPOREU, ACTA, HORAS, CAPACITADOR) VALUES ( 1, $entidadid, 1, '$fechainireu','$horareu ','$temareu ', '$fechafinreu', '$horafinreu', 'Capacitacion','$acta',$horacapacitacion, '$capacitador')";


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