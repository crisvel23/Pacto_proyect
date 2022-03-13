<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$sql = "SELECT ENTIDADID, PAISID, NOMBREENT, DIRENT, TELENT, CIUENT, TIPO FROM entidad";
$result = $connect->query($sql);

$output = array('data' => array());

if ( $result -> num_rows > 0 ) { 

 // $row = $result->fetch_array();
 $activeEntidades = ""; 

 while( $row = $result -> fetch_array() ) {
 	$entidadid = $row[0];
	/**
	 * SELECT pais.NOMPAIS, TIPO FROM entidad, pais WHERE entidad.PAISID = pais.PAISID AND ENTIDADID = 1
	 */
	$sql1 = "SELECT pais.NOMPAIS, TIPO FROM entidad, pais WHERE entidad.PAISID = pais.PAISID AND ENTIDADID = $entidadid";
	$result1 = $connect->query($sql1);
	while($rows=$result1->fetch_array()){
		$paiss = $rows[0];
	}
 	// active 
 	// if($row[7] == 1) {
 	// 	// activate memberloc
 	// 	$activeCapacitacion = "<label class='label label-success'>Disponible</label>";
 	// } else {
 	// 	// deactivate member
 	// 	$activeCapacitacion = "<label class='label label-danger'>No disponible</label>";
 	// }

 	$button = '<!-- Single button -->
	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Acción <span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li><a type="button" data-toggle="modal" data-target="#editBrandModel" onclick="editEntidades('.$entidadid.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
			<li><a  href="php_action/deleteEntidades.php?entidadid='.$entidadid.'" <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>             
		</ul>
	</div>'   
	;

 	$output['data'][] = array( 		
 		$row[2], 		
 		$row[6], 		
 		$row[3], 		
 		$row[4], 		
 		// $row[1], 
		 $paiss,		
 		$row[5], 		
		// $activeCapacitacion,
		$button,
		
 		); 	
 } // /while 
 	
} // if num_rows

$connect->close();

echo json_encode($output);