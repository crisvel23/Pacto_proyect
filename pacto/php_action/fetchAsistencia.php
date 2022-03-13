<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
/**
 * SELECT `ASISTENCIAID`, `USUARIOID`, `REUNIONID`, `CONFIRMACIONASIS` FROM `asistencia` WHERE 1
 */

$sql = "SELECT ASISTENCIAID, USUARIOID, REUNIONID, CONFIRMACIONASIS FROM asistencia";
$result = $connect->query($sql);

// $multa = 0;
// $multaA = 0;
// $confirmacion = 0;

$output = array('data' => array());

if ( $result -> num_rows > 0 ) { 

 // $row = $result->fetch_array();
 $activeEntidades = ""; 

 while( $row = $result -> fetch_array() ) {
 	$asistenciaid = $row[0];
	/**
	 * SELECT usuario.NOMBREAPEUSU, usuario.NOMBREUSU FROM usuario, asistencia WHERE usuario.USUARIOID = asistencia.USUARIOID
	 */

	$sql1 = "SELECT usuario.NOMBREAPEUSU, usuario.NOMBREUSU FROM usuario, asistencia WHERE usuario.USUARIOID = asistencia.USUARIOID AND ASISTENCIAID = $asistenciaid";
	$result1 = $connect->query($sql1);
	while($rows=$result1->fetch_array()){
		$nombre = $rows[0];
		$usuario = $rows[1];
	}
	/**
	 * SELECT reunion.TEMAREU FROM reunion, asistencia WHERE reunion.REUNIONID = asistencia.REUNIONID
	 */
	$sql2 = "SELECT reunion.TEMAREU AS tema FROM reunion, asistencia WHERE reunion.REUNIONID = asistencia.REUNIONID AND ASISTENCIAID = $asistenciaid";
	$result2 = $connect->query($sql2);
	while($rows=$result2->fetch_array()){
		$tema = $rows[0];
	}
	/**
	 * SELECT multa.VALORMUL FROM multa, asistencia WHERE multa.ASISTENCIAID = asistencia.ASISTENCIAID
	 */
	$sql3 = " SELECT multa.VALORMUL FROM asistencia, multa WHERE multa.ASISTENCIAID = asistencia.ASISTENCIAID";
	$result3 = $connect->query($sql3);
	while($rows=$result3->fetch_array()){
		$multa = $rows[0];
	
	}
	if( $row[3] == 0 ){
		$multaA = $multa;
	} else {
		$multaA = 0;
	}
	/**
	 * SELECT certificado.APROBACION, certificado.CERTIFICADO FROM certificado INNER JOIN diasasistencia ON certificado.DIASASISTENCIAID = diasasistencia.DIASASISTENCIAID 
	 */
	$sql4 = "SELECT certificado.APROBACION, certificado.CERTIFICADO FROM certificado INNER JOIN diasasistencia ON certificado.DIASASISTENCIAID = diasasistencia.DIASASISTENCIAID ";
	$result4 = $connect->query($sql4);
	while($rows=$result4->fetch_array()){
		$aprobacion = $rows[0];
		$certificado = $rows[1];
	
	}
	if($aprobacion = 1) {
		$resAprobacion = 'Aprobado';
	}else{
		$resAprobacion = 'Reprobado';
	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Acción <span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
		<li><a type="button" data-toggle="modal" data-target="#editAsistencia" onclick="editEntidades('.$asistenciaid.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
		<li><a type="button" data-toggle="modal" data-target="#ver" onclick="asitencia('.$asistenciaid.')"> <i class="glyphicon glyphicon-edit"></i> Ver Asistencia</a></li>
		<li><a  href="php_action/deleteEntidades.php?entidadid='.$asistenciaid.'" <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>               
		</ul>
	</div>'   
	;

 	$output['data'][] = array( 		
 		$nombre, 		
 		$usuario, 		
 		$tema, 		
 		// $row[3], 	
		$multaA,	
		$resAprobacion,	
		$certificado,	
 		// $row[4], 		
 		// $row[1], 
		//  $paiss,		
 		// $row[5], 		
		// $activeCapacitacion,
		$button,
		
 		); 	
 } // /while 
 	
} // if num_rows

$connect->close();

echo json_encode($output);