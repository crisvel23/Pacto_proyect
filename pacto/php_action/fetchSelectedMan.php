<?php 	

require_once 'core.php';

$maqid = $_POST['maqid'];

$sql = "SELECT 
MANTENIMIENTOID,
TIPOMANID, 
MAQUINARIAID, 
FECHAMAN, 
DESCMAN,
COSTOMAN,
PROXIMOMAN
 FROM MANTENIMIENTOMAQUINARIA WHERE MANTENIMIENTOID = $maqid";

$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);