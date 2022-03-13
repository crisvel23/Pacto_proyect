<?php

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$detbodegaId = $_POST['detbodegaId'];

// $sql = "SELECT PRODUCTOID FROM DETALLEBODEGA WHERE DETBODEGAID = $detbodegaId ";
// 	$EJECUTADO = mysqli_query($connect, $sql);

// 	while ($row = $EJECUTADO->fetch_array()) {
// 		$PRODUCTOID = $row[0];
// 	}




// if ($EJECUTADO) {

// 	$sql1 = "DELETE FROM DETALLEBODEGA WHERE DETBODEGAID = $detbodegaId ";
// 	$EJECUTADO1 = mysqli_query($connect, $sql1);



// 	if ($EJECUTADO1) {

// 		$sql2 = "SELECT SUM(STOCKBODEGA) FROM DETALLEBODEGA WHERE PRODUCTOID = $PRODUCTOID ";
// 		$EJECUTADO2 = mysqli_query($connect, $sql2);

// 		while ($row = $EJECUTADO2->fetch_array()) {
// 			$STOCKSUMA = $row[0];
// 		}

// 		if ($EJECUTADO2) {

// 			$sql3 = "UPDATE PRODUCTO SET STOCKPRODUCT=  $STOCKSUMA  WHERE PRODUCTOID  = $PRODUCTOID ";
// 			$EJECUTADO3 = mysqli_query($connect, $sql3);



// 			if ($EJECUTADO3) {
// 				$valid['success'] = true;
// 				$valid['messages'] = "Eliminado exitosamente";
// 			} else {
// 				$valid['success'] = false;
// 				$valid['messages'] = "Error no se ha podido eliminar";
// 			}
// 		}
// 	}
// }

$sql = "SELECT PRODUCTOID FROM DETALLEBODEGA WHERE DETBODEGAID = $detbodegaId ";
$EJECUTADO = mysqli_query($connect, $sql);

while ($row = $EJECUTADO->fetch_array()) {
	$PRODUCTOID = $row[0];
}

$stockantes = "SELECT STOCKBODEGA FROM DETALLEBODEGA WHERE PRODUCTOID = $PRODUCTOID ";
$EJECUTADOSTOCK = mysqli_query($connect, $stockantes);

while ($row = $EJECUTADOSTOCK->fetch_array()) {
	$STOCKANTES = $row[0];
}

if ($EJECUTADOSTOCK) {

	$sql = "DELETE FROM DETALLEBODEGA WHERE DETBODEGAID=$detbodegaId";
	$EJECUTADO = mysqli_query($connect, $sql);

	if ($EJECUTADO) {

		$stockproducto = "SELECT STOCKPRODUCT FROM PRODUCTO WHERE PRODUCTOID = $PRODUCTOID ";
		$EJECUTADOSTOCKPRO = mysqli_query($connect, $stockproducto);

		while ($row = $EJECUTADOSTOCKPRO->fetch_array()) {
			$STOCKPRODUCTO = $row[0];
		}
	
			$TOTAL = $STOCKPRODUCTO - $STOCKANTES;
		

		
		$sql3 = "UPDATE PRODUCTO SET STOCKPRODUCT=  $TOTAL  WHERE PRODUCTOID  = $PRODUCTOID ";
		$EJECUTADO3 = mysqli_query($connect, $sql3);
		

		if ($EJECUTADO3) {
			$valid['success'] = true;
			$valid['messages'] = "Actualizado exitosamente";
		} else {
			$valid['success'] = false;
			$valid['messages'] = "Error no se ha podido actualizar";
		}
		
	}
}






$connect->close();

echo json_encode($valid);
