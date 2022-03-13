

<div class="modal fade" id="addMaqModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitMaqForm" action="php_action/createDetMan.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar Detalle</h4>
			<?php $manid=$_GET["manid"];?>
	      </div>
	      <div class="modal-body">

	      	<div id="add-maq-messages"></div>	
			  <div class="form-group">
	        	<label for="manteid" class="col-sm-4 control-label" ></label>
				    <div class="col-sm-7">
					<input type="hidden" class="form-control" id="manteid" name="manteid" value='<?php echo $manid; ?> '>
				    </div>
	        </div> <!-- /form-group-->

		 <div class="form-group">
	        <label for="NOMMAQ" class="col-sm-4 control-label">Descripción : </label>
			<div class="col-sm-7">
				      <input type="text" class="form-control" id="NOMMAQ" placeholder="Introduce una descripción" name="NOMMAQ" autocomplete="on">
				    </div>
	        </div> <!-- /form-group-->	

			<div class="form-group">
				<label for="KILOM" class="col-sm-4 control-label"> Costo $ : </label>
				<div class="col-sm-7">
						<input type="number" step="0.01" class="form-control" id="KILOM" placeholder="Introduce el Costo (USD)" name="KILOM" autocomplete="on">
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
    	
    	<form class="form-horizontal" id="editMaqForm" action="php_action/editDetMan.php" method="POST">
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
		        	<label for="editNommaqName" class="col-sm-4 control-label">Descripcion : </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editNommaqName" placeholder="Descripcion de Mantenimiento" name="editNommaqName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	 

		      	<div class="form-group">
		        	<label for="editKilom" class="col-sm-4 control-label">Costo $ : </label>
		        	
					    <div class="col-sm-7">
					      <input type="number" step="0.01" class="form-control" id="editKilom" placeholder="Costo (USD)" name="editKilom" autocomplete="off">
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