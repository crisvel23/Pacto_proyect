<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/createSocioProduct.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar producto</h4>
	      </div>

	      <div class="modal-body">

	      	<div id="add-product-messages"></div>


			<div class="form-group">
			<label for="NOMPRODUCT" class="col-sm-3 control-label">Nombre: </label>
	
				<div class="col-sm-8">
					<input type="text" class="form-control" id="NOMPRODUCT" placeholder="Nombre del producto" name="NOMPRODUCT" autocomplete="off">
				</div>
	        </div> <!-- /form-group-->	    


			<div class="form-group">
	        	<label for="CATEGORIAID" class="col-sm-3 control-label">Categorías : </label>
				    <div class="col-sm-8">
						<select name="CATEGORIAID" id="CATEGORIAID" class="form-control">
						<?php $query=mysqli_query($connect,"SELECT CATEGORIAID,NOMCAT FROM CATEGORIAPRODUCTO");?>
						<?php 
						while ($cat = mysqli_fetch_array($query)){ ?>
							<option value='<?php echo $cat['CATEGORIAID'];?>'  > <?php echo $cat['NOMCAT'];?></option><br>
						<?php    
						}
						?>
						</select>
				    </div>
	        </div> <!-- /form-group-->


			<div class="form-group">
			<label for="DESCRIPCIONPRODUCT" class="col-sm-3 control-label">Descripción: </label>

				<div class="col-sm-8">
					 <textarea class="form-control" name="DESCRIPCIONPRODUCT" id="DESCRIPCIONPRODUCT" cols="30" rows="5" placeholder="Descripción del producto" autocomplete="off"></textarea> 
				</div>
	        </div> <!-- /form-group-->	
	

			<div class="form-group">
			<label for="PRECIOPRODUCT" class="col-sm-3 control-label">Precio: </label>
	
				<div class="col-sm-8">
					<input type="number" step="0.01" class="form-control" id="PRECIOPRODUCT" placeholder="Precio del producto" name="PRECIOPRODUCT" autocomplete="off">
				</div>
	        </div> <!-- /form-group-->	

			
			

			<div class="form-group">
			<label for="STOCKPRODUCT" class="col-sm-3 control-label">Stock: </label>
		
				<div class="col-sm-8">
					<input type="number" class="form-control" id="STOCKPRODUCT" placeholder="Stock del producto" name="STOCKPRODUCT" autocomplete="off">
				</div>
	        </div> <!-- /form-group-->


		
			  

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->

<!-- edit categories brand -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editProductForm" action="php_action/editProduct.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar producto</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-product-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

		      <div class="edit-product-result">


		    <div class="form-group">
			<label for="editProductName" class="col-sm-3 control-label">Nombre: </label>
	
				<div class="col-sm-8">
					<input type="text" class="form-control" id="editProductName" placeholder="Nombre del producto" name="editProductName" autocomplete="off">
				</div>
	        </div> <!-- /form-group-->	    


			<div class="form-group">
	        	<label for="editProductCat" class="col-sm-3 control-label">Categorías : </label>
				    <div class="col-sm-8">
						<select name="editProductCat" id="editProductCat" class="form-control">
						<?php $query=mysqli_query($connect,"SELECT CATEGORIAID,NOMCAT FROM CATEGORIAPRODUCTO");?>
						<?php 
						while ($cat = mysqli_fetch_array($query)){ ?>
							<option value='<?php echo $cat['CATEGORIAID'];?>'> <?php echo $cat['NOMCAT'];?></option><br>
						<?php    
						}
						$connect->close();
						?>
						</select>
				    </div>
	        </div> <!-- /form-group-->


			<div class="form-group">
			<label for="editProductDesc" class="col-sm-3 control-label">Descripción: </label>

				<div class="col-sm-8">
					 <textarea class="form-control" name="editProductDesc" id="editProductDesc" cols="30" rows="5" placeholder="Descripción del producto" autocomplete="off"></textarea> 
				</div>
	        </div> <!-- /form-group-->	
	

			<div class="form-group">
			<label for="editProductPre" class="col-sm-3 control-label">Precio: </label>
	
				<div class="col-sm-8">
					<input type="number" step="0.01" class="form-control" id="editProductPre" placeholder="Precio del producto" name="editProductPre" autocomplete="off">
				</div>
	        </div> <!-- /form-group-->	


			

			<div class="form-group">
			<label for="editProductSto" class="col-sm-3 control-label">Stock: </label>
		
				<div class="col-sm-8">
					<input type="number" class="form-control" id="editProductSto" placeholder="Stock del producto" name="editProductSto" autocomplete="off">
				</div>
	        </div> <!-- /form-group-->


			
			  

		      </div>         	        
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editProductFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
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

<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Eliminar Producto</h4>
      </div>
      <div class="modal-body">
        <p>¿ Realmente deseas eliminar este registro ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
