<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());


if ($_POST) {

	$NOMBREUSU = $_POST['NOMBREUSU'];
	$ROLID = $_POST['ROLID'];
	$EMAILUSU = $_POST['EMAILUSU'];
	$TELCUSU = $_POST['TELCUSU'];
	$TELCELUSU = $_POST['TELCELUSU'];
	$CONTRAUSU = md5($_POST['CONTRAUSU']);
	$DIRUSU = $_POST['DIRUSU'];
	$NOMBREAPEUSU = $_POST['NOMBREAPEUSU'];
	$ASOSIACIONID = $_POST['ASOSIACIONID'];
	$CEDULAUSU = $_POST['CEDULAUSU'];
	$STATUSUSU = 1;


	// $valida = "SELECT * FROM USUARIO ";
	// $r = mysqli_query($connect, $valida) or die("Error");
	// mysqli_num_rows($r);

	// $contador = 0;

	// while ($fila = mysqli_fetch_object($r)) {

	// 	$NOMUSU = $fila->NOMBREUSU;
	// 	$MAIL = $fila->EMAILUSU;
	// 	$CELULAR = $fila->TELCELUSU;
	// 	$TELEFONO = $fila->TELCUSU;
	// 	$CEDULA = $fila->CEDULAUSU;

	// 	if ($NOMUSU == $NOMBREUSU) {
	// 		$contador++;
	// 		$valid['success'] = false;
	// 		$valid['messages'] = "El usuario ya está registrado";
	// 	}

	// 	if ($MAIL == $EMAILUSU) {
	// 		$contador++;
	// 		$valid['success'] = false;
	// 		$valid['messages'] = "El email ya está registrado";
	// 	}

	// 	if ($TELEFONO == $TELCUSU) {
	// 		$contador++;
	// 		$valid['success'] = false;
	// 		$valid['messages'] = "El teléfono convencional ya está registrado";
	// 	}

	// 	if ($CELULAR == $TELCELUSU) {
	// 		$contador++;
	// 		$valid['success'] = false;
	// 		$valid['messages'] = "El teléfono celular ya está registrado";
	// 	}

	// 	if ($CEDULA == $CEDULAUSU) {
	// 		$contador++;
	// 		$valid['success'] = false;
	// 		$valid['messages'] = "La cédula ya está registrada";
	// 	}
	// }

	// if ($contador <= 0) {

		$sql1 = "INSERT INTO USUARIO (NOMBREUSU, ROLID,EMAILUSU,TELCUSU,TELCELUSU,CONTRAUSU,DIRUSU,NOMBREAPEUSU,STATUSUSU,CEDULAUSU) 
			VALUES ('$NOMBREUSU', $ROLID,'$EMAILUSU', '$TELCUSU','$TELCELUSU', '$CONTRAUSU', ' $DIRUSU', '$NOMBREAPEUSU',$STATUSUSU,'$CEDULAUSU')";
		$EJECUTADO1 = mysqli_query($connect, $sql1);



		if ($EJECUTADO1) {
			$sql2 = "SELECT LAST_INSERT_ID();";
			$EJECUTADO2 = mysqli_query($connect, $sql2);
			while ($row = $EJECUTADO2->fetch_array()) {
				$ULTIMOINGRESADO = $row[0];
			}

			$sql3 = "INSERT INTO PERTENECEN (USUARIOID,ASOCIACIONID) VALUES ($ULTIMOINGRESADO,$ASOSIACIONID)";
			$EJECUTADO3 = mysqli_query($connect, $sql3);
		}



		if ($EJECUTADO3) {
			$valid['success'] = true;
			$valid['messages'] = "Creado exitosamente";
		} else {
			$valid['success'] = false;
			$valid['messages'] = "Error no se ha podido guardar";
		}
		
	// }

	$connect->close();

	echo json_encode($valid);
} // /if $_POST