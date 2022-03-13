<?php 	

require_once 'core.php';

$catId = $_POST['catId'];



$sql = "SELECT CATEGORIAID,NOMCAT,DESCCAT FROM CATEGORIAPRODUCTO WHERE CATEGORIAID=$catId ";

$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);