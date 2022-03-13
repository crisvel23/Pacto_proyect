<?php 	

require_once 'core.php';

$carritoId = $_POST['carritoId'];


$sql = "SELECT 
DETALLEFACTURA.DETALLEID,
NOMPRODUCT, 
PRECIOPRODUCT,
PVPPRODUCT, 
DETALLEFACTURA.CANTIDAD, 
DETALLEFACTURA.TOTALPRODUCT 
FROM PRODUCTO, DETALLEFACTURA, PEDIDOS
WHERE DETALLEFACTURA.PRODUCTOID = PRODUCTO.PRODUCTOID 
AND DETALLEFACTURA.PEDIDOSID = PEDIDOS.PEDIDOSID 
AND DETALLEFACTURA.DETALLEID=$carritoId";

$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);