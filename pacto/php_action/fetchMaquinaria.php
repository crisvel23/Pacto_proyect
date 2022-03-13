<?php 	

require_once 'core.php';

$USUARIOID=$_SESSION['userId'];
$ASOCIAIONID=$_SESSION['asoId'];

$sql1= "SELECT * FROM MAQUINARIASOCIO ";
        $r=mysqli_query($connect,$sql1) or die ("Error");
        mysqli_num_rows($r);
$sql="SELECT PERTENECENID FROM PERTENECEN  WHERE USUARIOID= $USUARIOID AND ASOCIACIONID= $ASOCIAIONID";
$EJECUTADO=mysqli_query($connect,$sql);
		
	while($row = $EJECUTADO->fetch_array()) {
		$PERTENECENID=$row[0];
	}


$sql = "SELECT 
MAQUINARIAID,
ENTIDAD.NOMBREENT, 
ASOCIACION.NOMBREASO, 
USUARIO.NOMBREAPEUSU, 
NOMBREMAQ, 
ESTADOMAQ, 
MARCAMAQ, 
KILOMETRAJEMAQ, 
PLACAMAQ, 
ORIGENMAQ, 
CAPACIDADMAQ 
FROM MAQUINARIASOCIO, ASOCIACION, USUARIO, PERTENECEN, ENTIDAD 
WHERE MAQUINARIASOCIO.PERTENECENID = PERTENECEN.PERTENECENID 
AND ASOCIACION.ASOCIACIONID = PERTENECEN.ASOCIACIONID 
AND USUARIO.USUARIOID = PERTENECEN.USUARIOID 
AND ENTIDAD.ENTIDADID = MAQUINARIASOCIO.ENTIDADID
AND PERTENECEN.PERTENECENID = $PERTENECENID";
 
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
 	$maqid = $row[0];

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" id="editMaqModalBtn" data-target="#editMaqModal" onclick="editMaq('.$maqid.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li  class="dropdown-item"><a type="button" data-toggle="modal" data-target="#removeMaqModal" id="removeMaqModalBtn" onclick="removeMaq('.$maqid.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li> 	
		<li  class="dropdown-item"><a type="button" href="mantenimiento.php?manid='.$maqid.'" id="manten" onclick="vertabla('.$maqid.')"> <i class="fas fa-tools"></i> Mantenimiento</a></li> 
			
		
	  </ul> 

	</div>';

	//<li  class="dropdown-item"><a name="manid" href="mantenimiento.php?manid='.$maqid.'"><i class="fas fa-tools"></i> Mantenimiento Bien</a></li>

 	$output['data'][] = array(
		 $row[1],
    
		 $row[8],
         $row[4],
         $row[5],
         $row[6],
		 $row[7],
		 $row[9],
		 $row[10],
 		 $button
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);