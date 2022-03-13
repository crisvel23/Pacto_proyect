<?php 	

require_once 'core.php';

$asoId = $_POST['associationsId'];

$sql = "SELECT ASOCIACIONID, NOMBREASO, SECTORASO, BARRIOASO ,PARROQUIAASO, LOGOASO, STATUSASO FROM asociacion WHERE ASOCIACIONID = $asoId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);