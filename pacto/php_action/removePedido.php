<?php 	

require_once 'core.php';

$DETALLEID=$_POST['detallefactura'];




 $sql = "DELETE FROM DETALLEFACTURA WHERE PEDIDOSID=$DETALLEID";
 $EJECUTADO=mysqli_query($connect,$sql);

if($EJECUTADO){
    $sql2 = "DELETE FROM PEDIDOS WHERE PEDIDOSID=$DETALLEID";
    $EJECUTADO2=mysqli_query($connect,$sql2); 
}





 if($EJECUTADO2 === TRUE) {
    echo "Eliminado exitosamente";		
 } else {
 	echo "Error no se ha podido eliminar";
 }
 
 $connect->close();

 header("location:../pedidosAdmin.php");


 
