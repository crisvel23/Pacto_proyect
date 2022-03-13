<?php 	

require_once 'core.php';

$reunionesId = $_POST['reunionesId'];

$sql = "SELECT  
REUNIONID,
TEMAREU,
FECHAINIREU,
HORAREU,
HORAFINREU,
STATUSREUID 
FROM REUNION 
WHERE REUNIONID = $reunionesId ";


$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);