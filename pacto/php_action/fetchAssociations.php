<?php 	

require_once 'core.php';

$sql = "SELECT ASOCIACIONID, NOMBREASO, SECTORASO, BARRIOASO ,PARROQUIAASO, STATUSASO FROM asociacion";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeAssociations = ""; 

 while($row = $result->fetch_array()) {
 	$asoId = $row[0];
   

 	// active 
     
 	if($row[5] == 1) {
 		// activate member
 		$activeAssociations = "<label class='label label-success'>Disponibles</label>";
 	} else {
 		// deactivate member
 		$activeAssociations = "<label class='label label-danger'>No disponible</label>";
 	}

   


 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li class="dropdown-item"><a type="button" data-toggle="modal" id="editAssociationsModalBtn" data-target="#editAssociationsModal" onclick="editAssociations('.$asoId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li class="dropdown-item"><a type="button" data-toggle="modal" data-target="#removeAssociationsModal" id="removeAssociationsModalBtn" onclick="removeAssociations('.$asoId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>
	</div>';



 	$output['data'][] = array( 		
         $row[1],
         $row[2],
         $row[3],
         $row[4],	
 		$activeAssociations,
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);