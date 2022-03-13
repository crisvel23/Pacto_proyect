<?php 	

require_once 'core.php';

$asoId = $_SESSION['asoId'];

$sql = "SELECT 
ASOCIACIONID,
LOGOASO
FROM ASOCIACION WHERE  ASOCIACIONID=$asoId";

$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);