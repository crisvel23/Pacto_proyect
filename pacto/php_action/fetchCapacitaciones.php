<?php 	

require_once 'core.php';
/**
 * SELECT entidad.NOMBREENT FROM reunion, entidad WHERE entidad.ENTIDADID = reunion.ENTIDADID AND REUNIONID = 57
 */
// $sql = "SELECT reunionid, temareu, fechainireu, fechafinreu, horareu, horafinreu, entidadid, capacitacion_status FROM reunion";
$sql = "SELECT REUNIONID, TEMAREU, CAPACITADOR, FECHAINIREU, FECHAFINREU,  HORAREU, HORAFINREU, ENTIDADID, TIPOREUNIONID, STATUSREUID, TIPOREU, ACTA, HORAS FROM reunion WHERE TIPOREUNIONID = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if ( $result -> num_rows > 0 ) { 

 // $row = $result->fetch_array();
 $activeCapacitacion = ""; 

 while( $row = $result -> fetch_array() ) {
 	$reunionid = $row[0];
	$sql1 = "SELECT entidad.NOMBREENT, TIPOREU FROM reunion, entidad WHERE entidad.ENTIDADID = reunion.ENTIDADID AND REUNIONID = $reunionid";
	$result1 = $connect->query($sql1);
	while($rows=$result1->fetch_array()){
		$enti = $rows[0];
	}
	$sql2 = "SELECT statusreunion.ESTADOREU, TIPOREU FROM reunion, statusreunion WHERE statusreunion.STATUSREUID = reunion.STATUSREUID AND REUNIONID = $reunionid";
	$result2 = $connect->query($sql2);
	while($rows=$result2->fetch_array()){
		$enti1 = $rows[0];
	}

 	// active 
 	// if($row[7] == 1) {
 	// 	// activate member
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
	   <li><a type="button" href="asistencia.php" id="asistenciaa" data-asis="10"><i class="fas fa-user-edit"></i> Asistencia</a></li>     
	   <li><a type="button" data-toggle="modal" data-target="#editBrandModel" onclick="editCapacitaciones('.$reunionid.')" > <i class="fas fa-edit"></i> Editar</a>  </li>       
	   <li><a href="php_action/deleteCapacitaciones.php?reunionid='.$reunionid.'"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a>  </li>       
	   </ul>
   	</div>';
	

 	$output['data'][] = array( 		
 		$row[1], 		
 		$row[2], 		
 		$row[3], 		
 		$row[4], 		
 		$row[5], 		
 		$row[6], 		
	
		$enti,
		$row[12],
		$row[11],
		$enti1,
		// $activeCapacitacion,
		$button,
		
		
 	
 		
 		); 	
 } // /while 
 	
} // if num_rows

$connect->close();

echo json_encode($output);


/**
 * INSERT INTO `reunion` (`REUNIONID`, `TIPOREUNIONID`, `ENTIDADID`, `STATUSREUID`, `FECHAINIREU`, `HORAREU`, `TEMAREU`, `FECHAFINREU`, `HORAFINREU`, `TIPOREU`, `ACTA`, `HORAS`) VALUES (NULL, '1', '1', '1', '2021-08-03 05:18:48.000000', '00:10:56', '00:10:57', '2021-08-03 05:18:48.000000', '12:10:56', 'Capacitacion', 'Acta1', '80');
 */