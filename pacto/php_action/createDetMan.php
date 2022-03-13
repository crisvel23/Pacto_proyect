<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

	$manid = $_POST['manteid'];
	$NOMMAQ = $_POST['NOMMAQ'];
	$KILOM = $_POST['KILOM'];

	$sql = "INSERT INTO DETALLEMANTENIMIENTO (MANTENIMIENTOID,DESCRIPCIONMANTE,PRECIOMANTE) VALUES ($manid,'$NOMMAQ','$KILOM')";
	$EJECUTADO = mysqli_query($connect, $sql);

	if ($EJECUTADO) {
		$sql1 = "SELECT SUM(PRECIOMANTE) FROM detallemantenimiento where MANTENIMIENTOID=$manid";
		$EJECUTADO2 = mysqli_query($connect, $sql1);

		while ($row = $EJECUTADO2->fetch_array()) {
			$TOTALMAN = $row[0];
		}

		if ($EJECUTADO2) {
			$sql2 = "UPDATE MANTENIMIENTOMAQUINARIA SET COSTOMAN =$TOTALMAN WHERE MANTENIMIENTOID=$manid";
			$EJECUTADO3 = mysqli_query($connect, $sql2);

			if ($EJECUTADO3) {
				$valid['success'] = true;
				$valid['messages'] = "Creado exitosamente";
			} else {
				$valid['success'] = false;
				$valid['messages'] = "Error no se ha podido guardar";
			}
		}
	}

	$connect->close();

	echo json_encode($valid);
} // /if $_POST