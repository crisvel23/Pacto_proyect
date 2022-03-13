<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$NOMBREUSU = $_POST['NOMBREUSU'];
    $EMAILUSU = $_POST['EMAILUSU']; 
    $TELCUSU = $_POST['TELCUSU']; 
    $CEDULAUSU = $_POST['CEDULAUSU']; 
    $TELCELUSU = $_POST['TELCELUSU']; 
    $CONTRAUSU = md5($_POST['CONTRAUSU']); 
    $DIRUSU = $_POST['DIRUSU']; 
    $NOMBREAPEUSU = $_POST['NOMBREAPEUSU']; 
    $STATUSUSU = 1; 
    $ROLID=3;

	$sql = "INSERT INTO USUARIO (NOMBREUSU, ROLID,EMAILUSU,TELCUSU,TELCELUSU,CONTRAUSU,DIRUSU,NOMBREAPEUSU,STATUSUSU,CEDULAUSU) 
	VALUES ('$NOMBREUSU', $ROLID,'$EMAILUSU', '$TELCUSU','$TELCELUSU', '$CONTRAUSU', ' $DIRUSU', '$NOMBREAPEUSU',$STATUSUSU,$CEDULAUSU)";
    

    $EJECUTADO1=mysqli_query($connect,$sql);


    if($EJECUTADO1){

        $sql2 = "SELECT LAST_INSERT_ID();";
        $EJECUTADO2=mysqli_query($connect,$sql2);

        while($row = $EJECUTADO2->fetch_array()) {
            $ULTIMOINGRESADO=$row[0];
        }

        $ASOCIACIONID=$_SESSION['asoId'];
        $sql3 = "INSERT INTO PERTENECEN (USUARIOID, ASOCIACIONID) 
	    VALUES ($ULTIMOINGRESADO,$ASOCIACIONID)";
         $EJECUTADO3=mysqli_query($connect,$sql3);

         if($EJECUTADO3) {
            $valid['success'] = true;
           $valid['messages'] = "Creado exitosamente";	
            } else {
            $valid['success'] = false;
            $valid['messages'] = "Error no se ha podido guardar";
        }
    }
    

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST