<?php
require_once 'core.php';

//error_reporting(0);

$USUARIOPEDIDO = $_SESSION['userId'];


$sql1 = "SELECT ROUND(SUM(TOTALPRODUCT),2) FROM DETALLEFACTURA ,PEDIDOS
    WHERE USUARIOID= $USUARIOPEDIDO AND DETALLEFACTURA.PEDIDOSID=PEDIDOS.PEDIDOSID 
    AND PEDIDOS.STATUSPEDIDO = 0";

$EJECUTADO1 = mysqli_query($connect, $sql1);

while ($row = $EJECUTADO1->fetch_array()) {
    $TOTALPRODUCT = $row[0];
}

$sql2 = "UPDATE PEDIDOS SET TOTALPEDIDO=$TOTALPRODUCT, STATUSPEDIDO=1 
    WHERE USUARIOID = $USUARIOPEDIDO AND STATUSPEDIDO=0";

$EJECUTADO2 = mysqli_query($connect, $sql2);




$connect->close();

$alert='
<script>
alert("Se envió el pedido pronto se comunicarán contigo.");
</script>
';

echo $alert;

header( "refresh:1;url=../pedidosCliente.php" ); 
