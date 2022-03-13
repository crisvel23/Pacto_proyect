<?php 	

require_once 'core.php';


$sql = "SELECT USUARIOID , usuario.ROLID, ROLNOM, NOMBREUSU, EMAILUSU ,TELCUSU, TELCELUSU, CONTRAUSU, DIRUSU, NOMBREAPEUSU,CEDULAUSU ,STATUSUSU FROM usuario,rol WHERE  usuario.rolid = rol.rolid";

$result = $connect->query($sql);


$output = array('data' => array());

if($result->num_rows > 0) { 

 $activeUsers = ""; 

 while($row = $result->fetch_array()) {
	 
 	$userId = $row[0];
   

 	// active 
     
 	if($row[11] == 1) {
 		// activate member
 		$activeUsers = "<label class='label label-success'>Disponibles</label>";
 	} else {
 		// deactivate member
 		$activeUsers = "<label class='label label-danger'>No disponible</label>";
 	}

   


 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	 	
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" id="editUsersModalBtn" data-target="#editUsersModal" onclick="editUsers('.$userId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" data-target="#removeUsersModal" id="removeUsersModalBtn" onclick="removeUsers('.$userId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>

	</div>';

	

 	$output['data'][] = array( 		
         $row[3],
         $row[1],
         $row[2],
         $row[4],
         $row[5],	
         $row[6],
         $row[7],
         $row[8],	
		 $row[9],
		 $row[10],
 		$activeUsers,
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);