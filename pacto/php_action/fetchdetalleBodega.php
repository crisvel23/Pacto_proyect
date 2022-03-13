<?php

require_once 'core.php';

$detallebodega=$_GET["detallebodega"];

$sql = "SELECT 
DETBODEGAID,
PRODUCTO.NOMPRODUCT,
UNIDADES.NOMUNIDADES,
DESCRIPBODEGA,
STOCKBODEGA,
PRECIOBODEGA
 FROM DETALLEBODEGA,PRODUCTO,UNIDADES ,BODEGA
WHERE PRODUCTO.PRODUCTOID=DETALLEBODEGA.PRODUCTOID
AND UNIDADES.UNIDADESID=DETALLEBODEGA.UNIDADESID
AND BODEGA.BODEGAID=DETALLEBODEGA.BODEGAID
AND DETALLEBODEGA.BODEGAID = $detallebodega";

$result = $connect->query($sql) ;

$output = array('data' => array());


while ($row = $result->fetch_array()) {
    $detbodegaId = $row[0];

    $button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	 	
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" id="editdetalleBodegaModalBtn" data-target="#editdetalleBodegaModal" onclick="editdetalleBodega('.$detbodegaId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" data-target="#removedetalleBodegaModal" id="removedetalleBodegaModalBtn" onclick="removedetalleBodega('.$detbodegaId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>

	</div>';

    $output['data'][] = array(
        $row[1],
      
        $row[3],
        $row[4],
        $row[2],
        $row[5],
        $button

    );
}

$connect->close();
echo json_encode($output);
