<?php 	

require_once 'core.php';

$sql = "SELECT 
TIPOMANID,
NOMBRETIP
FROM TIPOMANTENIMIENTO";
 
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
 	$maqid = $row[0];

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" id="editMaqModalBtn" data-target="#editMaqModal" onclick="editMaq('.$maqid.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	  </ul>

	</div>';

 	$output['data'][] = array(
		 $row[1],
 		 $button
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);