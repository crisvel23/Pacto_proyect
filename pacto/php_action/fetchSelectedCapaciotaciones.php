<?php 	

require_once 'core.php';

$reunionid = $_POST['reunionid'];

$sql = "SELECT REUNIONID, TEMAREU, FECHAINIREU, FECHAFINREU, HORAREU, HORAFINREU, ENTIDADID, HORAS, ACTA, STATUSREUID, CAPACITADOR FROM reunion WHERE REUNIONID = $reunionid";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);