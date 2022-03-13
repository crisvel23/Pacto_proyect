<?php

require_once 'core.php';

$aso_Id=$_SESSION['asoId'];

$sql = "SELECT 
 REUNIONID,
 TEMAREU,
 FECHAINIREU,
 HORAREU,
 HORAFINREU,
 TIPOREU,
 STATUSREUID,
 ACTA FROM REUNION
 WHERE TIPOREUNIONID = 2 AND ASOCIACIONID = $aso_Id";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

	// $row = $result->fetch_array();
	$activeREU = ""; 
   
	while($row = $result->fetch_array()) {
		$reunionesId = $row[0];
	  
   
		// active 
		
		if($row[6] == 1) {
			// activate member
			$activeREU = "<label class='label label-success'>PENDIENTE</label>";
		} else if($row[6] == 2){
			// deactivate member
			$activeREU = "<label class='label label-danger'>EN CURSO</label>";
		} else{
			$activeREU = "<label class='label label-danger'>FINALIZADA</label>";
		}
   
	  
   
   
		$button = '<!-- Single button -->
		<div class="d-flex">
	   <div class="btn-group">
		 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		   Acción <span class="caret"></span>
		 </button>
		 <ul class="dropdown-menu dropdown-menu-right">
		   <li class="dropdown-item"><a type="button" data-toggle="modal" id="editReunionesModalBtn" data-target="#editReunionesModal" onclick="editReuniones('. $reunionesId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
		   <li class="dropdown-item"><a type="button" data-toggle="modal" data-target="#removeReunionesModal" id="removeReunionesModalBtn" onclick="removeReuniones('. $reunionesId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
		 </ul>
	   </div>
	   <div>

			<form action="inscripciones.php" enctype="multipart/form-data" method="POST">
			<input type="hidden" name="reunionId" value=' . $reunionesId . '>

				<div style="padding-top:10px">
					<button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-plus-sign"></i> Inscripción</button>
				</div>
			</form>
			</div>
			<div>
			<form action="asistenciaSocio.php" enctype="multipart/form-data" method="POST">
			<input type="hidden" name="reunionId" value=' . $reunionesId . '>

				<div style="padding-top:10px">
					<button class="btn btn-default" type="submit"> <i class="fas fa-user-check"></i> Asistencia</button>
				</div>
			</form>
		</div>
		

		<form action="php_action/editReunionesActa.php" enctype="multipart/form-data" method="POST">
		<input type="hidden" name="reunionId" value=' . $reunionesId . '>
		<div class="file-select" id="src-file1" >
		<input type="file" name="Acta" id="Acta" aria-label="Archivo" >
	  	</div>


		<style>
		.file-select {
			position: relative;
			display: inline-block;
		  }
		  .file-select::before {
			background-color: #5678EF;
			color: white;
			display: flex;
			justify-content: center;
			align-items: center;
			border-radius: 3px;
			content: "Seleccionar Acta"; 
			position: absolute;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
		  }
		  
.file-select input[type="file"] {
	opacity: 0;
	width: 200px;
	height: 32px;
	display: inline-block;
  }
  
  #Acta::before {
	content: "Seleccionar Archivo 1";
  }
		
		</style>




				<button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar Acta </button>
			</div>
			
		</form>

		
		</div>
		</div>
	   '
	
	   ;
   $ver = '
   <form action="php_action/mostrarActa.php">
   <input type="hidden" name="reunionId" value=' . $reunionesId . '>
   <button type="hidden" class="btn btn-secondary">Ver Acta </button>
   </form>
   ';
   
   


		$output['data'][] = array( 		
			$row[1],
			$row[2],
			$row[3],
			$row[4],
			$row[5],
			$activeREU,	
			$ver,	
			$button	
			); 	
	} // /while 
   
   }
   
$connect->close();

echo json_encode($output);