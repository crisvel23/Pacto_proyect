<?php

require_once 'core.php';

// $USUARIOID = $_SESSION['userId'];
$ASOID = $_SESSION['asoId'];

$sql = "SELECT 
BODEGA.BODEGAID, 
USUARIO.NOMBREAPEUSU, 
BODEGA.FECHABODEGA,
 BODEGA.TOTALCOSTO 
 FROM USUARIO,BODEGA,ASOCIACION,PERTENECEN 
WHERE BODEGA.PERTENECENID=PERTENECEN.PERTENECENID 
AND PERTENECEN.USUARIOID=USUARIO.USUARIOID
AND PERTENECEN.ASOCIACIONID=ASOCIACION.ASOCIACIONID 
AND ASOCIACION.ASOCIACIONID = $ASOID ";

$result = $connect->query($sql) ;

$output = array('data' => array());


while ($row = $result->fetch_array()) {
    $bodegaId = $row[0];

    $button = '<!-- Single button -->

  <div clas="container" style="display:flex "> 
	
  <div class="col1" style="padding-right:20px ">
  
  <form action="entregaProducto.php" method="POST">

  <input style="display:none" type="text" value="' . $bodegaId . '" name="detallebodega" > </input>

  <button class="btn btn-primary type="submit" style="width: 120px"> Detalle Entrega</button> 

  </form>
  </div>

    <div class="col2">
  <form action="reciboEntrega.php" method="POST">

  <input style="display:none" type="text" value="' . $bodegaId . '" name="detallebodega" > </input>

  <button class="btn btn-success type="submit" style="width: 120px"> Generar Recibo</button> 

  </form>

  </div>

  </div>



	 	
	';

    $output['data'][] = array(
        $row[1],
        $row[2],
        $button

    );
}

$connect->close();
echo json_encode($output);
