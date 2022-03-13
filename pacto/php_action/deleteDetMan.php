<?php

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$maqid = $_POST['maqid'];
$manid=$_GET["manid"];

if ($maqid) {

	$sql = "DELETE FROM DETALLEMANTENIMIENTO WHERE DETALLEMANTEID = $maqid";
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
			if ($connect->query($sql) === TRUE) {
				$valid['success'] = true;
				$valid['messages'] = "Borrado exitosamente";
			} else {
				$valid['success'] = false;
				$valid['messages'] = "Error no se ha podido guardar";
			}

		}

	}
	

	$connect->close();

	echo json_encode($valid);
}
