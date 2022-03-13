<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

    $NOMBREUSU = $_POST['editUsersName'];
    $EMAILUSU = $_POST['editUsersEmail']; 
	$CEDULAUSU = $_POST['editUsersCedula']; 
    $TELCUSU = $_POST['editUsersTelf']; 
    $TELCELUSU = $_POST['editUsersTelc']; 
    $CONTRAUSU = $_POST['editUsersContra']; 
    $DIRUSU = $_POST['editUsersDir']; 
    $NOMBREAPEUSU = $_POST['editUsersNomApe']; 
	$STATUSUSU = $_POST['editUsersStatus']; 
    $usersId = $_POST['editUsersId']; 

	$sql = "UPDATE USUARIO SET NOMBREUSU = '$NOMBREUSU', EMAILUSU = '$EMAILUSU', TELCUSU =  '$TELCUSU', TELCELUSU =  '$TELCELUSU', CONTRAUSU =  '$CONTRAUSU', DIRUSU = '$DIRUSU', NOMBREAPEUSU = '$NOMBREAPEUSU',STATUSUSU = '$STATUSUSU',CEDULAUSU='$CEDULAUSU' WHERE USUARIOID = $usersId ";

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