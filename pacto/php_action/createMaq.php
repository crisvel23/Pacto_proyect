
<?php 	

require_once 'core.php';


$errors = array();

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

		//PONER EL ID DEL USUARIO
		$USUARIOID=$_SESSION['userId'];
		$ASOCIAIONID=$_SESSION['asoId'];

        $ENTIDADID = $_POST['ENTIDADID']; 
	    $NOMMAQ = $_POST['NOMMAQ'];
        $ESTADO = $_POST['ESTADO'];
		$MARCA = $_POST['MARCA'];
        $PLACA = $_POST['PLACA'];
		$KILOM = $_POST['KILOM'];
        $ORIGEN = $_POST['ORIGEN'];
		$CAPACID = $_POST['CAPACID'];

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

	$sql="SELECT PERTENECENID FROM PERTENECEN  WHERE USUARIOID= $USUARIOID AND ASOCIACIONID= $ASOCIAIONID";
	$EJECUTADO=mysqli_query($connect,$sql);
	
	while($row = $EJECUTADO->fetch_array()) {
		$PERTENECENID=$row[0];
	}

	if($EJECUTADO){
	$sql = "INSERT INTO MAQUINARIASOCIO (PERTENECENID,ENTIDADID,NOMBREMAQ,ESTADOMAQ,MARCAMAQ,PLACAMAQ,KILOMETRAJEMAQ,ORIGENMAQ,CAPACIDADMAQ) 
	VALUES ($PERTENECENID,$ENTIDADID,'$NOMMAQ','$ESTADO', '$MARCA','$PLACA',$KILOM, '$ORIGEN', '$CAPACID')";


	if($connect->query($sql) === TRUE) {
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
