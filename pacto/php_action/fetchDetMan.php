<?php 	

require_once 'core.php';


$manid=$_GET["manid"];

$sql = "SELECT
MANTENIMIENTOMAQUINARIA.MANTENIMIENTOID,
DETALLEMANTEID,
DESCRIPCIONMANTE,
PRECIOMANTE
FROM MANTENIMIENTOMAQUINARIA, DETALLEMANTENIMIENTO
WHERE MANTENIMIENTOMAQUINARIA.MANTENIMIENTOID=DETALLEMANTENIMIENTO.MANTENIMIENTOID
AND DETALLEMANTENIMIENTO.MANTENIMIENTOID=$manid"; //
 
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {

 	$maqid = $row[1];

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" id="editMaqModalBtn" data-target="#editMaqModal" onclick="editMaq('.$maqid.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" data-target="#removeMaqModal" id="removeMaqModalBtn" onclick="removeMaq('.$maqid.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>
	  </ul>

	</div>';

 	$output['data'][] = array(
         $row[2],
		 $row[3],
 		 $button,
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);
