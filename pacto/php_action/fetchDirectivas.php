<?php 	

require_once 'core.php';

//$sql = "SELECT USUARIOID ,ROLID, NOMBREUSU, EMAILUSU ,TELCUSU, TELCELUSU, CONTRAUSU, DIRUSU, NOMBREAPEUSU, STATUSUSU FROM usuario WHERE STATUSUSU = 1 ";


$sql = "SELECT directiva.DIRECTIVAID,usuario.NOMBREAPEUSU ,asociacion.NOMBREASO,CARGODIR, PERIODODIR  FROM directiva, pertenecen, asociacion, usuario Where directiva.PERTENECENID = pertenecen.PERTENECENID AND pertenecen.USUARIOID = usuario.USUARIOID AND asociacion.ASOCIACIONID = pertenecen.ASOCIACIONID";

$result = $connect->query($sql);


$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeUsers = ""; 

 while($row = $result->fetch_array()) {
 	$directivasId = $row[0];
   

 	// active 
     
 	/*if($row[10] == 1) {
 		// activate member
 		$activeUsers = "<label class='label label-success'>Disponibles</label>";
 	} else {
 		// deactivate member
 		$activeUsers = "<label class='label label-danger'>No disponible</label>";
 	}*/

   


 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	 	
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" id="editDirectivasModalBtn" data-target="#editDirectivasModal" onclick="editUsers('.$directivasId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" data-target="#removeDirectivasModal" id="removeDirectivaModalBtn" onclick="removeUsers('.$directivasId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>

	</div>';

 	$output['data'][] = array( 		
         $row[1],
         $row[2],
		 $row[3],
		 $row[4],
	
     
 		//$activeUsers,
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);