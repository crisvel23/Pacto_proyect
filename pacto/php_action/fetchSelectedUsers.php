<?php 	

require_once 'core.php';

$usersId = $_POST['usersId'];



$sql = "SELECT USUARIOID , usuario.ROLID, 
ROLNOM, NOMBREUSU, EMAILUSU ,TELCUSU, 
TELCELUSU, CONTRAUSU, DIRUSU, 
NOMBREAPEUSU, STATUSUSU FROM usuario,rol WHERE  usuario.rolid = rol.rolid AND USUARIOID=$usersId";

$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);