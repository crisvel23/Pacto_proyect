<?php
session_start();
$ASOID = $_SESSION['asoId'];

?>
<div class="modal fade" id="addBodegaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="submitBodegaForm" action="php_action/createBodega.php" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar producto</h4>
                </div>

                <div class="modal-body">

                    <div id="add-bodega-messages"></div>



                    <div class="form-group">
                        <label for="USUARIOIUD" class="col-sm-3 control-label">Selecciona el Socio : </label>
                        <div class="col-sm-8">
                            <select name="USUARIOIUD" id="USUARIOIUD" class="form-control">
                                <option value=""> -- Selecciona --</option>
                                <?php $query = mysqli_query($connect, "SELECT USUARIO.USUARIOID, USUARIO.NOMBREAPEUSU FROM USUARIO,PERTENECEN,ASOCIACION WHERE PERTENECEN.USUARIOID= USUARIO.USUARIOID AND PERTENECEN.ASOCIACIONID = $ASOID"); ?>
                                <?php
                                while ($usu = mysqli_fetch_array($query)) { ?>
                                    <option value='<?php echo $usu['USUARIOID']; ?>'> <?php echo $usu['NOMBREAPEUSU']; ?></option><br>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div> <!-- /form-group-->


                    <div class="form-group">
                        <label for="FECHABODEGA" class="col-sm-3 control-label">Stock: </label>

                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="FECHABODEGA" placeholder="Introduce fecha" name="FECHABODEGA" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                </div> <!-- /modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>

                    <button type="submit" class="btn btn-primary" id="createBodegaBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
                </div> <!-- /modal-footer -->
            </form> <!-- /.form -->
        </div> <!-- /modal-content -->
    </div> <!-- /modal-dailog -->
</div>
<!-- /add categories -->


<div class="modal fade" id="adddetalleBodegaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="submitdetalleBodegaForm" action="php_action/detalleBodega.php" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar producto</h4>
                </div>

                <div class="modal-body">

                    <div id="add-detalle-messages"></div>

                    <?php
                    $bodegaId = $_POST['detallebodega'];
                    ?>

                   <input type="hidden" value="<?php echo $bodegaId ?>" name="detallebodega">

                    <div class="form-group">
                        <label for="NOMPRODUCT" class="col-sm-3 control-label">Selecciona Producto: </label>
                        <div class="col-sm-8">
                            <select name="NOMPRODUCT" id="NOMPRODUCT" class="form-control">
                                <option value=""> -- Selecciona --</option>
                                <?php $query = mysqli_query($connect, "SELECT PRODUCTOID, NOMPRODUCT FROM PRODUCTO WHERE ASOCIACIONID = $ASOID"); ?>
                                <?php
                                while ($pro = mysqli_fetch_array($query)) { ?>
                                    <option value='<?php echo $pro['PRODUCTOID']; ?>'> <?php echo $pro['NOMPRODUCT']; ?></option><br>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="UNIDADESID" class="col-sm-3 control-label">Selecciona unidad: </label>
                        <div class="col-sm-8">
                            <select name="UNIDADESID" id="UNIDADESID" class="form-control">
                                <option value=""> -- Selecciona --</option>
                                <?php $query = mysqli_query($connect, "SELECT UNIDADESID, NOMUNIDADES FROM UNIDADES"); ?>
                                <?php
                                while ($uni = mysqli_fetch_array($query)) { ?>
                                    <option value='<?php echo $uni['UNIDADESID']; ?>'> <?php echo $uni['NOMUNIDADES']; ?></option><br>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="STOCKBODEGA" class="col-sm-3 control-label">Cantidad: </label>

                        <div class="col-sm-8">
                            <input type="number" step="0.01" class="form-control" id="STOCKBODEGA" placeholder="Introduce cantidad" name="STOCKBODEGA" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="DESCRIPBODEGA" class="col-sm-3 control-label">Descripción: </label>

                        <div class="col-sm-8">
                            <textarea class="form-control" id="DESCRIPBODEGA" name="DESCRIPBODEGA" autocomplete="off" cols="30" rows="5" placeholder="Introduce descripción"></textarea>

                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="PRECIOBODEGA" class="col-sm-3 control-label">Precio: </label>

                        <div class="col-sm-8">
                            <input type="number" step="0.01" class="form-control" id="PRECIOBODEGA" placeholder="Introduce precio" name="PRECIOBODEGA" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->




                </div> <!-- /modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>

                    <button type="submit" class="btn btn-primary" id="createdetalleBodegaBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
                </div> <!-- /modal-footer -->
            </form> <!-- /.form -->
        </div> <!-- /modal-content -->
    </div> <!-- /modal-dailog -->
</div>
<!-- /add categories -->




<!-- edit categories brand -->
<div class="modal fade" id="editdetalleBodegaModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editdetalleBodegaForm" action="php_action/editdetalleBodega.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar producto</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-detalleBodega-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>

		      <div class="edit-detalleBodega-result">


		  
              <div class="form-group">
                        <label for="editdetalleBodegaName" class="col-sm-3 control-label">Selecciona Producto: </label>
                        <div class="col-sm-8">
                            <select name="editdetalleBodegaName" id="editdetalleBodegaName" class="form-control">
                                <option value=""> -- Selecciona --</option>
                                <?php $query = mysqli_query($connect, "SELECT PRODUCTOID, NOMPRODUCT FROM PRODUCTO WHERE ASOCIACIONID = $ASOID"); ?>
                                <?php
                                while ($pro = mysqli_fetch_array($query)) { ?>
                                    <option value='<?php echo $pro['PRODUCTOID']; ?>'> <?php echo $pro['NOMPRODUCT']; ?></option><br>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="editdetalleBodegaUnidades" class="col-sm-3 control-label">Selecciona unidad: </label>
                        <div class="col-sm-8">
                            <select name="editdetalleBodegaUnidades" id="editdetalleBodegaUnidades" class="form-control">
                                <option value=""> -- Selecciona --</option>
                                <?php $query = mysqli_query($connect, "SELECT UNIDADESID, NOMUNIDADES FROM UNIDADES"); ?>
                                <?php
                                while ($uni = mysqli_fetch_array($query)) { ?>
                                    <option value='<?php echo $uni['UNIDADESID']; ?>'> <?php echo $uni['NOMUNIDADES']; ?></option><br>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="editdetalleBodegaStock" class="col-sm-3 control-label">Cantidad: </label>

                        <div class="col-sm-8">
                            <input type="number" step="0.01" class="form-control" id="editdetalleBodegaStock" placeholder="Introduce cantidad" name="editdetalleBodegaStock" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="editdetalleBodegaDesc" class="col-sm-3 control-label">Descripción: </label>

                        <div class="col-sm-8">
                            <textarea class="form-control" id="editdetalleBodegaDesc" name="editdetalleBodegaDesc" autocomplete="off" cols="30" rows="5" placeholder="Introduce descripción"></textarea>

                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="editdetalleBodegaPrecio" class="col-sm-3 control-label">Precio: </label>

                        <div class="col-sm-8">
                            <input type="number" step="0.01" class="form-control" id="editdetalleBodegaPrecio" placeholder="Introduce precio" name="editdetalleBodegaPrecio" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->


			
			  

		      </div>         	        
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editdetalleBodegaFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-success" id="editdetalleBodegaBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
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

<div class="modal fade" tabindex="-1" role="dialog" id="removedetalleBodegaModal">
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
        <button type="button" class="btn btn-primary" id="removedetalleBodegaBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->