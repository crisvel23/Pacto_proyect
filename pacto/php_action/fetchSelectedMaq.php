<?php 	

require_once 'core.php';

$maqid = $_POST['maqid'];

$sql = "SELECT 
MAQUINARIAID, 
PERTENECENID, 
ENTIDADID,
NOMBREMAQ,
ESTADOMAQ,
MARCAMAQ,
KILOMETRAJEMAQ,
PLACAMAQ,
ORIGENMAQ,
CAPACIDADMAQ
 FROM maquinariasocio WHERE MAQUINARIAID = $maqid";

$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);