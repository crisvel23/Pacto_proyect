<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	
	
    $ReunionesTema = $_POST['editReunionesTema'];
    $ReunionesFecha = $_POST['editReunionesFecha'];
    $ReunionesHora = $_POST['editReunionesHora'];
	$ReunionesHoraFin = $_POST['editReunionesHoraFin'];

	$reunionesId=$_POST['editReunionesId'];
	$sql = "UPDATE REUNION 	
    SET TEMAREU = '$ReunionesTema',
	 	FECHAINIREU = '$ReunionesFecha', 
	    HORAREU ='$ReunionesHora',
	 	HORAFINREU ='$ReunionesHoraFin'
	
    
     WHERE REUNIONID = $reunionesId ";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";	
		
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST