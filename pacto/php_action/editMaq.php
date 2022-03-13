<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$maqid = $_POST['editmaqid']; 

	$ENTIDADID = $_POST['editEntidadId'];
    $NOMMAQ = $_POST['editNommaqName'];
    $ESTADO = $_POST['editEstado']; 
    $MARCA = $_POST['editMarca']; 
    $PLACA = $_POST['editPlaca']; 
    $KILOM = $_POST['editKilom']; 
    $ORIGEN = $_POST['editOrigen']; 
    $CAPACID = $_POST['editCapacid'];
	  

	$sql1= "SELECT * FROM MAQUINARIASOCIO ";
        $r=mysqli_query($connect,$sql1) or die ("Error");
        mysqli_num_rows($r);

        
        $contador=0;

		while ($fila=mysqli_fetch_object($r)){
			$NOMPLACA=$fila -> PLACAMAQ;
			if($NOMPLACA==$PLACA){
                $contador ++;
				$errors[0] = "La Placa ya existe";
				$valid['success'] = true;
				$valid['messages'] = "La placa Ya existe. Por favor ponga otra";
            }
		}
	if ($contador<=0){	
	$sql = "UPDATE maquinariasocio SET ENTIDADID=$ENTIDADID,  NOMBREMAQ = '$NOMMAQ',ESTADOMAQ =  '$ESTADO', MARCAMAQ = '$MARCA', PLACAMAQ =  '$PLACA', KILOMETRAJEMAQ =  '$KILOM', ORIGENMAQ =  '$ORIGEN', CAPACIDADMAQ = '$CAPACID' WHERE MAQUINARIAID = $maqid ";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
}
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
