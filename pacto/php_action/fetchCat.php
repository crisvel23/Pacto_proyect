<?php 	

require_once 'core.php';

$aso_Id=$_SESSION['asoId'];

$sql = "SELECT CATEGORIAID,NOMCAT,DESCCAT FROM CATEGORIAPRODUCTO ";

$result = $connect->query($sql);


$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
 	$catId = $row[0];
   

 	$button2 = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	 	
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" id="editCateModalBtn" data-target="#editCateModal" onclick="editCate('.$catId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	     <li  class="dropdown-item"><a type="button" data-toggle="modal" data-target="#removeCateModal" id="removeCateModalBtn" onclick="removeCate('.$catId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>

	</div>';

	

 	$output['data'][] = array( 	
        $row[0],	
         $row[1],
         $row[2],
 		$button2		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);