<?php 	

require_once 'core.php';

$aso_Id=$_SESSION['asoId'];

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
    $ReunionesTema = $_POST['ReunionesTema'];
	$ReunionesTipo = $_POST['ReunionesTipo'];

    $ReunionesFecha = $_POST['ReunionesFecha'];
    $ReunionesHora = $_POST['ReunionesHora'];
	$ReunionesHoraFin = $_POST['ReunionesHoraFin'];
	


 

	$sql = "INSERT INTO reunion (TEMAREU, TIPOREU,TIPOREUNIONID, FECHAINIREU, HORAREU, 	HORAFINREU, ASOCIACIONID, STATUSREUID) 
	VALUES ('$ReunionesTema','$ReunionesTipo', 2 ,'$ReunionesFecha','$ReunionesHora','$ReunionesHoraFin',$aso_Id,1 )";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Creado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido guardar";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST