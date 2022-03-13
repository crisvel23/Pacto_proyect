
<div class="modal fade" id="addMaqModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitMaqForm" action="php_action/createTipoMan.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Tipo de Mantenimiento</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-maq-messages"></div>	

		 <div class="form-group">
	        <label for="NOMMAQ" class="col-sm-4 control-label">Tipo de Mantenimiento : </label>
			<div class="col-sm-7">
				      <input type="text" class="form-control" id="NOMMAQ" placeholder="Introduce mantenimiento" name="NOMMAQ" autocomplete="on">
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
    	
    	<form class="form-horizontal" id="editMaqForm" action="php_action/editTipoMan.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar Tipo Mantenimiento</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-users-messages"></div>

	      	 <div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

			<div class="edit-users-result">
		      	<div class="form-group">
		        	<label for="editNommaqName" class="col-sm-4 control-label">Nombre de Tipo Mantenimiento : </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editNommaqName" placeholder="Nombre de Maquina" name="editNommaqName" autocomplete="off">
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