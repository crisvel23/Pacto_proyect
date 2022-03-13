<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$maqid = $_POST['editmaqid']; 	
    $NOMMAQ = $_POST['editNommaqName'];
    $KILOM = $_POST['editKilom'];


	$sql = "UPDATE DETALLEMANTENIMIENTO SET DESCRIPCIONMANTE = '$NOMMAQ', PRECIOMANTE = '$KILOM' WHERE DETALLEMANTEID = $maqid";
	$EJECUTADO=mysqli_query($connect,$sql);

		
		if($EJECUTADO){

			$sql0= "SELECT MANTENIMIENTOID FROM DETALLEMANTENIMIENTO WHERE DETALLEMANTEID=$maqid";
			$EJECUTADO1=mysqli_query($connect,$sql0);

			while($row = $EJECUTADO1->fetch_array()) {
				$MANTEGENERAL=$row[0];
			}

			if($EJECUTADO1){
			$sql1 = "SELECT SUM(PRECIOMANTE) FROM detallemantenimiento where MANTENIMIENTOID=$MANTEGENERAL";
			$EJECUTADO2=mysqli_query($connect,$sql1);
			
			while($row = $EJECUTADO2->fetch_array()) {
				$TOTALMAN=$row[0];
			}

			if($EJECUTADO2){
				$sql2= "UPDATE MANTENIMIENTOMAQUINARIA SET COSTOMAN =$TOTALMAN WHERE MANTENIMIENTOID=$MANTEGENERAL";
			   $EJECUTADO3=mysqli_query($connect,$sql2);
	   
			   if($EJECUTADO3) {
				   $valid['success'] = true;
				  $valid['messages'] = "Editado exitosamente";	
			  } else {
				   $valid['success'] = false;
				   $valid['messages'] = "Error no se ha podido guardar";
			  }
		   }

			}
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST