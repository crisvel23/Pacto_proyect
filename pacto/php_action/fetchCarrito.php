<?php 	

require_once 'core.php';


$USUID=$_SESSION['userId'];

$sql="SELECT 
DETALLEFACTURA.DETALLEID,
NOMPRODUCT, 
PRECIOPRODUCT,
PVPPRODUCT, 
DETALLEFACTURA.CANTIDAD, 
DETALLEFACTURA.TOTALPRODUCT 
FROM PRODUCTO, DETALLEFACTURA, PEDIDOS ,USUARIO WHERE DETALLEFACTURA.PRODUCTOID = PRODUCTO.PRODUCTOID 
AND DETALLEFACTURA.PEDIDOSID = PEDIDOS.PEDIDOSID 
AND PEDIDOS.USUARIOID=USUARIO.USUARIOID 
AND USUARIO.USUARIOID = $USUID
AND PEDIDOS.STATUSPEDIDO = 0";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();

 
 while($row = $result->fetch_array()) {
 	$detalleFacturaId = $row[0];

 	$pedido ='
     <button class="btn btn-default " data-toggle="modal" data-target="#removeCarritoModal" id="removeCarritoModalBtn" onclick="removeCarrito('.$detalleFacturaId.')"> <i class="fas fa-times"></i> Eliminar del pedido</button>
     ';

 	$output['data'][] = array( 		
 		$row[1], 
		$row[2], 
		$row[3], 
		$row[4],
        $row[5],
		$pedido	
		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);