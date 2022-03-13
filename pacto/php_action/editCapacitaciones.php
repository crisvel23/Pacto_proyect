<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());


if($_POST){
	$reunionid = $_POST['reunionid'];

    $editTemareu          =  $_POST['editTemareu'];
    $editFechainireu      = date('Y-m-d',strtotime($_POST['editFechainireu']));//
    $editFechafinreu      = date('Y-m-d',strtotime($_POST['editFechafinreu']));//
	// $editFechainireu 	  =  $_POST['editFechainireu'];
	// $editFechafinreu      = $_POST['editFechafinreu'];
	$editHorareu          =  $_POST['editHorareu'];
	$editHorafinreu 	  =  $_POST['editHorafinreu'];
	$editEntidadid        =  $_POST['editEntidadid'];
	$editHoracapacitacion =  $_POST['editHoracapacitacion'];
	$editActa             =  $_POST['editActa'];
	$ediStatusreuid       =  $_POST['editStatusreuid'];
	$ediCapacitador      =  $_POST['ediCapacitador'];

//UPDATE entidad SET PAISID = 1, NOMBREENT = 'EPN', DIRENT = '12 de Oct', TELENT = '12345', CIUENT='Quito', TIPO = 'Universidad' WHERE ENTIDADID = 4
	$sql = "UPDATE reunion SET TEMAREU = '$editTemareu', FECHAINIREU = '$editFechainireu', FECHAFINREU = '$editFechafinreu', HORAREU = '$editHorareu', HORAFINREU ='$editHorafinreu', ENTIDADID = $editEntidadid, HORAS = '$editHoracapacitacion', ACTA = '$editActa', STATUSREUID  = $ediStatusreuid, CAPACITADOR =' $ediCapacitador'  WHERE REUNIONID = {$reunionid}";

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