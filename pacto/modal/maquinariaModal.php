
<div class="modal fade" id="addMaqModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitMaqForm" action="php_action/createMaq.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Maquinaria</h4>

	      </div>
	      <div class="modal-body">

	      	<div id="add-maq-messages"></div>	
			  <div class="form-group">
	        	<label for="ENTIDADID" class="col-sm-4 control-label">Entidad : </label>
				    <div class="col-sm-7">
						<select name="ENTIDADID" id="ENTIDADID" class="form-control">
						<?php $query=mysqli_query($connect,"SELECT ENTIDADID,NOMBREENT FROM ENTIDAD");?>
						<?php 
						while ($entidad = mysqli_fetch_array($query)){ ?>
							<option value='<?php echo $entidad['ENTIDADID'];?>'  > <?php echo $entidad['NOMBREENT'];?></option><br>
						<?php    
					
						}
						?>
						</select>
				    </div>
	        </div> <!-- /form-group-->

		 <div class="form-group">
	        <label for="NOMMAQ" class="col-sm-4 control-label">Nombre Maquinaria : </label>
			<div class="col-sm-7">
				      <input type="text" class="form-control" id="NOMMAQ" placeholder="Intoruce un Nombre" name="NOMMAQ" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	


						<div class="form-group">
								<label for="ESTADO" class="col-sm-4 control-label"> Estado : </label>
								<div class="col-sm-7">
											<input type="text" class="form-control" id="ESTADO" placeholder="Introduce el estado" name="ESTADO" autocomplete="on">
											</div>
									</div> <!-- /form-group-->

						<div class="form-group">
								<label for="MARCA" class="col-sm-4 control-label"> Marca : </label>
								<div class="col-sm-7">
											<input type="text" class="form-control" id="MARCA" placeholder="Introduce la Marca" name="MARCA" autocomplete="on">
											</div>
									</div> <!-- /form-group-->	


						<div class="form-group">
								<label for="PLACA" class="col-sm-4 control-label"> Placa : </label>
								<div class="col-sm-7">
											<input type="text" class="form-control" id="PLACA" placeholder="Introduce la Placa" name="PLACA" autocomplete="on">
											</div>
									</div> <!-- /form-group-->	

						<div class="form-group">
								<label for="KILOM" class="col-sm-4 control-label"> Kilometraje : </label>
								<div class="col-sm-7">
											<input type="number" class="form-control" id="KILOM" placeholder="Introduce el Lolometraje" name="KILOM" autocomplete="on">
											</div>
									</div> <!-- /form-group-->	

						<div class="form-group">
								<label for="ORIGEN" class="col-sm-4 control-label"> Origen : </label>	
								<div class="col-sm-7">
											<input type="text" class="form-control" id="ORIGEN" placeholder="Introduce Origen (Pais)" name="ORIGEN" autocomplete="on">
											</div>
									</div> <!-- /form-group-->			

										<div class="form-group">
										<label for="CAPACID" class="col-sm-4 control-label"> Capacidad : </label>
										<div class="col-sm-7">
											<input type="text" class="form-control" id="CAPACID" placeholder="Introduce la Capacidad" name="CAPACID" autocomplete="on">
											</div>
									</div> <!-- /form-group-->	
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-primary" id="createMaqBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add users -->


<!-- edit brand -->
<div class="modal fade" id="editMaqModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editMaqForm" action="php_action/editMaq.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar Maquinaria</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-users-messages"></div>

	      	 <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

			<div class="edit-users-result">
			<div class="form-group">
	        	<label for="editEntidadId" class="col-sm-4 control-label">Entidad : </label>
				    <div class="col-sm-7">
						<select name="editEntidadId" id="editEntidadId" class="form-control">
						<?php $query=mysqli_query($connect,"SELECT ENTIDADID,NOMBREENT FROM ENTIDAD");?>
						<?php 
						while ($entidad = mysqli_fetch_array($query)){ ?>
							<option value='<?php echo $entidad['ENTIDADID'];?>'  > <?php echo $entidad['NOMBREENT'];?></option><br>
						<?php    
					
						}
						?>
						</select>
				    </div>
	        </div> <!-- /form-group-->
			
		      	<div class="form-group">
		        	<label for="editNommaqName" class="col-sm-4 control-label">Nombre de Maquinaria : </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editNommaqName" placeholder="Nombre de Maquina" name="editNommaqName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	 
				
		      	<div class="form-group">
		        	<label for="editEstado" class="col-sm-4 control-label">Estado : </label>
		     
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editEstado" placeholder="Estado de Maquina" name="editEstado" autocomplete="on">
					    </div>
		        </div> <!-- /form-group-->

		      	<div class="form-group">
		        	<label for="editMarca" class="col-sm-4 control-label">Marca : </label>
		     
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editMarca" placeholder="Marca" name="editMarca" autocomplete="on">
					    </div>
		        </div> <!-- /form-group-->	

				
		      	<div class="form-group">
		        	<label for="editPlaca" class="col-sm-4 control-label">Placa: </label>
		        	
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editPlaca" placeholder="Placa" name="editPlaca" autocomplete="on">
					    </div>
		        </div> <!-- /form-group-->

			
		      	<div class="form-group">
		        	<label for="editKilom" class="col-sm-4 control-label">Kilometraje : </label>
		        	
					    <div class="col-sm-7">
					      <input type="number" class="form-control" id="editKilom" placeholder="Kilometraje" name="editKilom" autocomplete="on">
					    </div>
		        </div> <!-- /form-group-->

				
		      	<div class="form-group">
		        	<label for="editOrigen" class="col-sm-4 control-label">Origen : </label>
		        	
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editOrigen" placeholder="Origen (Pais)" name="editOrigen" autocomplete="on">
					    </div>
		        </div> <!-- /form-group-->

				
		      	<div class="form-group">
		        	<label for="editCapacid" class="col-sm-4 control-label">Capacidad : </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editCapacid" placeholder="Capacidad de Maquinaria" name="editCapacid" autocomplete="on">
					    </div>
		        </div> <!-- /form-group-->

			</div> 		
			<!-- /edit brand result -->     

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editMaqFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-success" id="editMaqBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMaqModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Eliminar Maquinaria</h4>
      </div>
      <div class="modal-body">
        <p>¿ Realmente deseas eliminar este registro ?</p>
      </div>
      <div class="modal-footer removeMaqFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" id="removeMaqBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->