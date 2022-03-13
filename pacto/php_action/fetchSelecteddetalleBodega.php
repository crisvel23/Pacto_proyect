<?php 	

require_once 'core.php';

$detbodegaId = $_POST['detbodegaId'];


$sql = "SELECT 
DETBODEGAID,
PRODUCTOID,
UNIDADESID,
STOCKBODEGA,
DESCRIPBODEGA,
PRECIOBODEGA 
 FROM DETALLEBODEGA
WHERE DETBODEGAID = $detbodegaId";


$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);