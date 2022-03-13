<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitBrandForm" action="php_action/createAsistencia.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Usuarios Inscritos </h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        
			  <div class="form-group">
	        	<label for="fechaAsis" class="col-sm-3 control-label">Asistencia HOY: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" id="fechaAsis" placeholder="Fecha inicio" name="fechaAsis" value="<?php echo date("Y-m-d");?>">
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="asistenciaid " class="col-sm-3 control-label">Estudiante: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					<select name="asistenciaid" id="asistenciaid" class="form-control">
						<?php $query=mysqli_query($connect,"SELECT ASISTENCIAID, USUARIOID, REUNIONID, CONFIRMACIONASIS FROM asistencia");?>
						<?php 
						while ($especies = mysqli_fetch_array($query)){ ?>
						<option value=" <?php echo $especies['ASISTENCIAID'];?> "> <?php echo $especies['USUARIOID'];?></option><br>
						<?php    
						// $connect->close();
						}?>
	
					</select>
				      <!-- <input type="text" class="form-control" id="entidadid" placeholder="Mandar 1 porque no vale" name="entidadid" autocomplete="off"> -->
					</div>
					
	        </div> <!-- /form-group-->	   
			<div class="form-group">
                    <label for="asisnoasis" class="col-sm-3 control-label">Registrar: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
						<input type="radio" name="asisnoasis" value="1"> Asistencia<br>

    					<input type="radio" name="asisnoasis" value="0"> Inasistencia
                        <!-- <input type="text" class="form-control" id="asisnoasis" placeholder="Ingreso el tipo" name="asisnoasis" autocomplete="on"> -->
                        </div>
                </div> <!-- /form-group-->
			        	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        
	        <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Guardar Asistencia</button>
	    	
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
    	
    	<form class="form-horizontal" id="editBrandForm" action="php_action/editEntidades.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar Entidad</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-brand-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
            </div>

			<div class="edit-brand-result">
                <div class="form-group">
                    <label for="editNombre" class="col-sm-3 control-label">Nombre: </label>
                    <label class="col-sm-1 control-label">: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="editNombre" placeholder="Ingrese el nombre de la entidad" name="editNombre" autocomplete="on">
                    </div>
                </div> <!-- /form-group-->	 

                <div class="form-group">
                    <label for="editTipo" class="col-sm-3 control-label">Tipo: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="editTipo" placeholder="Ingreso el tipo" name="editTipo" autocomplete="on">
                        </div>
                </div> <!-- /form-group-->	

                <div class="form-group">
                    <label for="editDireccion" class="col-sm-3 control-label">Direccion: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="editDireccion" placeholder="Ingrese la direccion" name="editDireccion" autocomplete="on">
                        </div>
                </div> <!-- /form-group-->	  

                <div class="form-group">
                    <label for="editTelefono " class="col-sm-3 control-label">Telefono: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="editTelefono" placeholder="Ingrese telefono" name="editTelefono" autocomplete="on">
                        </div>
                </div> <!-- /form-group-->	    

                <div class="form-group">
                    <label for="editPais" class="col-sm-3 control-label">Pais: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                        <select name="editPais" id="editPais" class="form-control">
						<?php $query=mysqli_query($connect,"SELECT NOMPAIS, PAISID FROM pais ");?>
						<?php 
						while ($especies = mysqli_fetch_array($query)){ ?>
						<option value=" <?php echo $especies['PAISID'];?> "> <?php echo $especies['NOMPAIS'];?></option><br>
						<?php    
						// $connect->close();
						}?>
					</select>
						</div>
                </div> <!-- /form-group-->	         
                <div class="form-group">
                    <label for="editCiudad " class="col-sm-3 control-label">Ciudad: </label>
                    <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="editCiudad" placeholder="Ingrese la ciudad" name="editCiudad" autocomplete="on">
                        </div>
                </div> <!-- /form-group-->
                


		      </div>         	       
		      <!-- /edit brand result -->

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




<!-- VER ASISTENCIA -->
<div class="modal fade" id="ver" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editBrandForm" action="php_action/editEntidades.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Asistencia </h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-brand-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
            </div>

			<div class="edit-brand-result">
				
				<div class="form-group">
                    <label for="editPais" class="col-sm-3 control-label"> </label>
                    <label class="col-sm-1 control-label"></label>
                        <div class="col-sm-8">
				<table border="1">
					<?php $query=mysqli_query($connect,"SELECT ASISTENCIAID, DIASASISTENCIA, FECHAASIS FROM diasasistencia WHERE ASISTENCIAID = 1");?>
					<caption>Asistencia</caption>
					
					<tr>
						<th>Asistencia</th>
						<th>Fecha</th>
					</tr>
					<?php 
						while ($especies = mysqli_fetch_array($query)){ ?>
					<tr>
						<td><?php echo $especies['DIASASISTENCIA'];?></td>
						<td><?php echo $especies['FECHAASIS'];?></td>
					</tr>
					<?php    
						// $connect->close();
					}?>
				</table>
						</div>
                </div> <!-- /form-group-->
                
				

		      </div>         	       
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editBrandFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
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

