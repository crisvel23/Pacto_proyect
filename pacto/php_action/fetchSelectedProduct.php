<?php 	

require_once 'core.php';

$productId = $_POST['productId'];

$sql = "SELECT 
PRODUCTOID ,
CATEGORIAID , 
NOMPRODUCT, 
DESCRIPCIONPRODUCT, 
PRECIOPRODUCT,
STOCKPRODUCT
 FROM PRODUCTO WHERE PRODUCTOID  = $productId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);