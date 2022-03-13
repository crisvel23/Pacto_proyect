<?php 	

require_once 'core.php';

$entidadid = $_POST['entidadid'];
/**
 * SELECT ENTIDADID, NOMBREENT,TIPO DIRENT, TELENT, pais.NOMPAIS AS PAISNOMBRE, CIUENT FROM entidad, pais WHERE entidad.PAISID = pais.PAISID AND ENTIDADID = 1;
 */
// $sql = "SELECT ENTIDADID, PAIS.NOMPAIS, NOMBREENT, DIRENT, TELENT, CIUENT, TIPO FROM entidad, pais WHERE ENTIDADID = $entidadid AND PAIS.PAISID = ENTIDAD.PAISID";
$sql = "SELECT ENTIDADID, NOMBREENT,TIPO, DIRENT, TELENT, PAISID, CIUENT FROM entidad WHERE ENTIDADID = $entidadid";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);