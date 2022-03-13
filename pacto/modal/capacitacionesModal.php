<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitBrandForm" action="php_action/createCapacitaciones.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Capacitaciones</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="temareu" class="col-sm-3 control-label">Tema: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="temareu" placeholder="Nombre de la tarea" name="temareu" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	 

	        <div class="form-group">
	        	<label for="fechainireu" class="col-sm-3 control-label">Fecha Inicio: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" id="fechainireu" placeholder="Fecha inicio" name="fechainireu" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="fechafinreu" class="col-sm-3 control-label">Fecha Fin: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" id="fechafinreu" placeholder="Nombre Fecha fin" name="fechafinreu" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	  

	        <div class="form-group">
	        	<label for="horareu " class="col-sm-3 control-label">Hora Inicio: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="time" class="form-control" id="horareu" placeholder="Hora Inicio" name="horareu" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="horafinreu" class="col-sm-3 control-label">Hora Fin: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="time" class="form-control" id="horafinreu" placeholder="Hora fin" name="horafinreu" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	 
			
			
	        <div class="form-group">
	        	<label for="entidadid " class="col-sm-3 control-label">Entidad: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					<select name="entidadid" id="entidadid" class="form-control">
						<?php $query=mysqli_query($connect,"SELECT NOMBREENT, ENTIDADID FROM entidad");?>
						<?php 
						while ($especies = mysqli_fetch_array($query)){ ?>
						<option value=" <?php echo $especies['ENTIDADID'];?> "> <?php echo $especies['NOMBREENT'];?></option><br>
						<?php    
						// $connect->close();
						}?>
					</select>
				      <!-- <input type="text" class="form-control" id="entidadid" placeholder="Mandar 1 porque no vale" name="entidadid" autocomplete="off"> -->
					</div>
					
	        </div> <!-- /form-group-->	   
			
			<div class="form-group">
	        	<label for="horacapacitacion" class="col-sm-3 control-label">Horas totales de Capacitacion: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="horacapacitacion" placeholder="Horas totales de capacitacion" name="horacapacitacion" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->
			<div class="form-group">
	        	<label for="acta" class="col-sm-3 control-label">Acta: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="acta" placeholder="Acta" name="acta" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->
			<div class="form-group">
	        	<label for="capacitador" class="col-sm-3 control-label">Capacitador/es: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="capacitador" placeholder="capacitador/es" name="capacitador" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->
			
			
			
			        	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        
	        <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Guardar cambios</button>
	    	
			</div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->




<!-- edit brand -->
<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editBrandForm" action="php_action/editCapacitaciones.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar Capacitacion</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-brand-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

					<div class="form-group">
	        	<label for="editTemareu" class="col-sm-3 control-label">Tema: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editTemareu" placeholder="Nombre de la tarea" name="editTemareu" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	 

	        <div class="form-group">
	        	<label for="editFechainireu" class="col-sm-3 control-label">Fecha Inicio: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" id="editFechainireu" placeholder="Fecha inicio" name="editFechainireu" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="editFechafinreu" class="col-sm-3 control-label">Fecha Fin: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" id="editFechafinreu" placeholder="Nombre Fecha fin" name="editFechafinreu" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	  

	        <div class="form-group">
	        	<label for="editHorareu" class="col-sm-3 control-label">Hora Inicio: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="time" class="form-control" id="editHorareu" placeholder="Hora Inicio" name="editHorareu" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="editHorafinreu" class="col-sm-3 control-label">Hora Fin: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="time" class="form-control" id="editHorafinreu" placeholder="Hora fin" name="editHorafinreu" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	 
			
			
	        <div class="form-group">
	        	<label for="editEntidadid" class="col-sm-3 control-label">Entidad: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					<select name="editEntidadid" id="editEntidadid" class="form-control">
						<?php $query=mysqli_query($connect,"SELECT NOMBREENT, ENTIDADID FROM entidad");?>
						<?php 
						while ($especies = mysqli_fetch_array($query)){ ?>
						<option value=" <?php echo $especies['ENTIDADID'];?> "> <?php echo $especies['NOMBREENT'];?></option><br>
						<?php    
						// $connect->close();
						}?>
					</select>
				      <!-- <input type="text" class="form-control" id="entidadid" placeholder="Mandar 1 porque no vale" name="entidadid" autocomplete="off"> -->
					</div>
					
	        </div> <!-- /form-group-->	   
			
			<div class="form-group">
	        	<label for="editHoracapacitacion" class="col-sm-3 control-label">Horas totales de Capacitacion: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="editHoracapacitacion" placeholder="Horas totales de capacitacion" name="editHoracapacitacion" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->
			<div class="form-group">
	        	<label for="editActa" class="col-sm-3 control-label">Acta: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editActa" placeholder="Acta" name="editActa" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->


			<div class="form-group">
	        	<label for="editStatusreuid" class="col-sm-3 control-label">Estado: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
						<select name="editStatusreuid" id="editStatusreuid" class="form-control">
							<?php $query=mysqli_query($connect,"SELECT STATUSREUID , ESTADOREU FROM statusreunion");?>
							<?php 
							while ($especies = mysqli_fetch_array($query)){ ?>
							<option value=" <?php echo $especies['STATUSREUID'];?> "> <?php echo $especies['ESTADOREU'];?></option><br>
							<?php    
							// $connect->close();
							}?>
						</select>
				      <!-- <input type="text" class="form-control" id="entidadid" placeholder="Mandar 1 porque no vale" name="entidadid" autocomplete="off"> -->
					</div>
					
	        </div> <!--form-group-->
			<div class="form-group">
	        	<label for="ediCapacitador" class="col-sm-3 control-label">Capacitador/es: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="ediCapacitador" placeholder="capacitador/es" name="ediCapacitador" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->
					
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editBrandFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit brand -->

