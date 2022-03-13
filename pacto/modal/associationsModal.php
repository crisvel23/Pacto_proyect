<!-- add Asssociations -->
<div class="modal fade" id="addAssociationsModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitAssociationsForm" action="php_action/createAssociation.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Asociación</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-associations-messages"></div>

	        <div class="form-group">
	        	<label for="NOMBREASO" class="col-sm-4 control-label">Nombre de Asociación : </label>

				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="NOMBREASO" placeholder="Introduce nombre de la asociación" name="NOMBREASO" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

            <div class="form-group">
	        	<label for="SECTORASO" class="col-sm-4 control-label">Sector : </label>
	    
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="SECTORASO" placeholder="Introduce el sector" name="SECTORASO" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

            <div class="form-group">
	        	<label for="BARRIOASO" class="col-sm-4 control-label">Barrio : </label>

				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="BARRIOASO" placeholder="Introduce Barrio " name="BARRIOASO" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

            <div class="form-group">
	        	<label for="PARROQUIAASO" class="col-sm-4 control-label">Parroquia : </label>

				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="PARROQUIAASO" placeholder="Introduce la parroquia" name="PARROQUIAASO" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	


    

	        <div class="form-group">
	        	<label for="STATUSASO" class="col-sm-4 control-label">Estado de la Asociación : </label>

				    <div class="col-sm-7">
				      <select class="form-control" id="STATUSASO" name="STATUSASO">
				      	<option value="1">Disponible</option>
				      	<option value="0">No disponible</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-primary" id="createAssociationsBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add Associations -->


<!-- edit Associations brand -->
<div class="modal fade" id="editAssociationsModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="editAssociationsForm" action="php_action/editAssociations.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar Asociación</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-associations-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

		      <div class="edit-associations-result">
		      	<div class="form-group">
		        	<label for="editAssociationsName" class="col-sm-4 control-label">Nombre: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editAssociationsName" placeholder="Nombre de la Asociación" name="editAssociationsName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
		   

				<div class="form-group">
		        	<label for="editAssociationsSector" class="col-sm-4 control-label">Sector: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editAssociationsSector" placeholder="Sector de la asociación" name="editAssociationsSector" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	
				<div class="form-group">
		        	<label for="editAssociationsBarrio" class="col-sm-4 control-label">Barrio: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editAssociationsBarrio" placeholder="Barrio de la asociación" name="editAssociationsBarrio" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	
				<div class="form-group">
		        	<label for="editAssociationsParroquia" class="col-sm-4 control-label">Parroquia: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editAssociationsParroquia" placeholder="Parroquia de la asociación" name="editAssociationsParroquia" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->		
							

				<div class="form-group">
		        	<label for="editAssociationsStatus" class="col-sm-4 control-label">Estado: </label>
					<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <select class="form-control" id="editAssociationsStatus" name="editAssociationsStatus">
							<option value="1">Disponible</option>
							<option value="0">No disponible</option>
					      </select>
					    </div>
		        </div> <!-- /form-group-->	



				
		      </div>         	        
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editAssociationsFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-success" id="editAssociationsBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /Associations brand -->

<!-- Associations brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeAssociationsModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Eliminar Asociación</h4>
      </div>
      <div class="modal-body">
        <p>Realmente deseas eliminar este registro ?</p>
      </div>
      <div class="modal-footer removeAssociationsFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" id="removeAssociationsBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->