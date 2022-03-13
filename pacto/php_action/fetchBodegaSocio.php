<?php

require_once 'core.php';

// $USUARIOID = $_SESSION['userId'];
$ASOID = $_SESSION['asoId'];

$user_id=$_SESSION['userId'] ;
$sql = "SELECT 
BODEGA.BODEGAID, 
USUARIO.NOMBREAPEUSU, 
BODEGA.FECHABODEGA,
 BODEGA.TOTALCOSTO 
 FROM USUARIO,BODEGA,ASOCIACION,PERTENECEN 
WHERE BODEGA.PERTENECENID=PERTENECEN.PERTENECENID 
AND PERTENECEN.USUARIOID=USUARIO.USUARIOID
AND PERTENECEN.ASOCIACIONID=ASOCIACION.ASOCIACIONID 
AND ASOCIACION.ASOCIACIONID = $ASOID 
AND USUARIO.USUARIOID=$user_id";

$result = $connect->query($sql) ;

$output = array('data' => array());


while ($row = $result->fetch_array()) {
    $bodegaId = $row[0];

    $button = '<!-- Single button -->

  <div clas="container" style="display:flex "> 
	
  

    <div class="col2">
  <form action="reciboEntregaSocio.php" method="POST">

  <input style="display:none" type="text" value="' . $bodegaId . '" name="detallebodega" > </input>

  <button class="btn btn-success type="submit" style="width: 120px"> Generar Recibo</button> 

  </form>

  </div>

  </div>



	 	
	';

    $output['data'][] = array(
     
        $row[2],
        $button

    );
}

$connect->close();
echo json_encode($output);
