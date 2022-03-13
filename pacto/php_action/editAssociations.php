<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

	$NOMBREASO = $_POST['editAssociationsName'];
	$BARRIOASO = $_POST['editAssociationsBarrio'];
	$SECTORASO = $_POST['editAssociationsSector'];
	$PARROQUIAASO = $_POST['editAssociationsParroquia'];
	$LOGOASO = "null";
	$ASOCIACIONID = $_POST['editAssociationsId'];
	$STATUSASO = $_POST['editAssociationsStatus'];
	$sql = "UPDATE ASOCIACION SET NOMBREASO = '$NOMBREASO', BARRIOASO = '$BARRIOASO', SECTORASO = '$SECTORASO', PARROQUIAASO = '$PARROQUIAASO', LOGOASO = '$LOGOASO', STATUSASO = $STATUSASO WHERE ASOCIACIONID = $ASOCIACIONID";

	if ($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error no se ha podido actualizar";
	}

	$connect->close();

	echo json_encode($valid);
}
