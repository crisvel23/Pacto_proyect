<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$sql = "SELECT USUARIOID, REUNIONID, ASISTENCIAID FROM asistencia";
$result = $connect->query($sql);

$output = array('data' => array());

if ( $result -> num_rows > 0 ) { 

 // $row = $result->fetch_array();
 $activeEntidades = ""; 

 while( $row = $result -> fetch_array() ) {
 	$usuarioid = $row[0];
 	$asistenciaid = $row[2];
	/**
	 * SELECT pais.NOMPAIS, TIPO FROM entidad, pais WHERE entidad.PAISID = pais.PAISID AND ENTIDADID = 1
	 */
	$sql1 = "SELECT NOMBREUSU, NOMBREAPEUSU, CEDULAUSU FROM usuario  WHERE USUARIOID = $usuarioid";
	$result1 = $connect->query($sql1);
	while($rows=$result1->fetch_array()){
		$usuario = $rows[0];
		$nombre = $rows[1];
		$ci = $rows[2];
	}
    /**
     * SELECT reunion.TEMAREU FROM reunion, asistencia WHERE reunion.REUNIONID = asistencia.REUNIONID AND USUARIOID = 1
     */
	$sql2 = "SELECT reunion.TEMAREU FROM reunion, asistencia WHERE reunion.REUNIONID = asistencia.REUNIONID AND USUARIOID = $usuarioid";
	$result2 = $connect->query($sql2);
	while($rows=$result2->fetch_array()){
		$temareu = $rows[0];
	}


 	$button = '<!-- Single button -->
	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Acción <span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li><a type="button" data-toggle="modal" data-target="#editBrandModel" onclick="editEntidades('.$asistenciaid.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
			<li><a  href="php_action/deleteMatricula.php?asistenciaid='.$asistenciaid.'" <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>             
		</ul>
	</div>'   
	;

 	$output['data'][] = array( 
       	
 		$nombre, 		
 		$usuario, 		
 		$ci, 		
 		$temareu, 		
        
		$button,
		
 		); 	
 } // /while 
 	
} // if num_rows

$connect->close();

echo json_encode($output);