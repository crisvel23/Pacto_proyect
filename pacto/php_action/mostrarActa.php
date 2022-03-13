
<?php

require_once 'core.php';
$ver =$_POST['reunionId'];

$sql = "SELECT  ACTA FROM REUNION
 WHERE REUNIONID = $ver";


$result = $connect->query($sql);

header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=acta");
readfile("$result");