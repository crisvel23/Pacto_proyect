<?php 	

require_once 'core.php';



	
    $ASOID = $_SESSION["asoId"];
    $NOMBREIMG=$_FILES['editAsoLogoImg']['name'];
    $TIPOIMG=$_FILES['editAsoLogoImg']['type'];
    $TAMANIOIMG=$_FILES['editAsoLogoImg']['size'];
	
	$RAIZ=$_SERVER['DOCUMENT_ROOT'].'/pacto/assests/images/logos/';
	$TEMP = $_FILES['editAsoLogoImg']['tmp_name'];
	
	
    $RUTA = "../pacto/assests/images/logos/$NOMBREIMG";
	
	$sql = "UPDATE ASOCIACION SET LOGOASO = '$RUTA'  WHERE ASOCIACIONID = $ASOID ";

	if($connect->query($sql) === TRUE && move_uploaded_file($TEMP,$RAIZ.$NOMBREIMG)) {
		

		echo "Actualizado exitosamente. Aplicando cambios...";	
		
		header ("location: ../sociousers.php");
	} else {
	 
		echo "Actualizado exitosamente. Aplicando cambios...";	
		
	}
	 
	$connect->close();


 

